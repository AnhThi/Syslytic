<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_customer_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getrequest()
	{
		$this->db->select('request.r_id');
		$this->db->select('request.r_fname');
		$this->db->select('request.r_lname');
		$this->db->select('request.r_email');
		$this->db->select('request.r_phone');
		$this->db->select('request.r_address');
		$this->db->select('request.r_date');
		$this->db->select('products.pro_name as pro_name');

		$this->db->from('request');
		$this->db->join('products', 'request.pro_id = products.pro_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delrequest($reid)
	{
		$this->db->where('r_id', $reid);
		return $this->db->delete('request');
	}

}

/* End of file das_customer_ct.php */
/* Location: ./application/models/das_customer_ct.php */