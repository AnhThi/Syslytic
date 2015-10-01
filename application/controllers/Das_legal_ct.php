<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_legal_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Das_legal_model');
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
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
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

			$data['legal'] = $this->Das_legal_model->getalllegal();
			$data['main'] = 'back-end/legal/list-of-legal';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function loadaddlegal()
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
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
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
			$data['main'] = 'back-end/legal/add-new-legal';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function addlegal()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			//validation rules
			$this->form_validation->set_rules('le_title','Title','trim|required|callback_check_if_letitle_exists|max_length[200]');

			if ($this->form_validation->run()) {
				$legal = array(
					'lec_title' => $this->input->post('le_title'), 
					'lec_content' => $this->input->post('le_content')
				);
				if ($this->Das_legal_model->addlegal($legal)) {
					$this->session->set_flashdata('addle_mess', true);
				}
				else
				{
					$this->session->set_flashdata('addle_mess',false);
				}
				redirect('admin/legal/add-new-legal');
			}
			else
			{
				$this->loadaddlegal();
			}
		}
	}

	public function check_if_letitle_exists()
	{
		$lec_title = $this->input->post('le_title');
		$kq = $this->Das_legal_model->check_if_letitle_exists($lec_title);
		if ($kq) {
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_if_letitle_exists', 'Legal Title already exists');
			return false;
		}
	}

	public function editlegal()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			$leid = $this->uri->segment(5);
			//validation rules

			$lec_content = $this->input->post('le_content');
			if ($this->Das_legal_model->editlegal($leid,$lec_content)) {
				$this->session->set_flashdata('editle_mess', true);
			}
			else
			{
				$this->session->set_flashdata('editle_mess',false);
			}
			redirect('admin/legal/list-of-legal');
		}
	}

	public function deletele()
	{
		$leid = $id = $this->uri->segment(5);
		$kq = $this->Das_legal_model->dellegal($leid);
		if ($kq) {
			$this->session->set_flashdata('delle_mess', true);
		}
		else
		{
			$this->session->set_flashdata('delle_mess',false);
		}
		redirect('admin/legal/list-of-legal');
	}
}

/* End of file das_legal_ct.php */
/* Location: ./application/controllers/das_legal_ct.php */