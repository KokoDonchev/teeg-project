<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth');
        }
    }

    public function index() {
        $data['page'] = "Account";
        $data['handle'] = "account";

        $this->load->view('snippets/header', $data);
        $this->load->view('vwAccount');
        $this->load->view('snippets/footer');
    }

}