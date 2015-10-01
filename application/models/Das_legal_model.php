<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_legal_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function addlegal($le)
	{
		return $this->db->insert('legal_content',$le);
	}

	public function getalllegal()
	{
		$query = $this->db->get('legal_content');
		return $query->result_array();
	}

	public function check_if_letitle_exists($lec_title)
	{
		$this->db->where('lec_title',$lec_title);
		$query = $this->db->get('legal_content');
		if ($query->num_rows() > 0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function editlegal($leid,$lec_con)
	{
		$this->db->set('lec_content',$lec_con);
		$this->db->where('lec_id',$leid);
		return $this->db->update('legal_content');
	}

	public function dellegal($leid)
	{
		$this->db->where('lec_id', $leid);
		return $this->db->delete('legal_content');
	}

	public function getlegalbyid($leid)
	{
		$this->db->where('lec_id',$leid);
		$query = $this->db->get('legal_content');
		return $query->result_array();
	}

}

/* End of file das_legal_model.php */
/* Location: ./application/models/das_legal_model.php */