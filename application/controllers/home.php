<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth');
        }
        $this->load->library('upload');
    }

    public function index() {
        $data['page'] = "Homepage";
        $data['handle'] = "homepage";

        $this->load->view('snippets/header', $data);
        $this->load->view('vwFront');
        $this->load->view('snippets/footer');
    }

    public function upload_content() {
        $data['page'] = "Homepage";
        $data['handle'] = "homepage";

        
        // $config['upload_path'] = './uploads/';
        // $config['allowed_types'] = 'pdf';
        // $config['max_size']    = 0;
        // $this->load->library('upload', $config);

        $u_title = html_escape($this->input->post('u_title'));
        $u_desc = html_escape($this->input->post('u_desc'));
        $this->form_validation->set_rules('u_title', 'title', 'required');
        if ($this->form_validation->run() == FALSE) {
            // anything?
        } else {
            $this->data->upload_content($u_title, $u_desc);

            //upload_status 
            $data['upload_status']['type'] = "success"; // style of the response message
            $data['upload_status']['message'] = "The content has been successfully uploaded!";

            $this->load->view('snippets/header', $data);
            $this->load->view('vwFront');
            $this->load->view('snippets/footer');
        }
        
    }

}