<?php

class Teach_languages_model extends CI_Model {
  
  // fields
  var $teach_language_id;
  var $teacher_id;
  var $language_name;

  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
  }

  // insert teacher language
  function insert($teacher_id = -1, $languages) 
  {
  	if($teacher_id == -1) 
  		return false;
  	$this->teacher_id = $teacher_id;
    foreach ($languages as $language_name) {
      $this->language_name= $language_name;
      $result = $this->db->insert($this->my_conf->teach_languages_tbl, $this);

      if($result === false)
        return false;
    }
    
  	return true;
  }

}