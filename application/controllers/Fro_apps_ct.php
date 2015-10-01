<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fro_apps_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Das_apps_model');
		$this->load->model('Captcha_model');
	}

	public function index()
	{
		$appid = $this->uri->segment(2);
		
		$data['capt'] = $this->create_capt();
		$data['main'] = 'front-end/app';
		$data['app'] = $this->Das_apps_model->getproductbyid($appid);
		$data['mf'] = $this->Das_apps_model->getmfbyappid($appid);
		$data['os'] = $this->Das_apps_model->getosbyappid($appid);
		$this->load->view('front-end/template/template',$data);	
	}

	public function create_capt()
	{
		$vals = array(
	        'img_path'      => './upload/images/frontend/captcha/',
	        'img_url'       => base_url().'upload/images/frontend/captcha/'
		);
		$cap = create_captcha($vals);
		$time = $cap['time'];
		$ip = $this->input->ip_address();
		$word = $cap['word'];
		$this->Captcha_model->insert_capt($time,$ip,$word);
		return $cap['image'];
	}

	public function addrequest()
	{
		$this->form_validation->set_rules('fname','FirstName','trim|required|max_length[300]');
		$this->form_validation->set_rules('lname','LastName','trim|required|max_length[300]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('phone','Phone','trim|is_natural|min_length[10]|max_length[11]');
		$this->form_validation->set_rules('address','Address','trim|max_length[300]');
		$this->form_validation->set_rules('captcha','Captcha','callback_if_not_submit_captcha');
		if (!$this->form_validation->run()) {
			$result = array(
				'ajax' =>1,
				'error_fname' => form_error('fname'),
				'error_lname' => form_error('lname'),
				'error_email' => form_error('email'),
				'error_phone' => form_error('phone'),
				'error_address' => form_error('address'),
				'error_captcha' => form_error('captcha'),
				'capt' => $this->create_capt()
			);
			echo json_encode($result);
		}
		else
		{
			$proid = $this->uri->segment(3);
			$data =array(
				'pro_id' => $proid,
				'r_date' => date('Y/m/d'),
				'r_fname' => $this->input->post('fname'),
				'r_lname' => $this->input->post('lname'),
				'r_email' => $this->input->post('email'),
				'r_phone' => $this->input->post('phone'),
				'r_address' => $this->input->post('address')
			);
			$kq = $this->Das_apps_model->addrequest($data);
			if ($kq) {
				$result['result'] = "
				<div class='alert alert-success' role='alert'>
					<strong>Well done!</strong>Thanks for your request. We will contact you as soon as posible!<br>
				  	<a href='".base_url()."' class='alert-link'>Back to Home Page!</a>
				</div>
				";
				$result['kt'] = 0;
				echo json_encode($result);
			}
			else
			{	
				$result['result'] = "
				<div class='alert alert-warning' role='alert'>
					<strong>Warning!</strong>There are Errors! Please try againt!<br>
				  	<a href='".base_url()."' class='alert-link'>Back to Home Page!</a>
				</div>
				";
				$result['kt'] = 1;
				echo json_encode($result);
			}
		}
	}

	public function if_not_submit_captcha()
	{
		$kq = $this->Captcha_model->check_captcha();
		if ($kq) {
			return true;
		}
		else
		{
			$this->form_validation->set_message('if_not_submit_captcha','You must submit the word that appears in the image.');
			return false;
		}
	}

}

/* End of file fro_apps_ct.php */
/* Location: ./application/controllers/fro_apps_ct.php */