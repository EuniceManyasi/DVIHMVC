<?php
class Vaccines extends MX_Controller 
{
function __construct() {
parent::__construct();
}


public function index($ID = NULL)
{
  $this->data['page_title'] = 'Vaccines';
  $this->load->model('vaccines_model');
  $this->data['m_vaccines'] = $this->vaccines_model->get($ID)->result();
  $this->render('admin/vaccine/list_vaccine_view');
}

public function create()
{
  $this->data['page_title'] = 'Add Vaccines';
  $this->load->library('form_validation');

  $this->form_validation->set_rules('Name','Vaccine Name','trim|required');
  $this->form_validation->set_rules('Doses_required','Doses Required','trim|required');
  $this->form_validation->set_rules('Wastage_factor','Wastage Factor','trim|required');
  $this->form_validation->set_rules('Tray_color','Tray Color','trim|required');
  $this->form_validation->set_rules('Vaccine_designation','Vaccine Designation','trim|required');
  $this->form_validation->set_rules('Vaccine_formulation','Vaccine Formulation','trim|required');
  $this->form_validation->set_rules('Mode_administration','Mode of Administration','required');
  $this->form_validation->set_rules('Vaccine_presentation','Vaccine Presentation','required');
  $this->form_validation->set_rules('Fridge_compart','Fridge Compartment','required');
  $this->form_validation->set_rules('Vaccine_pck_vol','Vaccine Packed Volume(cm3/dose)','required');
  $this->form_validation->set_rules('Diluents_pck_vol','Diluents Packed Volume(cm3/dose)','required');
  $this->form_validation->set_rules('Vaccine_price_vial','Vaccine Price($USD/Vial)','required');
  $this->form_validation->set_rules('Vaccine_price_dose','Vaccine Price($USD/Dose)','required');
 

  if($this->form_validation->run()===FALSE)
  {
    $this->data['groups'] = $this->ion_auth->groups()->result();//check
    $this->load->helper('form');
    $this->render('admin/vaccine/vaccine_view');
  }
  else
  {
    
    
      $data['Name'] = $this->input->post('Name');
      $data['Doses_required'] = $this->input->post('Doses_required');
      $data['Wastage_factor'] = $this->input->post('Wastage_factor');
      $data['Tray_color'] = $this->input->post('Tray_color');
      $data['Vaccine_designation'] = $this->input->post('Vaccine_designation');
      $data['Vaccine_formulation']= $this->input->post('Vaccine_formulation');
      $data['Mode_administration'] = $this->input->post('Mode_administration');
      $data['Vaccine_presentation'] = $this->input->post('Vaccine_presentation');
      $data['Fridge_compart'] = $this->input->post('Fridge_compart');
      $data['Vaccine_pck_vol'] = $this->input->post('Vaccine_pck_vol');
      $data['Diluents_pck_vol'] = $this->input->post('Diluents_pck_vol');
      $data['Vaccine_price_vial'] = $this->input->post('Vaccine_price_vial');
      $data['Vaccine_price_dose'] = $this->input->post('Vaccine_price_dose');
    
    $this->load->model('vaccines_model');
    $this->vaccines_model->_insert($data);
    $this->session->set_flashdata('message','Vaccine added successfully');
    redirect('admin/users','refresh');
  }
}

public function edit($ID = NULL)
{
  $ID = $this->input->post('ID') ? $this->input->post('ID') : $ID;
  $this->data['page_title'] = 'Edit Vaccines';
  $this->load->library('form_validation');
       
  $this->form_validation->set_rules('Name','Vaccine Name','trim|required');
  $this->form_validation->set_rules('Doses_required','Doses Required','trim|required');
  $this->form_validation->set_rules('Wastage_factor','Wastage Factor','trim|required');
  $this->form_validation->set_rules('Tray_color','Tray Color','trim|required');
  $this->form_validation->set_rules('Vaccine_designation','Vaccine Designation','trim|required');
  $this->form_validation->set_rules('Vaccine_formulation','Vaccine Formulation','trim|required');
  $this->form_validation->set_rules('Mode_administration','Mode of Administration','required');
  $this->form_validation->set_rules('Vaccine_presentation','Vaccine Presentation','required');
  $this->form_validation->set_rules('Fridge_compart','Fridge Compartment','required');
  $this->form_validation->set_rules('Vaccine_pck_vol','Vaccine Packed Volume(cm3/dose)','required');
  $this->form_validation->set_rules('Diluents_pck_vol','Diluents Packed Volume(cm3/dose)','required');
  $this->form_validation->set_rules('Vaccine_price_vial','Vaccine Price($USD/Vial)','required');
  $this->form_validation->set_rules('Vaccine_price_dose','Vaccine Price($USD/Dose)','required');
  $this->form_validation->set_rules('ID','Vaccine ID','trim|integer|required');

  if($this->form_validation->run() === FALSE)
  {
    if($vaccine = $this->ion_auth->vaccine((int) $ID)->row())//check
    {
      $this->data['vaccine'] = $vaccine;
    }
    else
    {
      $this->session->set_flashdata('message', 'The vaccine doesn\'t exist.');
      redirect('admin/vaccines', 'refresh');
    }
    $this->load->helper('form');
    $this->render('admin/vaccine/edit_vaccine_view');
  }
  else
  {
     $data['Name'] = $this->input->post('Name');
      $data['Doses_required'] = $this->input->post('Doses_required');
      $data['Wastage_factor'] = $this->input->post('Wastage_factor');
      $data['Tray_color'] = $this->input->post('Tray_color');
      $data['Vaccine_designation'] = $this->input->post('Vaccine_designation');
      $data['Vaccine_formulation']= $this->input->post('Vaccine_formulation');
      $data['Mode_administration'] = $this->input->post('Mode_administration');
      $data['Vaccine_presentation'] = $this->input->post('Vaccine_presentation');
      $data['Fridge_compart'] = $this->input->post('Fridge_compart');
      $data['Vaccine_pck_vol'] = $this->input->post('Vaccine_pck_vol');
      $data['Diluents_pck_vol'] = $this->input->post('Diluents_pck_vol');
      $data['Vaccine_price_vial'] = $this->input->post('Vaccine_price_vial');
      $data['Vaccine_price_dose'] = $this->input->post('Vaccine_price_dose');
      $data['ID'] = $this->input->post('ID');
    
    $this->load->model('vaccines_model');
    $this->vaccines_model->_update($ID, $data);
    $this->session->set_flashdata('message',$this->ion_auth->messages());//check
    redirect('admin/vaccines','refresh');
  }
}

 public function delete($ID = NULL)
{
  if(is_null($ID))
  {
    $this->session->set_flashdata('message','There\'s no user to delete');
  }
  else
  {
    $this->load->model('vaccines_model');
    $this->vaccines_model->_delete($ID);
    $this->session->set_flashdata('message',$this->ion_auth->messages());//check
  }
  redirect('admin/vaccines','refresh');
}





function get($order_by){
$this->load->model('mdl_vaccines');
$query = $this->mdl_vaccines->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_vaccines');
$query = $this->mdl_vaccines->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_vaccines');
$query = $this->mdl_vaccines->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_vaccines');
$query = $this->mdl_vaccines->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_vaccines');
$this->mdl_vaccines->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_vaccines');
$this->mdl_vaccines->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_vaccines');
$this->mdl_vaccines->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_vaccines');
$count = $this->mdl_vaccines->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_vaccines');
$max_id = $this->mdl_vaccines->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_vaccines');
$query = $this->mdl_vaccines->_custom_query($mysql_query);
return $query;
}

}