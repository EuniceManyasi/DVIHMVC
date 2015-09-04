<?php
class Inventory extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function index()
	{
            $this->load->model('mdl_inventory');
            $this->load->library('pagination');
            $this->load->library('table');
            $config['base_url'] = base_url().'/inventory/index';
            $config['total_rows'] = $this->mdl_inventory->get('id')->num_rows;
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
          // $data['query'] = $this->mdl_region->get('id', $config['per_page'], $this->uri->segment(3));
            $data['records'] = $this->db->get('m_inventory', $config['per_page'], $this->uri->segment(3));
           //$this->load->view('display', $data);
            $data['module']="inventory";
            $data['view_file']="list_inventory_view";
            echo Modules::run('template/admin', $data);  
	}

	function create(){
	
            $update_id= $this->uri->segment(3);
            $data = array();
            $this->load->model('mdl_inventory');
            
            if (!isset($update_id )){
                $update_id = $this->input->post('update_id', $id);
                 $data['mainventory']  = $this->mdl_inventory->getInventory();
            }
            
            if (is_numeric($update_id)){
                $data = $this->get_data_from_db($update_id);
                $data['update_id'] = $update_id;
                $data['mainventory']  = $this->mdl_inventory->getInventory();
                
            } else {
            $data= $this->get_data_from_post();
            $data['mainventory']  = $this->mdl_inventory->getInventory();
            }
            

	$data['module'] = "inventory";
	$data['view_file'] = "update_inventory_form";
	echo Modules::run('template/admin', $data);
}

function get_data_from_post(){
            
            $data['Vaccine_name']=$this->input->post('Vaccine_name', TRUE);
            $data['max_stock']=$this->input->post('max_stock', TRUE);
            $data['min_stock']=$this->input->post('min_stock', TRUE);
            $data['period_stock']=$this->input->post('period_stock', TRUE);
            
             
            return $data;
        }

  function get_data_from_db($update_id){
           $query = $this->get_where($update_id);

           foreach ($query->result() as $row){
               $data['Vaccine_name'] = $row->Vaccine_name;
               $data['max_stock'] = $row->max_stock;
               $data['min_stock'] = $row->min_stock;
               $data['period_stock'] = $row->period_stock;
               
           }
        return $data;
    }

      function submit (){
            
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Vaccine_name', 'Vaccine Name', 'required|xss_clean');
        $this->form_validation->set_rules('max_stock', 'Maximum Stock', 'required|xss_clean');
        $this->form_validation->set_rules('min_stock', 'Minimum Stock', 'required|xss_clean');
        $this->form_validation->set_rules('period_stock', 'Period Stock', 'required|xss_clean');
	      
                        
        $update_id = $this->input->post('update_id', TRUE);
        if ($this->form_validation->run() == FALSE)
        {   
                    $this->create();         
        }
        else
        {       
                   $data =  $this->get_data_from_post();
                   
                   if(is_numeric($update_id)){
                       $this->_update($update_id, $data);
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Inventory updated successfully!</div>');
            
                   } else {
                       $this->_insert($data);
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Inventory added successfully!</div>');
                   }
                   
                   redirect('inventory');
        }
        }

function delete($id){
$this->_delete($id);
$this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Inventory deleted successfully!</div>');
redirect('inventory');
}
function get($order_by){
$this->load->model('mdl_inventory');
$query = $this->mdl_inventory->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_inventory');
$query = $this->mdl_inventory->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_inventory');
$query = $this->mdl_inventory->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_inventory');
$query = $this->mdl_inventory->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_inventory');
$this->mdl_inventory->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_inventory');
$this->mdl_inventory->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_inventory');
$this->mdl_inventory->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_inventory');
$count = $this->mdl_inventory->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_inventory');
$max_id = $this->mdl_inventory->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_inventory');
$query = $this->mdl_inventory->_custom_query($mysql_query);
return $query;
}

}