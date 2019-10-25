<?php

class Teacher_model extends CI_Model {
  
   // fields
  var $teacher_id;
  var $user_id;
  var $full_name;
  var $display_name;
  var $native_language;
  var $fluent_language;
  var $gender;
  var $dob_month;
  var $dob_day;
  var $nationality;
  var $residing_in;
  var $paypal_id;
  var $country_code;
  var $phone_number;
  var $hour_rate;
  var $overview;
  var $user_photo;
  var $video_intro;
  var $status = 0;                // online status
  var $online_for;
  var $credits = 0;               // default value
  var $week_hours;
  var $rating = 0;                // default value

  // other models
  var $user_model;
  var $teach_languages_model;
  
  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();

    //load user_model.
    $this->user_model =& get_instance();
    $this->user_model->load->model('user_model','user',true);

    //load teach_languages_model.
    $this->teach_languages_model =& get_instance();
    $this->teach_languages_model->load->model('teach_languages_model','teach',true);
  }

  // get teacher_id
  function get_id () 
  {
    $teacher_id = $this->db->select(array('teacher_id'))
              ->where('user_id', $this->user_id)
              ->get($this->my_conf->teacher_tbl, 1)
              ->result();
    $this->teacher_id = $teacher_id[0]->teacher_id; 

    return $this->teacher_id;
  }

  // register teacher on first step
  function register_step_one ($data = array()) 
  {
    if($data == array())
      return false;
    $this->parse_values($data);
    $teach_languages = $data['teach_languages'];

    $user_insert = $this->user_model->user->insert($data['user_email'], $data['user_password'], 0);
    if($user_insert === false) 
      return false;
    $this->user_id = $user_insert['user_id'];

    // insert languages to teach for teacher
    $teacher_result = $this->db->insert($this->my_conf->teacher_tbl, $this);
    $this->get_id();
    $this->teach_languages_model->teach->insert($this->teacher_id, $teach_languages);

    if($teacher_result) {
      return array('teacher_id' => $this->teacher_id);
    } else {
      return false;
    }
  }

  // register teacher on second step
  function register_step_two ($data = array()) 
  {
    if($data == array())
      return fasle;
    $this->parse_values($data);
    $this->teacher_id = $data['teacher_id'];

    $update = $this->db->where('teacher_id', $this->teacher_id)
                      ->set($data)
                      ->update($this->my_conf->teacher_tbl);
    return $update;
  }

  // reigster
  function register_step_last ($data = array()) 
  {
    if($data == array())
      return fasle;
    $this->parse_values($data);
    $this->teacher_id = $data['teacher_id'];

    $update = $this->db->where('teacher_id', $this->teacher_id)
                      ->set($data)
                      ->update($this->my_conf->teacher_tbl);
    return $update; 
  }

  // log in
  function login ($data = array()) 
  {
    if($data == array())
      return false;

    // getting user info
    $user_email = $data['user_email'];
    $user_password = $data['user_password'];

    $query = $this->db->from($this->my_conf->teacher_tbl)
            ->where(array('user_email' => $user_email, 'user_password' => $user_password, 'user_type' => 0))
            ->join($this->my_conf->user_tbl, $this->my_conf->user_tbl.".user_id = ".$this->my_conf->teacher_tbl.".user_id")
            ->get();
    $result = json_decode(json_encode($query->result()), true);
    if(count($result) > 0) {
      $response = $result[0];
      // update user status as online
      $this->db->where('teacher_id', $response['teacher_id'])
              ->set(array('status' => 0))
              ->update($this->my_conf->teacher_tbl);
      return $result[0];
    } else 
      return false;
  }

  // get list of teachers 
  function get_teachers ($data = array()) 
  {
    if($data == array())
      return false;
    $teach_language = $data['teach_language'];
    $speak_in = $data['speak_in'];
    $sort_price = $data['sort_price'];
    $sort_rating = $data['sort_rating'];
    $sort_stutus = $data['status'];
    $skip = $data['skip'];
    $limit = $data['limit'];
    $status = $data['status'];

    $this->db->select(array($this->my_conf->teacher_tbl.'.teacher_id', 'full_name as teacher_name', 'status', 'residing_in', 'overview'))
                      ->from($this->my_conf->teacher_tbl)
                      ->join($this->my_conf->teach_languages_tbl, $this->my_conf->teach_languages_tbl.'.teacher_id='.$this->my_conf->teacher_tbl.'.teacher_id');
    
    if($sort_stutus == 0 || $sort_stutus == 1) {
      $this->db->where('status', $sort_stutus);
    }
    if($teach_language != "Any") {
      $this->db->where('language_name', $teach_language);
    }
    if($speak_in != "Any") {
      $this->db->where('native_language', $speak_in);
    }
    if($sort_price == 0) {          // low-high
      $this->db->order_by('hour_rate', 'asc');
    } else {                        // high-low
      $this->db->order_by('hour_rate', 'desc');
    }
    if($sort_rating == 0) {          // low-high
      $this->db->order_by('rating', 'asc');
    } else {                        // high-low
      $this->db->order_by('rating', 'desc');
    }
    $query = $this->db->get();
    $temp_result = json_decode(json_encode($query->result()), true);

    //get list of languages which teach want to teach and totoal taught
    $result = array();
    foreach ($temp_result as $item) {
      // get languages
      $lan_query = $this->db->select('language_name')
                          ->where('teacher_id', $item['teacher_id'])  
                          ->get($this->my_conf->teach_languages_tbl);
      $lan_array = json_decode(json_encode($lan_query->result()), true);
      // get total taught
      $taught_array = array();
      $taught_query = $this->db->from($this->my_conf->lesson_history_tbl)
                              ->where($this->my_conf->lessons_tbl.'.teacher_id', $item['teacher_id'])
                              ->join($this->my_conf->lessons_tbl, $this->my_conf->lessons_tbl.'.lesson_id='.$this->my_conf->lesson_history_tbl.'.lesson_id')
                              ->get();
      $taught_array = json_decode(json_encode($taught_query->result()), true);
      $total_taught = count($taught_array);

      $item['teach_languages'] = $lan_array;
      $item['taught_total'] = $total_taught;
      $item['rate_schedule'] = 3;
      $item['rate_demand'] = 1;

      array_push($result, $item);
    }
    

    return $result;
  }

  // parse full fields value from array
  function parse_values ($data = array())
  {
    if(array_key_exists('teacher_id', $data)) 
      $this->teacher_id = $data['teacher_id'];

    if(array_key_exists('user_id', $data))
      $this->user_id = $data['user_id'];

    if(array_key_exists('full_name', $data))
      $this->full_name = $data['full_name'];

    if(array_key_exists('display_name', $data))
      $this->display_name = $data['display_name'];

    if(array_key_exists('native_language', $data))
      $this->native_language = $data['native_language'];

    if(array_key_exists('fluent_language', $data))
      $this->fluent_language = $data['fluent_language'];

    if(array_key_exists('gender', $data))
      $this->gender = $data['gender'];

    if(array_key_exists('dob_month', $data))
      $this->dob_month = $data['dob_month'];

    if(array_key_exists('dob_day', $data))
      $this->dob_day = $data['dob_day'];

    if(array_key_exists('nationality', $data))
      $this->nationality = $data['nationality'];

    if(array_key_exists('residing_in', $data))
      $this->residing_in = $data['residing_in'];

    if(array_key_exists('paypal_id', $data))
      $this->paypal_id = $data['paypal_id'];

    if(array_key_exists('phone_id', $data))
      $this->phone_id = $data['phone_id'];

    if(array_key_exists('hour_rate', $data))
      $this->hour_rate = $data['hour_rate'];

    if(array_key_exists('overview', $data))
      $this->overview = $data['overview'];

    if(array_key_exists('user_photo', $data))
      $this->user_photo = $data['user_photo'];

    if(array_key_exists('video_intro', $data))
      $this->video_intro = $data['video_intro'];

    if(array_key_exists('status', $data))
      $this->status = $data['status'];

    if(array_key_exists('online_for', $data))
      $this->online_for = $data['online_for'];

    if(array_key_exists('credits', $data))
      $this->credits = $data['credits'];

    if(array_key_exists('week_hours', $data))
      $this->week_hours = $data['week_hours'];

    if(array_key_exists('country_code', $data))
      $this->country_code = $data['country_code'];

    if(array_key_exists('phone_number', $data))
      $this->phone_number = $data['phone_number'];

    if(array_key_exists('rating', $data))
      $this->rating = $data['rating'];
  }
}