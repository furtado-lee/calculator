<?php
class Crud_model extends CI_Model 
{
	
	function saveRecords($data) //Insert values of operations performed
	{
        $this->db->insert('calculations',$data);
        return true;
	}

    function deleteOldRecords() //Delete records older than 5 days
	{
		$this->db->where("Created >= (now() - INTERVAL 5 DAY)");
        $this->db->delete('calculations');
        return true;
	}
	
	function returnRecords() //Return all the operations performed in the last 24 hours
	{
		$this->db->select('*');
		$this->db->from('calculations');
		$this->db->where("Created >= (now() - INTERVAL 24 HOUR)");
		return $this->db->get()->result_array();
	}
}