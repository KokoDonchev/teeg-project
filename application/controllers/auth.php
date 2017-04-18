<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
    }

    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            redirect('home');
        } else {
            $data['page'] = "Login";

            $this->load->view('vwHome', $data);
        }
    }

    public function do_login() {            
        $data['page'] = "Login";
        $data['handle'] = "login";
        
        if ($this->session->userdata('is_logged_in')) { 
            redirect('home');
        } else {
            $user = html_escape($this->input->post('t_user'));
            $password = html_escape($this->input->post('t_pass'));
            $this->form_validation->set_rules('t_user', 'Email', 'required');
            $this->form_validation->set_rules('t_pass', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('vwHome', $data);
            } else {
                $salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId';
                $enc_pass = md5($salt . $password);
                $sql = "SELECT * FROM teeg_users WHERE email = ? AND password = ?";
                $val = $this->db->query($sql, array($user, $enc_pass));
                
                if ($val->num_rows()) {
                    foreach ($val->result_array() as $recs => $res) {
                        $this->session->set_userdata(array(
                            'id' => $res['id'],
                            'username' => $res['username'],
                            'is_logged_in' => true,
                            'user_level' => $res['access_level']
                        ));
                    }
                    
                    redirect('home');
                } else {
                    $data['error'] = "Wrong username or password!";
                    $this->load->view('vwHome', $data);
                }
            }
        }
    }

    public function do_register() {
        $data['page'] = "Register";
        $data['handle'] = "login";

        $user = html_escape($this->input->post('t_user'));
        $password_one = html_escape($this->input->post('t_pass'));
        $password_two = html_escape($this->input->post('t_pass_repeat'));

        $this->form_validation->set_rules('t_user', 'email', 'required');
        $this->form_validation->set_rules('t_pass', 'password', 'required');
        $this->form_validation->set_rules('t_pass_repeat', 'repeated password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If the form is not submitted
            $this->load->view('vwHome', $data);
        } else {
            $check_username = $this->data->check_email($user);
            if ($check_username > 0) {
                $data['error'] = "The username is already taken";
                $this->load->view('vwHome', $data);
            } else {
                if ($password_one != $password_two) {
                    $data['error'] = "The passwords don't match";
                    $this->load->view('vwHome', $data);
                } else {
                    // SUCCESSFUL PART
                    $salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId';
                    $enc_pass = md5($salt . $password_one);
                    $this->data->create_account($user, $enc_pass);
                    $get_user_information = $this->data->get_email($user);
                    $this->session->set_userdata(array(
                        'id' => $get_user_information['id'],
                        'username' => $get_user_information['username'],
                        'is_logged_in' => true,
                        'user_level' => $get_user_information['access_level']
                    ));
                    redirect('home');
                }
            }
//            $this->load->view('snippets/header', $data);
//            $this->load->view('vwRegister');
//            $this->load->view('snippets/footer');
        }
    }

    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('is_logged_in');   
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('auth', 'refresh');
    }

}