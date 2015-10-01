<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fro_aboutus_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Das_company_model');
	}

	public function index()
	{
		$data['main'] = 'front-end/aboutus';
		$data['infoma'] = $this->Das_company_model->getinfomation();
		$data['sup'] = $this->Das_company_model->getcontactbypage('aboutus');
		$this->load->view('front-end/template/template',$data);
	}

}

/* End of file fro_aboutus_ct.php */
/* Location: ./application/controllers/fro_aboutus_ct.php */