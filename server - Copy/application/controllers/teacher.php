<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$data = array('user_type' => 'teacher');
		$this->load->view('my_custom/teacher-main', $data);
	}

	// first step sign up page
	public function start_signup () 
	{
		// get list of country names
		$countries = $this->my_conf->getCountries();
		
		// get list of country code
		$country_codes = $this->my_conf->getCountryCodes();

		$data = array('countries' => $countries, 'country_codes' => $country_codes);
		$this->load->view('my_custom/teacher-sign-up-first', $data);
	}

	// action first step submit
	public function first_signup_action () 
	{
		$countries = $this->my_conf->getCountries();

		$full_name = $this->input->post('full_name');
		$display_name = $this->input->post('display_name');
		$user_email = $this->input->post('email');
		$user_password = $this->input->post('password');
		$confirm_pw = $this->input->post('confirm_pw');
		$teach_languages = $countries[$this->input->post('teach_language')];
		$teach_languages = array($teach_languages);
		$native_language = $countries[$this->input->post('native_language')];
		$fluent_language = $countries[$this->input->post('fluent_language')];
		$gender = $this->input->post('gender');
		$dob_month = $this->input->post('dob_month');
		$dob_day = $this->input->post('dob_day');
		$nationality = $countries[$this->input->post('from_country')];
		$residing_in = $this->input->post('residing_in');
		$paypal_id = $this->input->post('paypal_id');
		$country_code = $this->input->post('country_code');
		$phone_number = $this->input->post('mobile_number');

		// check password
		if($user_password != $confirm_pw) {
			$this->start_signup();
			return false;
		}

		$params = array('full_name' => $full_name, 'display_name' => $display_name, 'user_email' => $user_email, 
								'user_password' => $user_password, 'teach_languages' => $teach_languages, 'native_language' => $native_language, 
								'fluent_language' => $fluent_language, 'gender' => $gender, 'dob_month' => $dob_month, 
								'dob_day' => $dob_day, 'nationality' => $nationality, 'residing_in' => $residing_in, 
								'paypal_id' => $paypal_id, 'country_code' => $country_code, 'phone_number' => $phone_number);

		$result = $this->http_req->send_request(json_encode($params), $this->http_req->teacher_register_step_one);

		$result  = json_decode($result);
		$result_code = $result->result_code;
		$result_data = $result->result_data;

		// save data in session
		$this->session->set_userdata(array(
                            'user_id'       => $result_data->teacher_id,
                            'user_email'      => $user_email,
                            'user_password'       => $user_password
                    ));

		if($result_code == $this->http_req->success_code) {
			$this->load->view('my_custom/teacher-sign-up-second');
		} else {
			$this->start_signup();
		}
		
	}

	// action second step submit
	public function second_signup_action () 
	{
		$hour_rate = $this->input->post('hour_rate');
		$overview = $this->input->post('overview');
		$user_photo = "";

		$teacher_id = $this->session->userdata('user_id');
		$params = array('teacher_id' => $teacher_id, 'hour_rate' => $hour_rate, 'overview' => $overview, 'user_photo' => $user_photo);

		// send request
		$result = $this->http_req->send_request(json_encode($params), $this->http_req->teacher_register_step_two);
		
		$result  = json_decode($result);
		$result_code = $result->result_code;
		$result_data = $result->result_data;

		if($result_code == $this->http_req->success_code) {
			$this->load->view('my_custom/teacher-sign-up-third');
		} else {
			$this->first_signup_action();
		}

	}

	// teacher main page 
	public function main_page () 
	{
		$week_hours = $this->input->post('week_hours');
		$video_intro = "";

		$teacher_id = $this->session->userdata('user_id');
		$params = array('teacher_id' => $teacher_id, 'week_hours' => $week_hours, 'video_intro' => $video_intro);

		// send request
		$result = $this->http_req->send_request(json_encode($params), $this->http_req->teacher_register_step_last);
		
		$result  = json_decode($result);
		$result_code = $result->result_code;
		$result_data = $result->result_data;

		if($result_code == $this->http_req->success_code) {
			$params = array('user_email' => $this->session->userdata('user_email'), 'user_password' => $this->session->userdata('user_password'));

			// send request
			$result = $this->http_req->send_request(json_encode($params), $this->http_req->teacher_login);
			
			$result  = json_decode($result);
			$result_code = $result->result_code;
			$result_data = $result->result_data;

			// save session data
			$this->session->set_userdata(json_decode(json_encode($result_data), true));

			if($result_code == $this->http_req->success_code) {
				$this->show_my_lesson();
			} else {
				$this->second_signup_action();
			}			
		} else {
			$this->second_signup_action();
		}
	}

	// teacher login
	public function login () 
	{
		$user_email = $this->input->post('user_email');
		$user_password = $this->input->post('user_password');

		$params = array('user_email' => $user_email, 'user_password' => $user_password);

		// send request
		$result = $this->http_req->send_request(json_encode($params), $this->http_req->teacher_login);
		
		$result  = json_decode($result);
		$result_code = $result->result_code;
		$result_data = $result->result_data;

		// save session data
		$this->session->set_userdata(json_decode(json_encode($result_data), true));


		if($result_code == $this->http_req->success_code) {
			$this->show_my_lesson();
		} else {
			$this->index();
		}
	}


	// set timetable 
	public function set_timetable () 
	{
		$start = $this->input->post('start');
		$end = $this->input->post('end');

		echo $start;
	}

	// show my lesson page
	public function show_my_lesson () 
	{
		// get requested lessons 
		$teacher_id = $this->session->userdata('teacher_id');
		$params = array('teacher_id' => $teacher_id);
		$result = $this->http_req->send_request(json_encode($params), $this->http_req->requested_lessons);
		$result  = json_decode($result);
		$result_code = $result->result_code;
		$result_data = $result->result_data;
		$requested_lessons = json_decode(json_encode($result_data), true);

		// get upcoming lessons 
		$upcoming_result = $this->http_req->send_request(json_encode($params), $this->http_req->upcoming_lessons);
		$upcoming_result  = json_decode($upcoming_result);
		$upcoming_result_code = $upcoming_result->result_code;
		$upcoming_result_data = $upcoming_result->result_data;
		$upcoming_lessons = json_decode(json_encode($upcoming_result_data), true);

		// get data of calendar from upcoming lessons
		$upcoming_calendar_data = array();
		foreach($upcoming_lessons as $upcoming_lesson) {
			$title = $upcoming_lesson['student_name'];
			$start_date = new DateTime($upcoming_lesson['date']);
			$end_date = new DateTime($upcoming_lesson['date']);
			$start_time = strtotime($upcoming_lesson['start_time']);
			$end_time = strtotime($upcoming_lesson['end_time']);
			
			$start_date->setTime(date('H', $start_time), date('i', $start_time));
			$end_date->setTime(date('H', $end_time), date('i', $end_time));

			$event = array('title'  => $title, 
						   'start' => date_format($start_date, 'Y-m-d H:i:s'), 
						   'end' => date_format($end_date, 'Y-m-d H:i:s'));
			array_push($upcoming_calendar_data, $event);
		}

		$data = array('requested_lessons' => $requested_lessons, 
						'upcoming_lessons' => $upcoming_lessons, 
						'upcoming_calendar_data' => $upcoming_calendar_data);
		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/teacher-main-tab');
		$this->load->view('my_custom/include/teacher-section/my-lesson', $data);
		$this->load->view('my_custom/include/footer/footer');
	}

	// show inbox page
	public function show_inbox_page () 
	{
		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/teacher-main-tab');
		$this->load->view('my_custom/inbox');
		$this->load->view('my_custom/include/footer/footer');
	}	

	// show my timetable page
	public function show_my_timetable () 
	{
		// get requested lessons 
		$teacher_id = $this->session->userdata('teacher_id');
		$params = array('teacher_id' => $teacher_id);
		$result = $this->http_req->send_request(json_encode($params), $this->http_req->get_timetables);
		$result  = json_decode($result);
		$result_code = $result->result_code;
		$result_data = $result->result_data;
		$timetables = json_decode(json_encode($result_data), true);
		
		// get data of calendar from teacher timetable
		$timetable_calendar_data = array();
		foreach($timetables as $timetable) {
			$title = 'timetalbe';
			$start_date = new DateTime($timetable['date']);
			$end_date = new DateTime($timetable['date']);
			$start_time = strtotime($timetable['start_time']);
			$end_time = strtotime($timetable['end_time']);
			
			$start_date->setTime(date('H', $start_time), date('i', $start_time));
			$end_date->setTime(date('H', $end_time), date('i', $end_time));

			$event = array('title'  => $title, 
						   'start' => date_format($start_date, 'Y-m-d H:i:s'), 
						   'end' => date_format($end_date, 'Y-m-d H:i:s'));
			array_push($timetable_calendar_data, $event);
		}

		$data = array('time_tables' => $timetables, 'timetable_calendar_data' => $timetable_calendar_data, 'teacher_id' => $teacher_id);

		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/teacher-main-tab');
		$this->load->view('my_custom/include/teacher-section/timetable', $data);
		$this->load->view('my_custom/include/footer/footer');
	}

	// show my wallet page
	public function show_my_wallet () 
	{
		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/teacher-main-tab');
		$this->load->view('my_custom/include/teacher-section/wallet');
		$this->load->view('my_custom/include/footer/footer');
	}

	// show profile page
	public function show_profile () 
	{
		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/teacher-main-tab');
		$this->load->view('my_custom/include/teacher-section/teacher-profile');
		$this->load->view('my_custom/include/footer/footer');
	}
}
