<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth');
        }
    }

    function index() {
        $data['page'] = "Homepage";
        $data['handle'] = "homepage";

        $this->load->view('snippets/header', $data);
        $this->load->view('vwFront');
        $this->load->view('snippets/footer');
    }

}