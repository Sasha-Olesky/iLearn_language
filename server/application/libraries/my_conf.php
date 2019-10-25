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

use SameerShelavale\PhpCountriesArray\CountriesArray;

class My_conf extends CI_Driver_Library {

    // table names in the database
    var $table_name = 'session_tbl';
    var $user_tbl = 'user_tbl';
    var $teacher_tbl = 'teacher_tbl';
    var $teach_languages_tbl = 'teach_languages_tbl';
    var $student_tbl = 'student_tbl';
    var $phonenumber_tbl = 'phonenumber_tbl';
    var $timetable_tbl = 'timetable_tbl';
    var $lessons_tbl = 'lessons_tbl';
    var $lesson_history_tbl = 'lesson_history_tbl';
    var $bookmark_tbl = 'bookmark_tbl';
    var $credit_pakage_tbl = 'credit_pakage_tbl';

    // get list of countries
    public function getCountries () {
        $countries = CountriesArray::get( null, 'name' );
        return $countries;
    }

    // get list of country codes
    public function getCountryCodes () {
        $countries = CountriesArray::get2d( null, array( 'name', 'num', 'isd', 'continent' ) );
        return $countries;
    }

}