<?php

class User_model extends CI_Model {
  
  // fields
  var $user_id;
  var $user_email;
  var $user_password;
  var $user_type;
  var $reg_date;
  var $del_flag = 0;

  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
  }


  // check duplicate user email
  function checkDuplicateEmail ()
  {
    $query = $this->db->where( array('user_email' => $this->user_email, 'user_type' => $this->user_type))
                      ->get($this->my_conf->user_tbl);
    $count_rows = $query->num_rows();
    if($count_rows > 0) {
      return true;
    } else {
      return false;
    }
  }

  // get id
  function get_id()
  {
  	$user_id = $this->db->select(array('user_id'))
  						->where('user_email', $this->user_email)
  						->get($this->my_conf->user_tbl, 1)
  						->result();
  	$this->user_id = $user_id[0]->user_id; 
  }
  // insert user
  function insert($user_email = "", $user_password = "", $user_type = -1) 
  {
  	if($user_email == "" || $user_password == "" || $user_type == -1) 
  		return false;
  	$this->user_email = $user_email;
  	$this->user_password = $user_password;
  	$this->user_type = $user_type;

    if($this->checkDuplicateEmail())
      return false;
  	$result = $this->db->insert($this->my_conf->user_tbl, $this);
  	$this->get_id();
    return array('user_id' => $this->user_id);
  }

  // update user data
  function update($user_id = "", $user_email = "", $user_password = "") 
  {
  	if($user_id == "" || $user_email == "" || $user_password = "")
  		return false;
  	$this->user_id = $user_id;
  	$this->user_email = $user_email;
  	$this->user_password = $user_password;
  	$result = $this->db->where('user_id', $user_id)
  						->set($this)
  						->update($this->my_conf->user_tbl);
  	return $result;
  }

}