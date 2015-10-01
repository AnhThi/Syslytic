<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_social_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getsocial()
	{
		$query = $this->db->get('social_network');
		return $query->result_array();
	}

}

/* End of file das_social_model.php */
/* Location: ./application/models/das_social_model.php */