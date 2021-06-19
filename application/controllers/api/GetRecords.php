<?php

class GetRecords extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->model('Crud_model');
	}

	public function returnMyJson() { //method to return data in JSON format

        header('Content-Type: application/json');
        $response = $this->Crud_model->returnRecords();
        echo json_encode($response);
    }

} 