<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_company_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Das_company_model');
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
				<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArv9ALhBv6ihfhABHEAkFg0-JHywhtgjM&sensor=false"></script>
				
				<script src="'.base_url().'assets/back-end/plugins/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/autonumeric/autoNumeric.js" type="text/javascript"></script>
			';
			$data['company'] = $this->Das_company_model->getinfomation();
			$data['social'] = $this->Das_company_model->getsocial();
			$data['main'] = 'back-end/company/infomation';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function loadaddcontact()
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
				<script src="'.base_url().'assets/back-end/plugins/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript">
				</script><script src="'.base_url().'assets/back-end/plugins/autonumeric/autoNumeric.js" type="text/javascript"></script>
			';
			$data['main'] = 'back-end/company/add-new-contact';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function addcont()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			//validation rules
			$this->form_validation->set_rules('cont_name','Contact Name','trim|required');
			$this->form_validation->set_rules('cont_email','Contact Email','trim|required|valid_email|callback_check_email_exists');
			$this->form_validation->set_rules('cont_phone','Contact Phone','trim|required|callback_check_phone_exists');

			if ($this->form_validation->run()) {
				$cont = array(
					'con_name' => $this->input->post('cont_name'), 
					'con_email' => $this->input->post('cont_email'),
					'con_phone' => $this->input->post('cont_phone'),
					'con_position' => $this->input->post('cont_pageuse')
				);
				if ($this->Das_company_model->addcont($cont)) {
					$this->session->set_flashdata('cont_mess', true);
				}
				else
				{
					$this->session->set_flashdata('cont_mess',false);
				}
				redirect('admin/company/add-new-contact');
			}
			else
			{
				$this->loadaddcontact();
			}
		}
	}

	public function check_email_exists()
	{
		$kq = $this->Das_company_model->check_email_exists($this->input->post('cont_name'));
		if ($kq) {
			return true;
		}
		else
		{
			return fasle;
		}
	}

	public function check_phone_exists()
	{
		$kq = $this->Das_company_model->check_phone_exists($this->input->post('cont_phone'));
		if ($kq) {
			return true;
		}
		else
		{
			return fasle;
		}
	}

	public function check_email_edit_exists()
	{
		$contid = $this->uri->segment(5);
		$kq = $this->Das_company_model->check_email_edit_exists($contid,$this->input->post('cont_name'));
		if ($kq) {
			return true;
		}
		else
		{
			return fasle;
		}
	}

	public function check_phone_edit_exists()
	{
		$contid = $this->uri->segment(5);
		$kq = $this->Das_company_model->check_phone_edit_exists($contid,$this->input->post('cont_phone'));
		if ($kq) {
			return true;
		}
		else
		{
			return fasle;
		}
	}

	public function editcont()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->load->view('back-end/login/index');
		}
		else
		{
			$contid = $this->uri->segment(5);
			//validation rules
			$this->form_validation->set_rules('cont_name','Contact Name','trim|required');
			$this->form_validation->set_rules('cont_email','Contact Email','trim|required|valid_email|callback_check_email_edit_exists');
			$this->form_validation->set_rules('cont_phone','Contact Phone','trim|required|callback_check_phone_edit_exists');

			if ($this->form_validation->run()) {
				$cont = array(
					'cont_name' => $this->input->post('cont_name'),
					'cont_email' => $this->input->post('cont_email'),
					'cont_phone' => $this->input->post('cont_phone'),
					'cont_pageuse' => $this->input->post('cont_pageuse')
				);
				if ($this->Das_company_model->editcont($contid,$cont)) {
					$this->session->set_flashdata('editcont_mess', true);
				}
				else
				{
					$this->session->set_flashdata('editcont_mess',false);
				}
				redirect('admin/company/list-of-contacts');
			}
			else
			{
				$this->loadlistcontact();
			}
		}
	}

	public function loadlistcontact()
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

			$data['contact'] = $this->Das_company_model->getcontact();
			$data['main'] = 'back-end/company/list-of-contacts';
			$this->load->view('back-end/template/template',$data);
		}
	}

	public function addcom()
	{
		//validation rules
		$this->form_validation->set_rules('com_name','Company Name','trim|required|max_length[200]|callback_check_com_name_exists');
		$this->form_validation->set_rules('com_address','Address','trim|required|max_length[300]');
		$this->form_validation->set_rules('com_phone','Phone','trim|required|min_length[10]');
		$this->form_validation->set_rules('com_fax','Fax','trim|required');
		$this->form_validation->set_rules('hd_long','Longitude','trim|required');
		$this->form_validation->set_rules('hd_lat','Latitude','trim|required');

		if ($this->form_validation->run()) {
			$com = array(
				'com_name' => $this->input->post('com_name'),
				'com_address' => $this->input->post('com_address'),
				'com_phone' => $this->input->post('com_phone'),
				'com_fax' => $this->input->post('com_fax'),
				'com_longi' => $this->input->post('hd_long'),
				'com_lati' => $this->input->post('hd_lat'),
			);
			if ($this->Das_company_model->addcom($com)) {
				$this->session->set_flashdata('com_mess', 3);
			}
			else
			{
				$this->session->set_flashdata('com_mess',4);
			}
			redirect('admin/company/infomation');
		}
		else
		{
			$this->index();
		}
	}

	public function check_com_name_exists()
	{
		$name = $this->input->post('com_name');
		$kq = $this->Das_company_model->check_com_name_exists($name);
		if ($kq) {
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_com_name_exists','Company Name Already exists!');
		}
	}

	public function deletecom()
	{
		$comid = $this->uri->segment(5);
		$this->Das_company_model->deletecom($comid);
		redirect('admin/company/infomation');
	}

	public function deletecont()
	{
		$contid = $this->uri->segment(5);
		$this->Das_company_model->deletecont($contid);
		redirect('admin/company/list-of-contacts');
	}

	public function addsocial()
	{
		//validation rules
		$this->form_validation->set_rules('social_link','Address','trim|required|valid_url');

		if ($this->form_validation->run()) {
			$soc = array(
				'sn_id' => $this->input->post('social_select'),
				'sn_name' => $this->input->post('social_name'),
				'sn_link' => $this->input->post('social_link'),
			);
			$kq = $this->Das_company_model->check_social_id_exists($this->input->post('social_select'));
			if ($kq) {
				if ($this->Das_company_model->addsocial($soc)) {
					$this->session->set_flashdata('social_mess', true);
				}
				else
				{
					$this->session->set_flashdata('social_mess',false);
				}
			}
			else
			{
				$this->session->set_flashdata('trungsn',3);
			}
			
			redirect('admin/company/infomation');
			}
		else
		{
			$this->index();
		}
	}

	public function deletesocial()
	{
		$soid = $this->uri->segment(6);
		$this->Das_company_model->deletesocial($soid);
		redirect('admin/company/infomation');
	}

	public function updatecom()
	{
		//validation rules
		$this->form_validation->set_rules('com_name','Company Name','trim|required');
		$this->form_validation->set_rules('com_address','Address','trim|required');
		$this->form_validation->set_rules('com_phone','Phone','trim|required');
		$this->form_validation->set_rules('com_fax','Fax','trim|required');
		$this->form_validation->set_rules('com_longi','Longitude','trim|required');
		$this->form_validation->set_rules('com_lati','Latitude','trim|required');

		if ($this->form_validation->run()) {
			$com_id = $this->uri->segment(5);
			$info = array(
				'com_name' => $this->input->post('com_name'),
				'com_address' => $this->input->post('com_address'),
				'com_phone' => $this->input->post('com_phone'),
				'com_fax' => $this->input->post('com_fax'),
				'com_longi' => $this->input->post('com_longi'),
				'com_lati' => $this->input->post('com_lati'),
			);
			if ($this->Das_company_model->updatecom($com_id,$info)) {
				$this->session->set_flashdata('com_mess', 1);
			}
			else
			{
				$this->session->set_flashdata('com_mess_up',2);
			}
			redirect('admin/company/infomation');
		}
		else
		{
			$this->index();
		}
	}
}

/* End of file das_company_ct.php */
/* Location: ./application/controllers/das_company_ct.php */