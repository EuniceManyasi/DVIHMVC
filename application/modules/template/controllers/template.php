<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {

    //function home($data){
//        $this->load->view('home_view', $data);
//    }


	 function home($data){
        $this->load->view('home_view', $data);
    }
	
    function admin($data){
        $this->load->view('admin_view',$data);
    }
	
	function sayHello(){
        echo '<h2>Hello</h2>';
    }
}

