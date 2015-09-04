<?php
class County extends MX_Controller 
{

function __construct() {
parent::__construct();

}

public function index()
	{
            $this->load->model('mdl_county');
            $this->load->library('pagination');
            $this->load->library('table');
            $config['base_url'] = base_url().'/county/index';
            $config['total_rows'] = $this->mdl_county->get('id')->num_rows;
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
          // $data['query'] = $this->mdl_county->get('id', $config['per_page'], $this->uri->segment(3));
            $data['records'] = $this->db->get('m_county', $config['per_page'], $this->uri->segment(3));
           //$this->load->view('display', $data);
            $data['section'] = "Configuration";
            $data['subtitle'] = "County";
            $data['page_title'] = "List Counties";
            $data['module']="county";
            $data['view_file']="list_county_view";
            echo Modules::run('template/admin', $data);  
	}
   
function create(){
	
            $update_id= $this->uri->segment(3);
            $data = array();
            $this->load->model('mdl_county');
            
            if (!isset($update_id )){
                $update_id = $this->input->post('update_id', $id);
                 $data['maregion']  = $this->mdl_county->getRegion();
            }
            
            if (is_numeric($update_id)){
                $data = $this->get_data_from_db($update_id);
                $data['update_id'] = $update_id;
                 $data['maregion']  = $this->mdl_county->getRegion();
                
            } else {
            $data= $this->get_data_from_post();
             $data['maregion']  = $this->mdl_county->getRegion();
            }
            
            $data['section'] = "Configuration";
            $data['subtitle'] = "County";
            $data['page_title'] = "Add County";
	$data['module'] = "county";
	$data['view_file'] = "create_county_form";
	echo Modules::run('template/admin', $data);
}

function get_data_from_post(){
            $data['county_name']=$this->input->post('county_name', TRUE);
            $data['county_headquater']=$this->input->post('county_headquater', TRUE);
            $data['region_id']=$this->input->post('region_id', TRUE);          
            return $data;
        }

        function get_data_from_db($update_id){
               $query = $this->get_where($update_id);
               foreach ($query->result() as $row){
                   $data['county_name'] = $row->county_name;
                   $data['county_headquater'] = $row->county_headquater;
                   $data['region_id'] = $row->region_id;
               }
            return $data;
        }

          function submit (){
            
        $this->load->library('form_validation');
        $this->form_validation->set_rules('county_name', 'County Name', 'required|xss_clean');
        $this->form_validation->set_rules('county_headquater', 'County Headquater', 'required|xss_clean');
        $this->form_validation->set_rules('region_id', 'Region', 'required|xss_clean');
                
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
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">County details updated successfully!</div>');
            
                   } else {
                       $this->_insert($data);
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">New county added successfully!</div>');
                   }
                   
                   //$this->session->set_flashdata('success', 'County added successfully.');
                   redirect('county');
        }
        }

        function delete($id){
$this->_delete($id);
$this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">County details deleted successfully!</div>');
redirect('county');
}
        

function get($order_by){
$this->load->model('mdl_county');
$query = $this->mdl_county->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_county');
$query = $this->mdl_county->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_county');
$query = $this->mdl_county->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_county');
$query = $this->mdl_county->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_county');
$this->mdl_county->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_county');
$this->mdl_county->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_county');
$this->mdl_county->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_county');
$count = $this->mdl_county->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_county');
$max_id = $this->mdl_county->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_county');
$query = $this->mdl_county->_custom_query($mysql_query);
return $query;
}

}