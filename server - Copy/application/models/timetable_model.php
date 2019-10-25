<?php

class Timetable_model extends CI_Model {
  
   	// fields
   	var $timetable_id;
   	var $teacher_id;
	var $student_id;
	var $time_status = 0;
	var $date;
	var $start_time;
	var $end_time;
	var $del_flag = 0;

  	function __construct() 
  	{
    	/* Call the Model constructor */
    	parent::__construct();

  	}

  	// get teacher_id
	function get_id () 
	{
	    $timetable_id = $this->db->select(array('timetable_id'))
	              ->where(array('teacher_id' => $this->teacher_id, 'student_id' => $this->student_id, 'time_status' => $this->time_status, 
	              				'date' => $this->date, 'start_time' => $this->start_time, 'end_time' => $this->end_time, 'del_flag' => $this->del_flag))
	              ->get($this->my_conf->timetable_tbl, 1)
	              ->result();
	    $this->timetable_id = $timetable_id[0]->timetable_id; 

	    return $this->timetable_id;
	}

	// set timetable
	function set_timetable($data = array()) {
		if($data == array())
			return false;
		$events = $data['events'];
		$this->teacher_id = $data['teacher_id'];

		$this->remove_all();
		foreach ($events as $event) {
			$this->parse_values($event);
			$query = $this->db->insert($this->my_conf->timetable_tbl, $this);
			if($query == false) 
				return false;
		}
		return true;
	}

	// get list of timetable
	function get_list_timetable ($teacher_id = "") {
		if($teacher_id == "") 
			return false;
		$this->teacher_id = $teacher_id;

		$result = array();
		$query = $this->db->select(array('timetable_id', 'date', 'start_time', 'end_time'))
						  ->where(array('teacher_id' => $this->teacher_id, 'del_flag' => 0))
						  ->get($this->my_conf->timetable_tbl);
		$result = json_decode(json_encode($query->result()), true);

		return $result;
	}

	// remove all setting for teacher 
	function remove_all() {
		$query = $this->db->where('teacher_id', $this->teacher_id)
						->delete($this->my_conf->timetable_tbl);
		return $query;
	}

  	// parse full fields value from array
  	function parse_values ($data = array())
  	{
    	if(array_key_exists('timetable_id', $data)) 
      		$this->timetable_id = $data['timetable_id'];

      	if(array_key_exists('student_id', $data)) 
      		$this->student_id = $data['student_id'];

      	if(array_key_exists('teacher_id', $data)) 
      		$this->teacher_id= $data['teacher_id'];

      	if(array_key_exists('time_status', $data)) 
      		$this->time_status = $data['time_status'];

      	if(array_key_exists('date', $data)) 
      		$this->date = $data['date'];

      	if(array_key_exists('start_time', $data)) 
      		$this->start_time = $data['start_time'];

      	if(array_key_exists('end_time', $data)) 
      		$this->end_time = $data['end_time'];

      	if(array_key_exists('del_flag', $data)) 
      		$this->del_flag = $data['del_flag'];
	}
}