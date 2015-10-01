<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fro_jobs_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Das_jobs_model');
		$this->load->model('Captcha_model');
	}

	public function index()
	{
		$data['main'] = 'front-end/jobs';
		$data['jobs'] = $this->Das_jobs_model->getalljobs();
		$this->load->view('front-end/template/template',$data);
	}

	public function loadapply()
	{
		$id = $this->uri->segment(4);
		$data['job'] = $this->Das_jobs_model->getjobbyid($id);
		$data['main'] = 'front-end/apply_job';
		$this->load->view('front-end/template/template',$data);
	}


	public function applyjob()
	{
		$this->form_validation->set_rules('fname','FirstName','trim|required');
		$this->form_validation->set_rules('lname','LastName','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('phone','Phone','trim|is_natural|min_length[10]|max_length[11]');
		$this->form_validation->set_rules('recaptcha','ReCaptcha','callback_check_recaptcha');
		$this->form_validation->set_rules('cv_upload','CV','callback_check_to_upload_cv');	
		if (!$this->form_validation->run()) {
			$this->loadapply();
		}
		else
		{
			$job_id = $this->uri->segment(4);
			$email = $this->input->post('email');
			$name = $email.now().'.'.$this->input->post('typecv');
			$path = './upload/jobs/cv/'.$job_id.'/';
			$field_name = 'cv_upload';
			if (!is_dir($path)) { // kiem tra xem co thu duong dan nya k
	            mkdir($path,0777,true); // neu k co thi tao.
	        }
			$config['upload_path'] = $path;
		   // $config['allowed_types'] = 'jpg|png';
		    $config['allowed_types'] = '*';
		   	$config['file_name'] = $name;
		    $config['max_size'] = '3000';
		    $config['overwrite'] = TRUE;
		    $config['remove_spaces'] = TRUE;
		    $this->upload->initialize($config);
		    if (!$this->upload->do_upload($field_name)){
	            $this->session->set_flashdata('cvup',$this->upload->display_errors());
				$this->loadapply();
	        }
	        else{
	        	$ap_cvname = $this->upload->data('file_name');
	        	$j_id = $this->uri->segment(4);
	        	$email = $this->input->post('email');
	        	$lastname = $this->input->post('lname');
	        	$firstname = $this->input->post('fname');
	        	$phone = $this->input->post('phone');
	        	$kq = $this->Das_jobs_model->applyjob($j_id,$firstname,$lastname,$email,$phone,$ap_cvname);
	        	if ($kq) {
	        		$data['title'] = 'Congratulation!';
	        		$data['des'] = 'Thanks for your time to apply your CV. We will contact you as soon as posible!';
					$data['main'] = 'front-end/result_apply';
					$this->load->view('front-end/template/template',$data);
	        	}
	        	else
	        	{
	        		$data['title'] = 'Errors!';
	        		$data['des'] = 'There are Errors! Please try againt.';
					$data['main'] = 'front-end/result_apply';
					$this->load->view('front-end/template/template',$data);
	        	}

	        	}
		}
	}

	function check_recaptcha()
	    {

		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
		    $response = $this->recaptcha->verifyResponse($recaptcha);
		    if (isset($response['success']) and $response['success'] === true) {
		        return true;
		    }
		}
		return false;
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


	public function check_to_upload_cv()
	{
		if(is_uploaded_file($_FILES['cv_upload']['tmp_name'])) 
		{  
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_to_upload_cv','No File Selected!');
			return false;
		}
	}


}

/* End of file fro_jobs_ct.php */
/* Location: ./application/controllers/fro_jobs_ct.php */
