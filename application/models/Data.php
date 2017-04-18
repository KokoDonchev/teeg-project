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

}