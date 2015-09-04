<?php
/**
* 
*/
class Stock extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
    
    function receive_stock(){
    	 $data['module'] = "stock";
    	 $data['view_file'] = "receive_stock";
         $data['section'] = "stock";
          $data['subtitle'] = "Receive Stock";
          $data['page_title'] = "Receive Stock";
         echo Modules::run('template/admin', $data);
    }
    function save_stock(){}

    function issue_stock(){
    	 $data['module'] = "stock";
    	 $data['view_file'] = "issue_stock";
         $data['section'] = "stock";
          $data['subtitle'] = "Issue Stock";
          $data['page_title'] = "Issue Stock";
         echo Modules::run('template/admin', $data);
    }
    function vaccine_ledger(){
    	 $data['module'] = "stock";
    	 $data['view_file'] = "vaccine_ledger";
          $data['section'] = "stock";
          $data['subtitle'] = "Vaccine Ledger";
          $data['page_title'] = "Vaccine Ledger";
         echo Modules::run('template/admin', $data);
    }
    function physical_count(){
        $data['module'] = "stock";
         $data['view_file'] = "physical_stock";
         $data['section'] = "stock";
          $data['subtitle'] = "Physical Stock Count";
          $data['page_title'] = "Physical Stock Count";
         echo Modules::run('template/admin', $data);
    }
    function transfer_stock(){
         $data['module'] = "stock";
         $data['view_file'] = "transfer_stock";
         $data['section'] = "stock";
          $data['subtitle'] = "Transfer Stock";
          $data['page_title'] = "Transfer Stock";
         echo Modules::run('template/admin', $data); 
    }
	
}