<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_user_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
			
	}
	public function checkout($email,$pass)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('ac_email',$email);
		$this->db->where('ac_pass',md5($pass));
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}
	public function getuserbyid($id)
	{
		$this->db->select('a.ac_id,a.ac_email,a.ac_pass,a.ac_fullname,a.ac_phone,a.ac_address,a.po_id,p.po_name as po_name');
		$this->db->from('account a');
		$this->db->join('position p','a.po_id=p.po_id','inner');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update_nopass($id)
	{
		$this->db->set('ac_fullname',$this->input->post('fullname'));
		$this->db->set('ac_address',$this->input->post('address'));
		$this->db->set('ac_phone',$this->input->post('phone'));
		$this->db->where('ac_id',$id);
		$this->db->update('account');
	}
	public function update_pass($id)
	{
		$this->db->where('ac_id',$id);
		$this->db->where('ac_pass',md5($this->input->post('oldpass')));
		$query = $this->db->get('account');
		if ($query->num_rows()>0) {
			$this->db->set('ac_pass',md5($this->input->post('newpass')));
			$this->db->where('ac_id',$id);
			$this->db->where('ac_pass',md5($this->input->post('oldpass')));
			$this->db->update('account');
			return true;
		}
		else
		{
			return false;
		}
	}
}

/* End of file das_user_model.php */
/* Location: ./application/models/das_user_model.php */