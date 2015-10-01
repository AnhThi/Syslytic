<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_customer_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Das_customer_model');
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
				<link href="'.base_url().'assets/back-end/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>  
			';
			$data['footer'] = '
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
			';

			$data['request'] = $this->Das_customer_model->getrequest();
			$data['main'] = 'back-end/customers/list-of-requests';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function delrequest()
	{
		$reid = $id = $this->uri->segment(5);
		$kq = $this->Das_customer_model->delrequest($reid);
		if ($kq) {
			$this->session->set_flashdata('re_mess', true);
		}
		else
		{
			$this->session->set_flashdata('re_mess',false);
		}
		redirect('admin/customers/list-of-requests');
	}
}