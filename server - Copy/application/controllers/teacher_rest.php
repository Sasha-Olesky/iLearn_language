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

class Teacher_rest extends CI_Controller {

	var $teacher_model;
	function __construct()
	{
		parent::__construct();

		$this->load->model('teacher_model');
		$this->teacher_model = new teacher_model();
	}

	// get requested lessons
	function find_teachers  () 
	{
		$data = json_decode(file_get_contents('php://input'),true);
		// $data = array('student_id' => 5, 'teach_language' => 'United States', 'speak_in' => 'United States', 'sort_price' => 0, 'sort_rating' => 0, 'skip' => 0, 'limit' => 0, 'status' => 0,);
		$result = $this->teacher_model->get_teachers($data);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
}
