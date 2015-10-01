<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fro_index_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['main'] = 'front-end/index';
		$this->load->view('front-end/template/template',$data);
	}
	public function temp()
	{
		echo "<H1>Coming soon.</H1>";
		
	}
}

/* End of file fro_index_ct.php */
/* Location: ./application/controllers/fro_index_ct.php */