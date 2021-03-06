<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth');
        }
    }

    public function index() {
        $data['page'] = "Search";
        $data['handle'] = "search";

        $search = $this->input->post('search');

        $data['search'] = $search;

        $data['result'] = $this->lookup->search($search);

        $this->load->view('snippets/header', $data);
        $this->load->view('vwSearch');
        $this->load->view('snippets/footer');
    }

}