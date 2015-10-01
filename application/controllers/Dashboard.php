<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
	   parent::__construct();

	}

	public function index(){
		if(!$this->session->userdata('logged_in'))
		{
			$this->load->view('back-end/login/index');
        }
        else
        {
        	$data['main'] = 'back-end/template/main';
        	$this->load->view('back-end/template/template',$data);
        }
	}
}