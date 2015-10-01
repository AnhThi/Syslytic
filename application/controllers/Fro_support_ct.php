<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fro_support_ct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Captcha_model');
	}

	public function index()
	{
		$data['main'] = 'front-end/support';
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

	public function addsupport()
	{
		$this->form_validation->set_rules('fname','FirstName','trim|required|max_length[300]');
		$this->form_validation->set_rules('lname','LastName','trim|required|max_length[300]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('phone','Phone','trim|is_natural|min_length[10]|max_length[11]');
		$this->form_validation->set_rules('cmt','Address','trim|required|max_length[300]');
		$this->form_validation->set_rules('zip','Zipcode','trim|is_natural');
		$this->form_validation->set_rules('recaptcha','ReCaptcha','callback_check_recaptcha');
		if (!$this->form_validation->run()) {
			$result = array(
				'ajax' =>1,
				'error_fname' => form_error('fname'),
				'error_lname' => form_error('lname'),
				'error_email' => form_error('email'),
				'error_phone' => form_error('phone'),
				'error_cmt' => form_error('cmt'),
				'error_zip' => form_error('zip'),
				'error_recaptcha' => form_error('recaptcha'),
				'capt' => $this->create_capt()
			);
			echo json_encode($result);
		}
		else
		{
			$this->email->from('nhokgalai@gmail.com', 'Email Support');
		    $this->email->to($this->input->post('email'));
		    $this->email->cc('nhoxgalai@gmail.com'); 
		    $this->email->subject($this->input->post('fname').' Need to support!');
		    $this->email->message(
		    	'First Name: '.$this->input->post('fname').'<br>'.
		    	'Last Name: '.$this->input->post('lname').'<br>'.
		    	'Phone: '.$this->input->post('phone').'<br>'.
		    	'Address: '.$this->input->post('address').'<br>'.
		    	'City: '.$this->input->post('city').'<br>'.
		    	'State/Province: '.$this->input->post('s_p').'<br>'.
		    	'Zip/Postal Code: '.$this->input->post('zip').'<br>'.
		    	'Industry: '.$this->input->post('indus').'<br>'.
		    	'Message:<br>'.
		    	$this->input->post('cmt')
		    );
		    if ($this->email->send())
		    {
		        $result['result'] = "
				<div class='alert alert-success' role='alert'>
					<strong>Well done!</strong>Thanks for your mail. We will contact you as soon as posible!<br>
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

	function check_recaptcha()
	    {

		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
		    $response = $this->recaptcha->verifyResponse($recaptcha);
		    if (isset($response['success']) and $response['success'] === true) {
		        return true;
		    }
		}
		$this->form_validation->set_message('check_recaptcha','Please Check Captcha!');
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

}

/* End of file fro_support_ct.php */
/* Location: ./application/controllers/fro_support_ct.php */
