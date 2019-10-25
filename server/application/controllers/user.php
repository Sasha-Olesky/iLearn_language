<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Name:  User Controller
* 
* Author:  Akira
* Created:  8.8.2016 
* 
* Description:  User management
* 
*/

class User extends CI_Controller {

	var $user_model;
	var $teacher_model;
	var $student_model;
	function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
		$this->user_model = new User_model();

		$this->load->model('teacher_model');
		$this->teacher_model = new teacher_model();

		$this->load->model('student_model');
		$this->student_model = new Student_model();
	}

	// sign up in first step as teacher
	function teacher_register_step_one  () 
	{
		$data = json_decode(file_get_contents('php://input'),true);
		// $data = array('full_name' => 'full_name', 'display_name' => 'display_name', 'user_email' => 'user_email', 
		// 						'user_password' => 'user_password', 'teach_languages' => array('teach_languages'), 'native_language' => 'native_language', 
		// 						'fluent_language' => 'fluent_language', 'gender' => 'M', 'dob_month' => 8, 
		// 						'dob_day' => 34, 'nationality' => 'nationality', 'residing_in' => 'residing_in', 
		// 						'paypal_id' => 'paypal_id', 'country_code' => 'country_code', 'phone_number' => 'phone_number');

		$result = $this->teacher_model->register_step_one($data);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	// sign up in second step as teacher
	function teacher_register_step_two  () 
	{
		$data = json_decode(file_get_contents('php://input'),true);

		$result = $this->teacher_model->register_step_two($data);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	// sign up in last step
	function teacher_register_step_last () 
	{
		$data = json_decode(file_get_contents('php://input'),true);

		$result = $this->teacher_model->register_step_last($data);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));	
	}


	// login user as teacher
	function teacher_login () 
	{
		$data = json_decode(file_get_contents('php://input'),true);
		// $data = array('user_email' => 'hhrijy@outlook.com', 'user_password' => '111');
		$result = $this->teacher_model->login($data);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));		
	}

	// sign up user as student
	function student_register ()
	{
		$data = json_decode(file_get_contents('php://input'),true);
		
		$result = $this->student_model->register($data);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));		
	}

	// log in user as student 
	function student_login ()
	{
		$data = json_decode(file_get_contents('php://input'),true);
		// $data = array('user_email' => 'bryan@outlook.com', 'user_password' => '111');

		$result = $this->student_model->login($data);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));			
	}
}
