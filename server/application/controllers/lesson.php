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

class Lesson extends CI_Controller {

	var $lesson_model;
	var $timetable_model;
	function __construct()
	{
		parent::__construct();

		$this->load->model('lesson_model');
		$this->lesson_model = new Lesson_model();

		$this->load->model('timetable_model');
		$this->timetable_model = new Timetable_model();
	}

	// get requested lessons
	function requested_lessons  () 
	{
		$data = json_decode(file_get_contents('php://input'),true);
		$teacher_id = $data['teacher_id'];

		$result = $this->lesson_model->requested_lessons($teacher_id);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	// get upcoming lessons
	function upcoming_lessons () 
	{
		$data = json_decode(file_get_contents('php://input'),true);
		$teacher_id = $data['teacher_id'];
		// $teacher_id = 38;

		$result = $this->lesson_model->upcoming_lessons($teacher_id);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));	
	}


	// get list of timetables
	function get_timetables() 
	{
		$data = json_decode(file_get_contents('php://input'),true);
		$teacher_id = $data['teacher_id'];
		
		$result = $this->timetable_model->get_list_timetable($teacher_id);
		if($result === false) {
			$response = array('result_code' => $this->http_req->err_code, 'result_data' => array());
		} else {
			$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);
		}

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));		
	}

	// set timetable
	function set_timetable() 
	{
		$data = json_decode(file_get_contents('php://input'),true);
		// $data = array('teacher_id' => 38, 'events' => array(array('date' => '2016-08-3', 'start_time' => '3:32:00', 'end_time' => '4:50:00'), array('date' => '2016-08-3', 'start_time' => '3:32:00', 'end_time' => '4:50:00')));
		
		$result = $this->timetable_model->set_timetable($data);
		$response = array('result_code' => $this->http_req->success_code, 'result_data' => $result);

		// print response
		$this->output->set_content_type('application/json')->set_output(json_encode($response));			
	}
}
