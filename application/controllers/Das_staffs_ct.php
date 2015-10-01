<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_staffs_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
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

			$data['main'] = 'back-end/staffs/list-of-staffs';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function loadaddstaff()
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

			$data['main'] = 'back-end/staffs/add-new-staff';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function loadeditstaff()
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

			$data['main'] = 'back-end/staffs/edit-staff/'.'dua id job vao day'; // chu y'
			$this->load->view('back-end/template/template',$data);
		}
	}
}