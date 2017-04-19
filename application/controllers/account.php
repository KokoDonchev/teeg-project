<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
    }

    public function index() {
        $data['page'] = "Account";
        $data['handle'] = "account";

        $data['account'] = $this->data->get_account($this->session->userdata('id'));

        $this->load->view('snippets/header', $data);
        $this->load->view('vwAccount');
        $this->load->view('snippets/footer');
    }

    public function update_account() {
        $data['page'] = "Account";
        $data['handle'] = "account";

        $user = html_escape($this->input->post('username'));
        $password_one = html_escape($this->input->post('pass'));
        $password_two = html_escape($this->input->post('pass_repeat'));

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('pass', 'password', 'required');
        $this->form_validation->set_rules('pass_repeat', 'repeated password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If the form is not submitted
            $data['error'] = "Something Wrong!";
            $data['account'] = $this->data->get_account($this->session->userdata('id'));
            $this->load->view('snippets/header', $data);
            $this->load->view('vwAccount');
            $this->load->view('snippets/footer');
        } else {
            if ($password_one != $password_two) {
                $data['error'] = "The passwords don't match";
                $data['account'] = $this->data->get_account($this->session->userdata('id'));
                $this->load->view('snippets/header', $data);
                $this->load->view('vwAccount');
                $this->load->view('snippets/footer');
            } else {
                // SUCCESSFUL PART
                $salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId';
                $enc_pass = md5($salt . $password_one);
                $this->data->update_account($this->session->userdata('id'), $user, $enc_pass);
                $get_user_information = $this->data->get_account($this->session->userdata('id'));
                $this->session->set_userdata(array(
                    'id' => $get_user_information['id'],
                    'username' => $get_user_information['username'],
                    'is_logged_in' => true,
                    'user_level' => $get_user_information['access_level']
                ));
                redirect('home');
            }
        }
    }

}