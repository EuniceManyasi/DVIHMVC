<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fridge extends MX_Controller {

function __construct() {
parent::__construct();
}
	public function index()
	{
		$this->load->model('mdl_fridge');
		$this->load->library('pagination');
		$this->load->library('table');
		$config['base_url'] = base_url().'/fridge/index';
		$config['total_rows'] = $this->mdl_fridge->get('id')->num_rows;
		$config['per_page'] = 5;
		$config['num_links'] = 4;
		$config['full_tag_open'] = '<div><ul class="pagination pagination-small pagination-centered">';
		$config['full_tag_close'] = '</ul></div>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		
		$this->pagination->initialize($config);
		$data['records'] = $this->db->get('m_fridge', $config['per_page'], $this->uri->segment(3));
		$data['section'] = "Configuration";
        $data['subtitle'] = "Fridge";
        $data['page_title'] = "List Fridges";
		$data['module']="fridge";
		$data['view_file']="list_fridge_view";
		echo Modules::run('template/admin', $data);			
	}
	
	

		function create(){
	
            $update_id= $this->uri->segment(3);
            $data = array();
            $this->load->model('mdl_fridge');
            
		if (!isset($update_id )){
			$update_id = $this->input->post('update_id', $id);
			
		}
            
		if (is_numeric($update_id)){
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;

		} else {
			$data= $this->get_data_from_post();
			
			
		}
            
        $data['section'] = "Configuration";
        $data['subtitle'] = "Fridges";
        $data['page_title'] = "Add Fridges";
		$data['module'] = "fridge";
		$data['view_file'] = "create_fridge_form";
		echo Modules::run('template/admin', $data);
	}

	function delete($id){
		$this->load->model('mdl_fridge');
		$this->mdl_fridge->_delete($id);
		$this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">fridge deleted successfully!</div>');
		redirect('fridge/','refresh');
	}		
	function get_data_from_db($update_id){
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row){
		  $data['item_type'] = $row->item_type;
		  $data['library_id'] = $row->library_id;
		  $data['pqs'] = $row->pqs;
		  $data['model_name'] = $row->model_name; 
		  $data['manufacturer'] = $row->manufacturer;
		  $data['power_source'] =  $row->power_source;
		  $data['refrigerant_gas_type'] =  $row->refrigerant_gas_type;
		  $data['positive_net_volume'] = $row->positive_net_volume;
		  $data['negative_net_volume'] = $row->negative_net_volume;
		  $data['positive_gross_volume'] = $row->positive_gross_volume;
		  $data['negative_gross_volume'] = $row->negative_gross_volume;
		  $data['freezing_capacity'] = $row->freezing_capacity;
		  $data['price'] = $row->price;
		  $data['electricity'] = $row->electricity;
		  $data['gas'] = $row->gas;
		  $data['kerosene'] = $row->kerosene;
		  $data['zone'] = $row->zone;
		  }
		  return $data;
	  }
	function get_data_from_post(){
		
		$data['item_type'] 				= $this->input->post('item_type', TRUE);
		$data['library_id'] 			= $this->input->post('library_id', TRUE);
		$data['pqs'] 					= $this->input->post('pqs', TRUE);
		$data['model_name'] 			= $this->input->post('model_name', TRUE);
		$data['manufacturer'] 			= $this->input->post('manufacturer', TRUE);
		$data['power_source'] 			= $this->input->post('power_source', TRUE);
		$data['refrigerant_gas_type'] 	= $this->input->post('refrigerant_gas_type', TRUE);
		$data['positive_net_volume'] 	= $this->input->post('positive_net_volume', TRUE);
		$data['negative_net_volume'] 	= $this->input->post('negative_net_volume', TRUE);
		$data['positive_gross_volume'] 	= $this->input->post('positive_gross_volume', TRUE);
		$data['negative_gross_volume'] 	= $this->input->post('negative_gross_volume', TRUE);
		$data['freezing_capacity'] 		= $this->input->post('freezing_capacity', TRUE);
		$data['price'] 					= $this->input->post('price', TRUE);
		$data['electricity'] 			= $this->input->post('electricity', TRUE);
		$data['gas'] 					= $this->input->post('gas', TRUE);
		$data['kerosene'] 				= $this->input->post('kerosene', TRUE);
		$data['zone'] 					= $this->input->post('zone', TRUE);
		return $data;
	}
	function submit (){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('item_type','Item Type','trim|required');
		$this->form_validation->set_rules('library_id','Library ID','trim|required');
		$this->form_validation->set_rules('pqs','PQS','trim|required');
		$this->form_validation->set_rules('model_name','Model Name','trim|required');
		$this->form_validation->set_rules('manufacturer','Manufacturer','trim|required');
		$this->form_validation->set_rules('power_source','Power Source','trim|required');
		$this->form_validation->set_rules('refrigerant_gas_type','Refrigerant Gas Type','trim|required');
		$this->form_validation->set_rules('positive_net_volume','Net Volume','trim|required');
		$this->form_validation->set_rules('negative_net_volume','Net Volume','trim|required');
		$this->form_validation->set_rules('positive_gross_volume','Gross Volume','trim|required');
		$this->form_validation->set_rules('negative_gross_volume','Gross Volume','trim|required');
		$this->form_validation->set_rules('freezing_capacity','Freezing Capacity','trim|required');
		$this->form_validation->set_rules('price','Price','trim|required');
		$this->form_validation->set_rules('electricity','Electricity to run','trim|required');
		$this->form_validation->set_rules('gas','Gas to Run','trim|required');
		$this->form_validation->set_rules('kerosene','Kerosene to run','trim|required');
		$this->form_validation->set_rules('zone','Zone','trim|required');
		
		
		$update_id = $this->input->post('update_id', TRUE);
		echo $update_id;
		if ($this->form_validation->run() == FALSE)
		{	
			$this->create();         
		}
		else
		{		
                   $data =  $this->get_data_from_post();
                   
                   if(is_numeric($update_id)){
                       $this->_update($update_id, $data);
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">fridge details updated successfully!</div>');
            
                   } else {
                       $this->_insert($data);
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">New fridge added successfully!</div>');
                   }
                   
                   $this->session->set_flashdata('success', 'fridge added successfully.');
                   redirect('fridge/');
		}
	}
	
	
function get($order_by){
$this->load->model('mdl_fridge');
$query = $this->mdl_fridge->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_fridge');
$query = $this->mdl_fridge->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_fridge');
$query = $this->mdl_fridge->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_fridge');
$query = $this->mdl_fridge->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_fridge');
$this->mdl_fridge->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_fridge');
$this->mdl_fridge->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_fridge');
$this->mdl_fridge->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_fridge');
$count = $this->mdl_fridge->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_fridge');
$max_id = $this->mdl_fridge->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_fridge');
$query = $this->mdl_fridge->_custom_query($mysql_query);
return $query;
}

		
}

/* End of file fridge.php */
/* Location: ./modules/fridge/controllers/fridge.php */