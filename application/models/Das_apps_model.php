<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_apps_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getproducts()
	{
		$query = $this->db->get('products');
		return $query->result_array();
	}

	public function getosbyappid($appid)
	{
		$this->db->where('pro_id',$appid);
		$query = $this->db->get('os');
		return $query->result_array();
	}

	public function getos()
	{
		$query = $this->db->get('os');
		return $query->result_array();
	}
	public function getmf()
	{
		$query = $this->db->get('main_features');
		return $query->result_array();
	}

	public function updateos($osid,$osname,$oslink,$osimgname)
	{
		if ($osimgname !=null) {
			$this->db->set('os_name',$osname);
			$this->db->set('os_link',$oslink);
			$this->db->set('os_icon',$osimgname);
		}
		else
		{
			$this->db->set('os_name',$osname);
			$this->db->set('os_link',$oslink);
		}
		$this->db->where('os_id',$osid);
		$update = $this->db->update('os');
		return $update;
	}

	public function getproductbyid($pro_id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('pro_id', $pro_id);
		$query = $this->db->get();
		return $query->result_array(); 
	}


	public function deleteproduct($proid)
	{
		$this->db->where('pro_id', $proid);
		$this->db->delete('products');
	}

	public function deleteosofapp($proid)
	{
		$this->db->where('pro_id', $proid);
		$this->db->delete('os');
	}

	public function delmfofapp($proid)
	{
		$this->db->where('pro_id', $proid);
		$this->db->delete('main_features');
	}

	public function add($p)
	{
		$insert = $this->db->insert('products', $p);
	    return $insert;
	}

	public function addos($appaddos,$osname,$oslink,$osimgname)
	{
		$data = array(
			'pro_id' => $appaddos,
			'os_name' => $osname,
			'os_link' => $oslink,
			'os_icon' => $osimgname
		);
		$insert = $this->db->insert('os', $data);
	    return $insert;
	}

	public function check_proid($proid)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('pro_id', $proid);
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function check_app_name($name)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('pro_name', $name);
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function edit($id,$pros)
	{
		$this->db->set('pro_name',$pros['pro_name']);
		$this->db->set('pro_price',$pros['pro_price']);
		$this->db->set('pro_version',$pros['pro_version']);
		$this->db->set('pro_release',$pros['pro_release']);
		$this->db->set('pro_des',$pros['pro_des']);
		if (isset($pros['pro_icon'])) {
			if (!empty($pros['pro_icon'])) {
				$this->db->set('pro_icon',$pros['pro_icon']);
			}
		}
		if (isset($pros['pro_img_bg'])) {
			if (!empty($pros['pro_img_bg'])) {
				$this->db->set('pro_img_bg',$pros['pro_img_bg']);
			}
		}
		if (isset($pros['pro_img_des'])) {
			if (!empty($pros['pro_img_des'])) {
				$this->db->set('pro_img_des',$pros['pro_img_des']);
			}
		}
		
		$this->db->where('pro_id',$id);
		$this->db->update('products');
		$report = $this->db->error;
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

	public function deleteos($osid)
	{
		$this->db->where('os_id', $osid);
		$this->db->delete('os'); 	
	}

	public function getmfbyid($mfid)
	{
		$this->db->where('mf_id',$mfid);
		$query = $this->db->get('main_features');
		return $query->result_array();
	}

	public function delmf($mfid)
	{
		$this->db->where('mf_id', $mfid);
		return $this->db->delete('main_features'); 	
	}

	public function updatemf($mfid,$mf_title,$mf_des,$mf_icon)
	{
		if (!empty($mf_icon)) {
			$this->db->set('mf_title',$mf_title);
			$this->db->set('mf_des',$mf_des);
			$this->db->set('mf_icon',$mf_icon);
		}
		else
		{
			$this->db->set('mf_title',$mf_title);
			$this->db->set('mf_des',$mf_des);
		}
		$this->db->where('mf_id',$mfid);
		$this->db->update('main_features');
		$report = $this->db->error;
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

	public function if_mftitle_exists($mftitle)
	{
		$this->db->where('mf_title',$mftitle);
		$query = $this->db->get('main_features');
		if ($query->num_rows()>0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function addmf($mf)
	{
		return $this->db->insert('main_features',$mf);
	}

	public function getmfbyappid($appid)
	{
		$this->db->where('pro_id',$appid);
		$query  = $this->db->get('main_features');
		return $query->result_array();
	}

	public function addrequest($data)
	{
		$kq = $this->db->insert('request',$data);
		return $kq;
	}
}

/* End of file das_products_model.php */
/* Location: ./application/models/das_products_model.php */