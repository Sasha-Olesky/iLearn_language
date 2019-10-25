<?php

class Lesson_model extends CI_Model {
  
   	// fields
	var $lesson_id;
	var $teacher_id;
	var $student_id;
	var $lesson_status;
	var $time_stamp;
	var $del_flag = 0;
	var $date;
	var $start_time;
	var $end_time;
	var $user_photo = "";

	function __construct() 
  	{
    	/* Call the Model constructor */
    	parent::__construct();
	}

  	// get teacher_id
	function get_id () 
	{
	    $lesson_id = $this->db->select(array('lesson_id'))
	              ->where(array('teacher_id' => $this->teacher_id, 'student_id' => $this->student_id, 'lesson_status' => $this->lesson_status, 'date' => $this->date, 'start_time' => $this->start_time, 'end_time' => $this->end_time))
	              ->get($this->my_conf->lessons_tbl, 1)
	              ->result();
	    $this->lesson_id = $lesson_id[0]->lesson_id; 

	    return $this->lesson_id;
	}

	// get list of requested lessons
	function requested_lessons($teacher_id = "") 
	{
		if($teacher_id == "") 
			return false;
		$result = array();
		$this->teacher_id = $teacher_id;
		$query = $this->db->select(array('lesson_id', $this->my_conf->lessons_tbl.'.student_id', $this->my_conf->student_tbl.".user_photo As student_photo", 
											$this->my_conf->student_tbl.".display_name As student_name", $this->my_conf->lessons_tbl.".date", $this->my_conf->lessons_tbl.".start_time", 
											$this->my_conf->lessons_tbl.".end_time", $this->my_conf->student_tbl.".residing_in"))
						->from($this->my_conf->lessons_tbl)
						->where(array('teacher_id' => $this->teacher_id))
						->join($this->my_conf->student_tbl, $this->my_conf->lessons_tbl.".student_id = ".$this->my_conf->student_tbl.".student_id")
						->get();
		$result = json_decode(json_encode($query->result()), true);

		return $result;
	}

	// get list of upcoming lessons
	function upcoming_lessons($teacher_id = "")
	{
		if($teacher_id == "") 
			return false;
		$result = array();
		$this->teacher_id = $teacher_id;
		$query = $this->db->select(array('lesson_id', $this->my_conf->lessons_tbl.'.student_id', $this->my_conf->student_tbl.".user_photo As student_photo", 
											$this->my_conf->student_tbl.".display_name As student_name", $this->my_conf->lessons_tbl.".date", $this->my_conf->lessons_tbl.".start_time", 
											$this->my_conf->lessons_tbl.".end_time", $this->my_conf->student_tbl.".residing_in", 
											$this->my_conf->teacher_tbl.".hour_rate"))
						->from($this->my_conf->lessons_tbl)
						->where(array($this->my_conf->lessons_tbl.'.teacher_id' => $this->teacher_id))
						->join($this->my_conf->student_tbl, $this->my_conf->lessons_tbl.".student_id = ".$this->my_conf->student_tbl.".student_id")
						->join($this->my_conf->teacher_tbl, $this->my_conf->lessons_tbl.".teacher_id = ".$this->my_conf->teacher_tbl.".teacher_id")
						->get();
		$result = json_decode(json_encode($query->result()), true);

		return $result;	
	}
  	

  	// parse full fields value from array
  	function parse_values ($data = array())
  	{
    	if(array_key_exists('lesson_id', $data)) 
      		$this->lesson_id = $data['lesson_id'];

      	if(array_key_exists('teacher_id', $data)) 
      		$this->teacher_id = $data['teacher_id'];

      	if(array_key_exists('student_id', $data)) 
      		$this->student_id = $data['student_id'];

      	if(array_key_exists('lesson_status', $data)) 
      		$this->lesson_status = $data['lesson_status'];

      	if(array_key_exists('del_flag', $data)) 
      		$this->del_flag = $data['del_flag'];

      	if(array_key_exists('date', $data)) 
      		$this->date = $data['date'];

      	if(array_key_exists('start_time', $data)) 
      		$this->start_time = $data['start_time'];

      	if(array_key_exists('end_time', $data)) 
      		$this->end_time = $data['end_time'];

      	if(array_key_exists('user_photo', $data)) 
      		$this->user_photo = $data['user_photo'];
	}
}