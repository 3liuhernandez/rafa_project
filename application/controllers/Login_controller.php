<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

	public function index() {
        $this->session->sess_destroy();
        $this->login();
	}

    public function login() {
        $this->load->view('login/login');
    }

    public function validate_login() {
        $email = $this->input->post('email');
        $pswd = $this->input->post('pswd');

        $validate = array();

        $email = test_input($email);
        $pswd = test_input($pswd);

        //$validate['datos'] = $email. " - ". $pswd;

        if(empty($email)){
            $validate['email'] = "E-mail Inválido";
            print json_encode($validate);
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validate['email'] = "E-mail Inválido";
            print json_encode($validate);
            exit();
        }

        $user_data = $this->Login_model->get_user_by_login(strtolower($email), $pswd);

        if(!is_array($user_data)) {
            $validate['email'] = "E-mail Inválido";
            $validate['msj'] = $user_data;
            print json_encode($validate);
            exit();
        }

        /**
         * loggin successfull
         */
        $validate['loggin'] = true;

        $user_data = $user_data[0];
        $this->session->set_userdata('logged_in', TRUE);

        $this->session->set_userdata('user_id', $user_data->id );
        $this->session->set_userdata('role', $user_data->role );
        $this->session->set_userdata('last_login', $user_data->last_login );
        $this->session->set_userdata('dni', $user_data->dni );
        $this->session->set_userdata('email', $user_data->email );

        print json_encode($validate);
    }

    public function redirect() {
        $role = $this->session->userdata('role');

        if($role == 1) {
            redirect(base_url('admin'));
        } else if($role == 2) {
            redirect(base_url('usuario'));
        }
    }

    public function logout() {

        $this->Login_model->logout();

        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('last_login');
        $this->session->unset_userdata('dni');
        $this->session->unset_userdata('email');

        $this->session->sess_destroy();

        redirect(base_url('login'));
    }
}