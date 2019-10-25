<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use OpenTok\OpenTok;

class Student extends CI_Controller {

	var $teacher_model;
	function __construct()
	{
		parent::__construct();

		$this->load->model('teacher_model');
		$this->teacher_model = new teacher_model();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array('user_type' => 'student');
		$this->load->view('my_custom/student-main', $data);
	}

	// show student main page
	public function main_page()
	{
		$display_name = $this->input->post('display_name');
		$user_email = $this->input->post('user_email');
		$user_password = $this->input->post('user_password');
		$confirm_pw = $this->input->post('confirm_pw');
		$residing_in = $this->input->post('residing_in');
		$country_code = $this->input->post('country_code');
		$phone_number = $this->input->post('phone_number');

		// confirm password
		if($user_password != $confirm_pw) {
			$this->signup_action();
			return false;
		}

		$params = array('display_name' => $display_name, 'user_email' => $user_email, 'user_password' => $user_password, 
						'residing_in' => $residing_in, 'country_code' => $country_code, 'phone_number' => $phone_number);

		$result = $this->http_req->send_request(json_encode($params), $this->http_req->student_register);

		$result  = json_decode($result);
		$result_code = $result->result_code;
		$result_data = $result->result_data;

		if($result_code == $this->http_req->success_code) {
			$params = array('user_email' => $user_email, 'user_password' => $user_password);

			// send request
			$result = $this->http_req->send_request(json_encode($params), $this->http_req->student_login);
			
			$result  = json_decode($result);
			$result_code = $result->result_code;
			$result_data = $result->result_data;

			// save session data
			$this->session->set_userdata(json_decode(json_encode($result_data), true));


			if($result_code == $this->http_req->success_code) {
				$this->show_find_teachers();
			} else {
				$this->signup_action();
			}
			
		} else {
			$this->signup_action();
		}
		
	}

	// signup action
	public function start_signup () 
	{
		// get list of country code
		$country_codes = $this->my_conf->getCountryCodes();

		$data = array('country_codes' => $country_codes);
		$this->load->view('my_custom/student-sign-up', $data);
	}


	// login action
	public function login_action () 
	{
		$user_email = $this->input->post('user_email');
		$user_password = $this->input->post('user_password');

		$params = array('user_email' => $user_email, 'user_password' => $user_password);

		// send request
		$result = $this->http_req->send_request(json_encode($params), $this->http_req->student_login);
		
		$result  = json_decode($result);
		$result_code = $result->result_code;
		$result_data = $result->result_data;

		// save session data
		$this->session->set_userdata(json_decode(json_encode($result_data), true));
		
		if($result_code == $this->http_req->success_code) {
			$this->show_find_teachers();
		} else {
			$this->index();
		}
	}

	// show teacher profile
	public function show_teacher_profile() 
	{
		// $data = array();
		$this->load->view('my_custom/teacher_profile_view');
	}


	// show finding teacher page 
	public function show_find_teachers() 
	{
		// get list of country names
		$countries = $this->my_conf->getCountries();
		$student_id = $this->session->userdata('student_id');
		$data = array('countries' => $countries, 'student_id' => $student_id);

		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/student-main-tab');
		$this->load->view('my_custom/include/student-section/find-teacher', $data);
		$this->load->view('my_custom/include/footer/footer');
	}

	// show favourites page 
	public function show_favourites() 
	{
		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/student-main-tab');
		$this->load->view('my_custom/include/student-section/favourites');
		$this->load->view('my_custom/include/footer/footer');
	}

	// show inbox page 
	public function show_inbox() 
	{
		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/student-main-tab');
		$this->load->view('my_custom/inbox');
		$this->load->view('my_custom/include/footer/footer');
	}

	// show my lesson page 
	public function show_my_lessons() 
	{
		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/student-main-tab');
		$this->load->view('my_custom/include/student-section/student-lessons');
		$this->load->view('my_custom/include/footer/footer');
	}

	// show profile page 
	public function show_profile() 
	{
		$this->load->view('my_custom/include/header/header');
		$this->load->view('my_custom/include/header/student-main-tab');
		$this->load->view('my_custom/include/student-section/student-profile');
		$this->load->view('my_custom/include/footer/footer');
	}
}
