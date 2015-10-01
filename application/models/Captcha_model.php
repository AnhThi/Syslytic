<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert_capt($time,$ip,$word)
	{
		$data = array(
	        'captcha_time'  => $time,
	        'ip_address'    => $ip,
	        'word'          => $word
		);
		$this->db->insert('captcha',$data);
	}

	public function check_captcha()
	{
		$expiration = time() - 7200; // Two hour limit
		$this->db->where('captcha_time < ', $expiration)
        ->delete('captcha');
		$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count == 0)
		{
		    return false; // phai nhap capt
		}
		else
		{
			return true;
		}
	}

}

/* End of file Captcha_model.php */
/* Location: ./application/models/Captcha_model.php */