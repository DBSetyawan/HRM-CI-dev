<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwals_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	public function get_jadwals()
	{
	  return $this->db->get("xin_jadwals");
	}
	 
	 public function read_jadwal_information($id) {
	
		$sql = 'SELECT * FROM xin_jadwals WHERE jadwal_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}	
	public function get_company_jadwals($company_id) {
	
		$sql = 'SELECT * FROM xin_jadwals WHERE company_id = ?';
		$binds = array($company_id);
		$query = $this->db->query($sql, $binds);
		return $query;
	}	
	public function get_employee_jadwals($id) {
		
		$sql = "SELECT * FROM xin_jadwals WHERE employee_id like '%$id,%' or employee_id like '%,$id%' or employee_id = '$id'";
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
	 	return $query;
	}
	// Function to add record in table
	public function add($data){
		$this->db->insert('xin_jadwals', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_jadwal_record($id){
		$this->db->where('jadwal_id', $id);
		$this->db->delete('xin_jadwals');
		
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('jadwal_id', $id);
		if( $this->db->update('xin_jadwals',$data)) {
			return true;
		} else {
			return false;
		}		
	}
}
?>