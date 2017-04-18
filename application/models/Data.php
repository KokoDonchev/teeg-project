<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Queries extends CI_Model {

    // sample insert model

    public function create_account($username, $password, $email_address, $first_name, $last_name) {
        $sql = "INSERT INTO `teeg_users` (id, username, password, email_address, first_name, last_name, access_level, membership_level)
                VALUES ('', ?, ?, ?, ?, ?, 4, 1)";
        $this->db->query($sql, array($username, $password, $email_address, $first_name, $last_name));
    }

    // sample select model

    public function all_users($user_id = false) {
        if ($user_id === false) {
            $query = $this->db->query('SELECT * FROM `booking_users`');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('booking_users', array('id' => $user_id));
            return $query->row_array();
        }
    }

}