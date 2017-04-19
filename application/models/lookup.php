<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lookup extends CI_Model {

    public function search($search) {
        $sql = "select * from `teeg_content` WHERE file_name like '%".$search."%'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

}