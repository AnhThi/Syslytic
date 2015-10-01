<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_user_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Das_user_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in' )){
			redirect('admin/dashboard');
        }else{
        	$this->load->view('back-end/login/index');	
        }
	}

	public function checkout()
	{
		//validation rules
    	$this->form_validation->set_rules('email','Email','trim|required|valid_email');
    	$this->form_validation->set_rules('pass','Password','trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('back-end/login/index');
		}
		else
		{

			$email = $this->input->post('email');
			$pass = $this->input->post('pass');
			$kq=$this->Das_user_model->checkout($email,$pass);
			if ($kq != false) {
				foreach ($kq as $acc) {
					$data = array(
						'id' => $acc['ac_id'],
						'email' => $acc['ac_email'],
						'fullname' => $acc['ac_fullname'],
						'logged_in' =>true 
					);
				}
				$this->session->set_userdata($data);

				redirect('admin/dashboard');
			}
			else
			{
				$data['alert'] = 'Please check username or password again!.'; // tranlator en
				$this->load->view('back-end/login/index',$data);
			}
		}
	}

	public function logout()
    {
	    $this->session->sess_destroy();
	    redirect('admin');
    }

    public function update()
	{
		$check = $this->input->post('changpass');
		$id = $this->uri->segment(4);
		if ($check=='checked') {
			$this->form_validation->set_rules('oldpass','Old Password','trim|required');
			$this->form_validation->set_rules('newpass', 'New Password', 'trim|required|min_length[8]|max_length[32]|differs[oldpass]');
			$this->form_validation->set_rules('cfnewpass', 'Password Confirmation', 'trim|required|matches[newpass]');
		}
		//validation rules
    	$this->form_validation->set_rules('fullname','Fullname','trim|required');

		if ($this->form_validation->run()) {
			if ($this->input->server('REQUEST_METHOD') === 'POST')
			{
				if ($check=='checked') {
					$kq = $this->Das_user_model->update_pass($id);
					if ($kq) {
						$this->session->set_flashdata('editpass', '1');
					}
					else
					{
						$this->session->set_flashdata('editpass', '2');
					}
				}
				$acc_up = array(
					'fullname' => $this->input->post('fullname'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address')
				);
				$this->Das_user_model->update_nopass($id);
				$this->session->set_flashdata('edituser', '3');
				redirect('admin/user/edit/'.$id);
			}
		}
		else
		{
			$this->loadedit();
		}
	}

	public function loadedit()
	{
		$id = $this->uri->segment(4);
		$data['acc_edit'] = $this->Das_user_model->getuserbyid($id);
		$data['main'] = 'admin/user/edituser';
		$data['header'] = '
			<link href="'.base_url().'assets/back-end/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/messenger/css/messenger.css" rel="stylesheet" type="text/css" media="screen">
			<link href="'.base_url().'assets/back-end/plugins/messenger/css/messenger-theme-future.css" rel="stylesheet" type="text/css" media="screen">
			<link href="'.base_url().'assets/back-end/plugins/messenger/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen">
		';
		$data['footer'] = '
			<script src="'.base_url().'assets/back-end/plugins/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/autonumeric/autoNumeric.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/autosize/autosize.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/icheck/icheck.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/messenger/js/messenger.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/messenger/js/messenger-theme-future.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/messenger/js/messenger-theme-flat.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/js/messenger.js" type="text/javascript"></script>
		';

		$this->load->view('back-end/template/template',$data);
	}

}

/* End of file t.php */
/* Location: ./application/controllers/Das_user_model.php */