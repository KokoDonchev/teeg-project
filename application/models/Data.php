<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

    // sample insert model

    public function create_account($username, $password) {
        $sql = "INSERT INTO `teeg_users` (id, username, email, password, access_level, university_id, course_id)
                VALUES ('', '', ?, ?, 4, 1, 1)";
        $this->db->query($sql, array($username, $password));
    }

    // sample select model

    public function all_users($user_id = false) {
        if ($user_id === false) {
            $query = $this->db->query('SELECT * FROM `teeg_users`');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('teeg_users', array('id' => $user_id));
            return $query->row_array();
        }
    }

    public function check_email($email) {
        $query = $this->db->get_where('teeg_users', array('email' => $email));
        return $query->num_rows();
    }

    public function get_email($email) {
        $query = $this->db->get_where('teeg_users', array('email' => $email));
        return $query->row_array();
    }

    /*
    | -------------------------------------------------------------------
    |  Essentials
    | -------------------------------------------------------------------
    */

    public function get_university_name($uni_id) {
        $query = $this->db->get_where('teeg_universities', array('id' => $uni_id));
        return $query->row_array();
    }

    public function get_course_name($course_id) {
        $query = $this->db->get_where('teeg_courses', array('id' => $course_id));
        return $query->row_array();
    }

    /*
    | -------------------------------------------------------------------
    |  Front page
    | -------------------------------------------------------------------
    */



    /*
    | -------------------------------------------------------------------
    |  Upload content
    | -------------------------------------------------------------------
    */

    public function upload_content($title, $desc) {
        $sql = "INSERT INTO `teeg_content` (id, user_id, course_id, title, description, cont_thumb, file_type, file_ref, upload_time)
                VALUES ('', '', 1, ?, ?, 1, 1, 1, 1)";
        $this->db->query($sql, array($title, $desc));
        // user_id
        // course_id
        // title
        // description
        // cont_thumb
        // file_type
        // file_ref
        // upload_time
    }

}