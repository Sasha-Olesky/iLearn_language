<?php

class Student_model extends CI_Model {
  
   	// fields
	var $student_id;
	var $user_id;
	var $display_name;
	var $residing_in;
	var $phone_number;
	var $native_language;
	var $gender = 'M';
	var $credits = 0;
	var $country_code;

	// other models
	var $user_model;
  	function __construct() 
  	{
    	/* Call the Model constructor */
    	parent::__construct();

    	//load user_model.
	    $this->user_model =& get_instance();
	    $this->user_model->load->model('user_model','user',true);
  	}

  	// get teacher_id
	function get_id () 
	{
	    $student_id = $this->db->select(array('student_id'))
	              ->where('user_id', $this->user_id)
	              ->get($this->my_conf->student_tbl, 1)
	              ->result();
	    $this->student_id = $student_id[0]->student_id; 

	    return $this->student_id;
	}
  	// student register
  	function register ($data = array()) 
  	{
  		if($data == array())
      		return false;
	    $this->parse_values($data);

	    $user_insert = $this->user_model->user->insert($data['user_email'], $data['user_password'], 1);
	    if($user_insert === false) 
	      	return false;
	    $this->user_id = $user_insert['user_id'];

	    $student_result = $this->db->insert($this->my_conf->student_tbl, $this);
	    
	    if($student_result) {
	      	return true;
	    } else {
	      	return false;
	    }
  	}

  	// log in student
	function login ($data = array()) 
	{
		if($data == array())
      		return false;
	    $user_email = $data['user_email'];
	    $user_password = $data['user_password'];
	    $query = $this->db->from($this->my_conf->student_tbl)
	            ->where(array('user_email' => $user_email, 'user_password' => $user_password, 'user_type' => 1))
	            ->join($this->my_conf->user_tbl, $this->my_conf->user_tbl.".user_id = ".$this->my_conf->student_tbl.".user_id")
	            ->get();
	    $result = json_decode(json_encode($query->result()), true);
	    if(count($result) > 0)
	      	return $result[0];
	    else 
	      	return false;
	}

  	// parse full fields value from array
  	function parse_values ($data = array())
  	{
    	if(array_key_exists('student_id', $data)) 
      		$this->student_id = $data['student_id'];

      	if(array_key_exists('user_id', $data)) 
      		$this->user_id = $data['user_id'];

      	if(array_key_exists('display_name', $data)) 
      		$this->display_name = $data['display_name'];

      	if(array_key_exists('residing_in', $data)) 
      		$this->residing_in = $data['residing_in'];

      	if(array_key_exists('phone_number', $data)) 
      		$this->phone_number = $data['phone_number'];

      	if(array_key_exists('native_language', $data)) 
      		$this->native_language = $data['native_language'];

      	if(array_key_exists('gender', $data)) 
      		$this->gender = $data['gender'];

      	if(array_key_exists('credits', $data)) 
      		$this->credits = $data['credits'];

      	if(array_key_exists('country_code', $data)) 
      		$this->country_code = $data['country_code'];

	}
}