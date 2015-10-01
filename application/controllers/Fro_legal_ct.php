<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fro_legal_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Das_legal_model');
	}

	public function index()
	{
		$data['main'] = 'front-end/legal';
		$data['le'] = $this->Das_legal_model->getalllegal();
		$this->load->view('front-end/template/template',$data);
	}

	public function legalacticle()
	{
		$leid = $this->uri->segment(3);
		$data['le_cont'] = $this->Das_legal_model->getlegalbyid($leid);
		$data['main'] = 'front-end/legal-acticle';
		$data['le'] = $this->Das_legal_model->getalllegal();
		$this->load->view('front-end/template/template',$data);
	}

}

/* End of file fro_legal_ct.php */
/* Location: ./application/controllers/fro_legal_ct.php */