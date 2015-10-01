<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_company_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getinfomation()
	{
		$query = $this->db->get('company');
		return $query->result_array();
	}

	public function addcom($com)
	{
		return $this->db->insert('company',$com);
	}
	public function deletecom($comid)
	{
		$this->db->where('com_id',$comid);
		$this->db->delete('company');
	}

	public function addsocial($com)
	{
		return $this->db->insert('social_network',$com);
	}
	public function deletesocial($comid)
	{
		$this->db->where('sn_id',$comid);
		$this->db->delete('social_network');
	}

	public function deletecont($contid)
	{
		$this->db->where('con_id',$contid);
		return $this->db->delete('contact_info');
	}

	public function getsocial()
	{
		$query = $this->db->get('social_network');
		return $query->result_array();
	}

	public function getcontactbypage($page)
	{
		$this->db->where('con_position',$page);
		$query = $this->db->get('contact_info');
		return $query->result_array();
	}

	public function getcontact()
	{
		$query = $this->db->get('contact_info');
		return $query->result_array();
	}

	public function addcont($cont)
	{
		return $this->db->insert('contact_info',$cont);
	}

	public function check_email_exists($email)
	{
		$this->db->where('con_email',$email);
		$query = $this->db->get('contact_info');
		if ($query->num_rows()>0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function check_phone_exists($phone)
	{
		$this->db->where('con_phone',$phone);
		$query = $this->db->get('contact_info');
		if ($query->num_rows()>0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function check_email_edit_exists($contid,$email)
	{
		$this->db->where_not_in('con_id',$contid);
		$this->db->where('con_email',$email);
		$query = $this->db->get('contact_info');
		if ($query->num_rows()>0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function check_social_id_exists($soid)
	{
		$this->db->where('sn_id',$soid);
		$query = $this->db->get('social_network');
		if ($query->num_rows()>0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function check_com_name_exists($name)
	{
		$this->db->where('com_name',$name);
		$query = $this->db->get('company');
		if ($query->num_rows()>0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function check_phone_edit_exists($contid,$phone)
	{
		$this->db->where_not_in('con_id',$contid);
		$this->db->where('con_phone',$$phone);
		$query = $this->db->get('contact_info');
		if ($query->num_rows()>0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function editcont($conid,$cont)
	{
		$this->db->set('con_name',$cont['cont_name']);
		$this->db->set('con_email',$cont['cont_email']);
		$this->db->set('con_phone',$cont['cont_phone']);
		$this->db->set('con_position',$cont['cont_position']);
		$this->db->where('con_id',$conid);
		return $this->db->update('contact_info');
	}

	public function updatecom($id,$info)
	{
		$this->db->set('com_name',$info['com_name']);
		$this->db->set('com_address',$info['com_address']);
		$this->db->set('com_phone',$info['com_phone']);
		$this->db->set('com_fax',$info['com_fax']);
		$this->db->set('com_longi',$info['com_longi']);
		$this->db->set('com_lati',$info['com_lati']);

		$this->db->where('com_id',$id);
		$kq = $this->db->update('company',$info);
		return $kq;
	}
}

/* End of file das_company_model.php */
/* Location: ./application/models/das_company_model.php */