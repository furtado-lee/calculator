<?php

class Calculator extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->model('Crud_model');
	}

	public function index()
	{
		$this->load->template('calculator/index');
	}

	//method to return precision of $total to decimal places specified in $decimals
	public function precision($total,$decimals) {
		return round($total,$decimals);
	}

	public function add() {
		$data = array(
				'number1' => "0",
				'number2' => "0",
				'total' => "0",
				'message' => ""
			);
		if(isset($_POST['add']))
		{
			$number1 = $_POST['number1'];
			$number2 = $_POST['number2'];

			if(is_numeric($number1) && is_numeric($number2)) { //check if values passed are numbers
				$total = $this->precision($number1 + $number2,1); //total with a precision of 1 decimal place
				$data = array(
					'number1' => $number1,
					'number2' => $number2,
					'total' => $total,
					'message' => ""
				);
				$calculation = array(
					'Number1' => $number1,
					'Number2' => $number2,
					'Operation' => 'Addition',
					'Created' => date("Y-m-d H:i:s")
				);
				$response = $this->Crud_model->saveRecords($calculation); //save records to DB
				if($response==true){
					log_message("CUSTOM", "Addition performed on $number1 and $number2");
				}
				else{
					log_message('CUSTOM', 'Could not insert row after addition.');
				}
			} else {
				$data['message'] = "Please enter a valid input!";
			}
		}
		$this->load->template('calculator/add', $data);
	}

	public function subtract() {
		$data = array(
				'number1' => "0",
				'number2' => "0",
				'total' => "0",
				'message' => ""
			);
		if(isset($_POST['subtract']))
		{
			$number1 = $_POST['number1'];
			$number2 = $_POST['number2'];
			
			if(is_numeric($number1) && is_numeric($number2)){ //check if values passed are numbers
				$total = $this->precision($number1 - $number2,1); //total with a precision of 1 decimal place
				$data = array(
					'number1' => $number1,
					'number2' => $number2,
					'total' => $total,
					'message' => ""
				);
				$calculation = array(
					'Number1' => $number1,
					'Number2' => $number2,
					'Operation' => 'Subtraction',
					'Created' => date("Y-m-d H:i:s")
				);
				$response = $this->Crud_model->saveRecords($calculation); //save records to DB
				if($response==true){
					log_message("CUSTOM", "Subtraction performed between $number1 and $number2");
				}
				else{
					log_message('CUSTOM', 'Could not insert row after Subtraction.');
				}
			} else {
				$data['message'] = "Please enter a valid input!";
			}
		}
		$this->load->template('calculator/subtract', $data);
	}

	public function multiply() {
		$data = array(
				'number1' => "0",
				'number2' => "0",
				'total' => "0",
				'message' => ""
			);
		if(isset($_POST['multiply']))
		{
			$number1 = $_POST['number1'];
			$number2 = $_POST['number2'];

			if(is_numeric($number1) && is_numeric($number2)){ //check if values passed are numbers
				$total = $this->precision($number1 * $number2,1); //total with a precision of 1 decimal place
				$data = array(
					'number1' => $number1,
					'number2' => $number2,
					'total' => $total,
					'message' => ""
				);
				$calculation = array(
					'Number1' => $number1,
					'Number2' => $number2,
					'Operation' => 'Multiplication',
					'Created' => date("Y-m-d H:i:s")
				);
				$response = $this->Crud_model->saveRecords($calculation); //save records to DB
				if($response==true){
					log_message("CUSTOM", "Multiplication performed between $number1 and $number2");
				}
				else{
					log_message('CUSTOM', 'Could not insert row after Multiplication.');
				}
			} else {
				$data['message'] = "Please enter a valid input!";
			}
		}
		$this->load->template('calculator/multiply', $data);
	}

	public function divide() {
		$data = array(
				'number1' => "0",
				'number2' => "0",
				'total' => "0",
				'message' => ""
			);
		if(isset($_POST['divide']))
		{
			$number1 = $_POST['number1'];
			$number2 = $_POST['number2'];
			
			if(is_numeric($number1) && is_numeric($number2)){ //check if values passed are numbers
				if($number2 != 0) { //ensure denominator is not 0
					$total = $this->precision($number1 / $number2,3); //total with a precision of 3 decimal place
					$data = array(
						'number1' => $number1,
						'number2' => $number2,
						'total' => $total,
						'message' => ""
					);
					$calculation = array(
						'Number1' => $number1,
						'Number2' => $number2,
						'Operation' => 'Division',
						'Created' => date("Y-m-d H:i:s")
					);
					$response = $this->Crud_model->saveRecords($calculation); //save records to DB
					if($response==true){
						log_message("CUSTOM", "Division performed between $number1 and $number2");
					}
					else{
						log_message('CUSTOM', 'Could not insert row after Division.');
					}
				} else {
					$data['message'] = "Can't divide by 0";
					log_message('CUSTOM', 'Attemped to divide number by 0.');
				}
			} else {
				$data['message'] = "Please enter a valid input!";
			}
		}
		$this->load->template('calculator/divide', $data);
	}

	public function squareRoot() {
		$data = array(
				'number1' => "0",
				'total' => "0",
				'message' => ""
			);
		if(isset($_POST['squareRoot']))
		{
			$number1 = $_POST['number1'];

			if(is_numeric($number1) && $number1 >= 0){ //check if values passed are numbers and non negative
				$total =  $this->precision(sqrt($number1),3); //total with a precision of 3 decimal place
				$data = array(
					'number1' => $number1,
					'total' => $total,
					'message' => ""
				);
				$calculation = array(
					'Number1' => $number1,
					'Operation' => 'Square Root',
					'Created' => date("Y-m-d H:i:s")
				);
				$response = $this->Crud_model->saveRecords($calculation); //save records to DB
				if($response==true){
					log_message("CUSTOM", "Square Root of $number1 calculated");
				}
				else{
					log_message('CUSTOM', 'Could not insert row after Square Root calculated.');
				}
			} else {
				$data['message'] = "Please enter a non negative integer";
				log_message('CUSTOM', 'Attempted to calculate Square Root of negative number.');
			}
		}
		$this->load->template('calculator/squareRoot', $data);
	}

	public function exponentialExpression() {
		$data = array(
				'number1' => "0",
				'total' => "0",
				'message' => ""
			);
		if(isset($_POST['exponentialExpression']))
		{
			$number1 = $_POST['number1'];

			if(is_numeric($number1)){ //check if values passed are numbers
				$total = $this->precision(exp($number1),3); //total with a precision of 3 decimal place
				$data = array(
					'number1' => $number1,
					'total' => $total,
					'message' => ""
				);
				$calculation = array(
					'Number1' => $number1,
					'Operation' => 'Exponential Expression',
					'Created' => date("Y-m-d H:i:s")
				);
				$response = $this->Crud_model->saveRecords($calculation); //save records to DB
				if($response==true){
					log_message("CUSTOM", "Exponential Expression of $number1 calculated");
				}
				else{
					log_message('CUSTOM', 'Could not insert row after Exponential Expression calculated.');
				}
			} else {
				$data['message'] = "Please enter valid input";
			}
		}
		$this->load->template('calculator/exponentialExpression', $data);
	}

}
