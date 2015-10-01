<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_jobs_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Das_jobs_model');
	}

	public $cv_name;

	public function index()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			$data['header'] = '
				<link href="'.base_url().'assets/back-end/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen">
			';
			$data['footer'] = '
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
			';


			$data['jobs'] = $this->Das_jobs_model->getalljobs();
			$data['main'] = 'back-end/jobs/list-of-jobs';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function loadaddjob()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			$data['header'] = '
				<link href="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/uikit/css/uikit.min.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/uikit/css/components/htmleditor.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen">
			';
			$data['footer'] = '
				<script src="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/js/uikit.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/markdown/markdown.js"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/addon/mode/overlay.js"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/xml/xml.js"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/gfm/gfm.js"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/marked/marked.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/js/components/htmleditor.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
			';

			$data['posi'] = $this->Das_jobs_model->getponotinjobs();
			$data['main'] = 'back-end/jobs/add-new-job';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function addjob()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			//validation rules
			$this->form_validation->set_rules('j_des','Job Description','trim|required');
			$this->form_validation->set_rules('j_info','Job Infomation','trim|required');

			if ($this->form_validation->run()) {
				$re = $this->input->post('j_stt');
				if (empty($re)) {
					$re=0;
				}
				$job = array(
					'po_id' => $this->input->post('po_select'),
					'j_des' => $this->input->post('j_des'),
					'j_stt' => $re,
					'j_info' => $this->input->post('j_info'),
				);
				if ($this->Das_jobs_model->addjob($job)) {
					$this->session->set_flashdata('job_mess', true);
				}
				else
				{
					$this->session->set_flashdata('job_mess',false);
				}
				redirect('admin/jobs/add-new-job');
			}
			else
			{
				$this->loadaddjob();
			}
		}
	}

	public function editjob()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			$jobid = $this->uri->segment(5);
			//validation rules
			$this->form_validation->set_rules('j_des','Job Description','trim|required');
			$this->form_validation->set_rules('j_info','Job Infomation','trim|required');

			if ($this->form_validation->run()) {
				$re = $this->input->post('j_stt');
				if (empty($re)) {
					$re=0;
				}
				$job = array(
					'j_des' => $this->input->post('j_des'),
					'j_stt' => $re,
					'j_info' => $this->input->post('j_info'),
				);
				if ($this->Das_jobs_model->editjob($jobid,$job)) {
					$this->session->set_flashdata('job_mess', true);
				}
				else
				{
					$this->session->set_flashdata('job_mess',false);
				}
				redirect('admin/jobs/list-of-jobs/update/'.$jobid);
			}
			else
			{
				$this->loadaddjob();
			}
		}
	}

	public function deljob()
	{
		$jobid = $id = $this->uri->segment(5);
		$check = $this->Das_jobs_model->check_jobs_apply($jobid);
		if ($check) {
			$kq = $this->Das_jobs_model->deljob($jobid);
			if ($kq) {
				$this->session->set_flashdata('job_mess', true);
			}
			else
			{
				$this->session->set_flashdata('job_mess',false);
			}
		}
		else
		{
			$this->session->set_flashdata('job_mess',1);
		}
		
		redirect('admin/jobs/list-of-jobs');
	}

	public function addposi()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			//validation rules
			$this->form_validation->set_rules('po_name','Position Name','trim|required|callback_check_if_po_name_exists');
			

			if ($this->form_validation->run()) {
				$po = array(
					'po_name' => $this->input->post('po_name')
				);
				if ($this->Das_jobs_model->addposi($po)) {
					$this->session->set_flashdata('po_mess', true);
				}
				else
				{
					$this->session->set_flashdata('po_mess',false);
				}
				redirect('admin/jobs/add-new-job');
			}
			else
			{
				$this->loadaddjob();
			}
		}
	}

	public function check_if_po_name_exists()
	{
		$poname = $this->input->post('po_name');
		$kq = $this->Das_jobs_model->check_if_po_name_exiss($poname);
		if ($kq) {
			return true;	
		}
		else
		{
			$this->form_validation->set_message('check_if_po_name_exists',"The Position Name Already Exists");
			return false;
		}
	}

	public function loadeditjob()
	{
		
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			$jobsid = $this->uri->segment(5);
			$data['header'] = '
				<link href="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/uikit/css/uikit.min.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/uikit/css/components/htmleditor.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen">
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen">
			';
			$data['footer'] = '
				<script src="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/js/uikit.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/markdown/markdown.js"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/addon/mode/overlay.js"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/xml/xml.js"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/gfm/gfm.js"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/marked/marked.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/uikit/js/components/htmleditor.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
			';

			$data['main'] = 'back-end/jobs/edit-job';
			$data['job'] = $this->Das_jobs_model->getjobbyid($jobsid);
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function loadlistemployment()
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

			$data['employment'] = $this->Das_jobs_model->getemployment();
			$data['main'] = 'back-end/jobs/employment';
			$this->load->view('back-end/template/template',$data);
		}
	}
	public function deleteemploy()
	{
		$emid = $id = $this->uri->segment(5);
		$kq = $this->Das_jobs_model->deleteemploy($emid);
		if ($kq) {
			$this->session->set_flashdata('empl_mess', true);
		}
		else
		{
			$this->session->set_flashdata('empl_mess',false);
		}
		redirect('admin/jobs/employment');
	}

	

	public function delpo()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('poid');
			$kt = $this->Das_jobs_model->delpo($id);
			echo $kt;
		}
	}

}