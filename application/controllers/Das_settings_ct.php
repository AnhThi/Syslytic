<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_settings_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	}

	public function loadsliders()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			$data['header'] = '

			';
			$data['footer'] = '

			';

			$data['main'] = 'back-end/settings/sliders';
			$this->load->view('back-end/template/template',$data);
		}
	}
}