<?php
// Codeigniter access check, remove it for direct use
if( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/**
 * my configuration class
 *
 *
 * @author
 * 
 */


class Http_req extends CI_Driver_Library {

    // server urls
    var $server_url = 'http://192.168.1.108:3737/index.php/';

    var $teacher_register_step_one = 'user/teacher_register_step_one';
    var $teacher_register_step_two = "user/teacher_register_step_two";
    var $teacher_register_step_last = "user/teacher_register_step_last";
    var $teacher_login = "user/teacher_login";

    var $student_register = "user/student_register";
    var $student_login = "user/student_login";
    var $find_teachers = "teacher-rest/find_teachers";

    var $requested_lessons = "lesson/requested_lessons";
    var $upcoming_lessons = "lesson/upcoming_lessons";
    var $get_timetables = "lesson/get_timetables";
    var $set_timetable = "lesson/set_timetable";

    // result code.
    var $success_code = 200;
    var $disconnect_code = 100;
    var $err_code = 404;

    // send request 
    public function send_request($data_string, $request_url) {
        
        $curl = curl_init($this->server_url.$request_url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);

        return $result;
    }
}