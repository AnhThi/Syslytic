<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_slider_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getslider()
	{
		$query = $this->db->get('slider');

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		else
		{
			$sli = array();
			array_push($sli, array(
				'sl_id' => 1,
				'sl_des' =>'Wellcome to Syslityc',
				'sl_img' => 'slider/default_bg.jpg'
			));
			return $sli;
		}
	}

}

/* End of file das_slider_model.php */
/* Location: ./application/models/das_slider_model.php */