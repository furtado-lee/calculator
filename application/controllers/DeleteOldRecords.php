<?php

class DeleteOldRecords extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->model('Crud_model');
	}

	public function index()
	{
        $response = $this->Crud_model->deleteOldRecords(); //call method to delete old records
        if($response == true){
            $afftectedRows = $this->db->affected_rows();
            echo "$afftectedRows record(s) deleted!"; //Display number of records deleted
            log_message("CUSTOM", "$afftectedRows Records older than 5 days deleted.");
        }
        else{
            log_message('CUSTOM', 'Could not delete records.');
        }
	}

}