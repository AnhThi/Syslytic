<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_jobs_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getemployment()
	{
		$this->db->select('apply_job.ap_id');
		$this->db->select('apply_job.ap_firstname');
		$this->db->select('apply_job.ap_lastname');
		$this->db->select('apply_job.ap_email');
		$this->db->select('apply_job.ap_phone');
		$this->db->select('apply_job.ap_date');
		$this->db->select('apply_job.ap_cv');
		$this->db->select('apply_job.job_id');
		$this->db->select('position.po_name as po_name');

		$this->db->from('apply_job');
		$this->db->join('job', 'apply_job.job_id = job.j_id');
		$this->db->join('position', 'job.po_id = position.po_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function deleteemploy($emid)
	{
		$this->db->where('ap_id', $emid);
		return $this->db->delete('apply_job');
	}

	public function deljob($jobid)
	{
		$this->db->where('j_id', $jobid);
		return $this->db->delete('job');
	}

	public function check_jobs_apply($jobid)
	{
		$this->db->select('job_id');
		$this->db->from('apply_job');
		$this->db->where('job_id',$jobid);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function getponotinjobs()
	{
		$this->db->select('po_id');
		$this->db->from('job');
		$query = $this->db->get();
		$dspo = array();
		foreach ($query->result_array() as $q) {
			array_push($dspo, $q['po_id']);
		}
		if (count($dspo)>0){
			$this->db->where_not_in('po_id',$dspo);
		};
		
		$listpo = $this->db->get('position');
		return $listpo->result_array();
	}

	public function addposi($po)
	{
		return $this->db->insert('position',$po);
	}

	public function addjob($job)
	{
		return $this->db->insert('job',$job);
	}

	public function editjob($jobid,$job)
	{
		$this->db->where('j_id',$jobid);
		return $this->db->update('job',$job);
	}

	public function check_if_po_name_exiss($poname)
	{
		$this->db->where('po_name',$poname);
		$query = $this->db->get('position');
		if ($query->num_rows()>0) {
			return false;
		}
		else
		{
			return true;
		}
	}

	public function getalljobs()
	{
		$this->db->select('job.j_id');
		$this->db->select('job.j_des');
		$this->db->select('job.j_info');
		$this->db->select('job.j_stt');
		$this->db->select('position.po_id');
		$this->db->select('position.po_name');
		$this->db->from('job');
		$this->db->join('position','job.po_id=position.po_id','inner');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getjobbyid($jobid)
	{
		$this->db->select('job.j_id');
		$this->db->select('job.j_des');
		$this->db->select('job.j_info');
		$this->db->select('job.j_stt');
		$this->db->select('position.po_id');
		$this->db->select('position.po_name');
		$this->db->from('job');
		$this->db->join('position','job.po_id=position.po_id','inner');
		$this->db->where('j_id',$jobid);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function delpo($id)
	{
		$this->db->where('po_id',$id);
		return $query = $this->db->delete('position');
	}

	

	public function applyjob($job_id,$firstname,$lastname,$email,$phone,$cv_name)
	{
		$array = array(
			'job_id' => $job_id,
			'ap_firstname' => $firstname,
			'ap_lastname' => $lastname,
			'ap_email' => $email,
			'ap_phone' => $phone,
			'ap_date' => date('Y/m/d'),
			'ap_cv' => $cv_name
		);
		$result = $this->db->insert('apply_job',$array);
		return $result;
	}



}

/* End of file das_jobs_model.php */
/* Location: ./application/models/das_jobs_model.php */
