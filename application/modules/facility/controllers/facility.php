<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facility extends MX_Controller {

function __construct() {
parent::__construct();
}
	public function index()
	{
		$this->load->model('mdl_facility');
		$this->load->library('pagination');
		$this->load->library('table');
		$config['base_url'] = base_url().'/facility/index';
		$config['total_rows'] = $this->mdl_facility->get('id')->num_rows;
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
		
		$data['records'] = $this->db->get('m_facility', $config['per_page'], $this->uri->segment(3));
		$data['section'] = "Configuration";
        $data['subtitle'] = "facility";
        $data['page_title'] = "List facilities";
		$data['module']="facility";
		$data['view_file']="list_facility_view";
		echo Modules::run('template/admin', $data);			
	}
	
	

		function create(){
	
            $update_id= $this->uri->segment(3);
            $data = array();
            $this->load->model('mdl_facility');
            

            

		if (!isset($update_id )){
			$update_id = $this->input->post('update_id', $id);
			$data['region']  = $this->mdl_facility->getRegion();
			$data['county']  = $this->mdl_facility->getCounty();
			$data['subcounty']  = $this->mdl_facility->getSubcounty();
			$data['fridge'] = $this->getRefrigerator();
		}
			
		if (is_numeric($update_id)){
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
			$data['region']  = $this->mdl_facility->getRegion();
			$data['county']  = $this->mdl_facility->getCounty();
			$data['subcounty']  = $this->mdl_facility->getSubcounty();
			$data['fridge'] = $this->getRefrigerator();
		} else {
			$data= $this->get_data_from_post();
			$data['region']  = $this->mdl_facility->getRegion();
			$data['county']  = $this->mdl_facility->getCounty();
			$data['subcounty']  = $this->mdl_facility->getSubcounty();
			$data['fridge'] = $this->getRefrigerator();
			
		}
        
        $data['section'] = "Configuration";
        $data['subtitle'] = "facilities";
        $data['page_title'] = "Add facility";    
		$data['module'] = "facility";
		$data['view_file'] = "create_facility_form";
		echo Modules::run('template/admin', $data);
	}

	function getRefrigerator(){
		$this->load->model('fridges/mdl_fridges');
		$query = $this->mdl_fridges->getRefrigerator();
		//var_dump($query);
		/*foreach ($query->result() as $row){
			$data['Model']= $row->Model;
			$data['Manufacturer']= $row->Manufacturer;
		}
		return $data;*/
		return $query;
	}
	function delete($id){
		$this->_delete($id);
		$this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Facility deleted successfully!</div>');
		redirect('facility/','refresh');
	}		
	function get_data_from_db($update_id){
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row){
		  $data['facility_name'] = $row->facility_name;
		  $data['type'] = $row->type;
		  $data['owner'] = $row->owner;
		  $data['region_id'] = $row->region_id; 
		  $data['county_id'] = $row->county_id;
		  $data['subcounty_id'] =  $row->subcounty_id;
		  $data['constituency'] =  $row->constituency;
		  $data['ward'] = $row->ward;
		  $data['nearest_town'] = $row->nearest_town;
		  $data['nearest_town_distance'] = $row->nearest_town_distance;
		  $data['nearest_depot_distance'] = $row->nearest_depot_distance;
		  $data['wcba_population'] = $row->wcba_population;
		  $data['catchment_population'] = $row->catchment_population;
		  $data['catchment_population_under_one'] = $row->catchment_population_under_one;
		  $data['refrigerator'] = $row->refrigerator;
		  $data['cold_box'] = $row->cold_box;
		  $data['vaccine_carrier'] = $row->vaccine_carrier;
		  $data['status'] = $row->status;
		  }
		  return $data;
	  }
	function get_data_from_post(){
		$data['facility_name'] 	= $this->input->post('facility_name', TRUE);
		$data['type'] 			= $this->input->post('type', TRUE);
		$data['owner'] 			= $this->input->post('owner', TRUE);
		$data['region_id'] 		= $this->input->post('region_id', TRUE);
		$data['county_id'] 		= $this->input->post('county_id', TRUE);
		$data['subcounty_id'] 	= $this->input->post('subcounty_id', TRUE);
		$data['constituency'] 	= $this->input->post('constituency', TRUE);
		$data['ward'] 			= $this->input->post('ward', TRUE);
		$data['nearest_town'] 	= $this->input->post('nearest_town', TRUE);
		$data['nearest_town_distance'] 	= $this->input->post('nearest_town_distance', TRUE);
		$data['nearest_depot_distance'] = $this->input->post('nearest_depot_distance', TRUE);
		$data['wcba_population'] 		= $this->input->post('wcba_population', TRUE);
		$data['catchment_population'] 	= $this->input->post('catchment_population', TRUE);
		$data['catchment_population_under_one'] = $this->input->post('catchment_population_under_one', TRUE);		
		$data['refrigerator']			= $this->input->post('refrigerator', TRUE);
		$data['cold_box'] 				= $this->input->post('cold_box', TRUE);
		$data['vaccine_carrier']		= $this->input->post('vaccine_carrier', TRUE);
		$data['status'] 				= $this->input->post('status', TRUE);
		return $data;
	}
	function submit (){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('facility_name','Facility Name','trim|required');
		$this->form_validation->set_rules('region_id','Region','trim|required');
		$this->form_validation->set_rules('county_id','County','trim|required');
		$this->form_validation->set_rules('subcounty_id','Sub-county','trim|required');
		$this->form_validation->set_rules('refrigerator','refrigerator','trim|required');
		$this->form_validation->set_rules('status','Status','trim|required');
		
		
		$update_id = $this->input->post('update_id', TRUE);
		if ($this->form_validation->run() === FALSE)
		{	
			$this->create(); 
			redirect('facility/');
		}
		else
		{		
                   $data =  $this->get_data_from_post();
                   
                   if(is_numeric($update_id)){
                       $this->_update($update_id, $data);
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Facility details updated successfully!</div>');
            
                   } else {
                       $this->_insert($data);
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">New facility added successfully!</div>');
                   }
                   
                   $this->session->set_flashdata('success', 'Facility added successfully.');
                   redirect('facility/');
		}
	}
	

function get($order_by){
$this->load->model('mdl_facility');
$query = $this->mdl_facility->get($order_by);
return $query;
}
	
function get_all($id){
$this->load->model('mdl_facility');
$query = $this->mdl_facility->get_all($id);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_facility');
$query = $this->mdl_facility->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_facility');
$query = $this->mdl_facility->get_where($id);
return $query;
}

function get_region($id){
$this->load->model('mdl_region');
$query = $this->mdl_region->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_facility');
$query = $this->mdl_facility->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_facility');
$this->mdl_facility->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_facility');
$this->mdl_facility->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_facility');
$this->mdl_facility->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_facility');
$count = $this->mdl_facility->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_facility');
$max_id = $this->mdl_facility->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_facility');
$query = $this->mdl_facility->_custom_query($mysql_query);
return $query;
}

		
}

/* End of file facility.php */
/* Location: ./modules/facility/controllers/facility.php */