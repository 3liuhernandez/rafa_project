<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model( "User_model" );
    }

    public function get_all_users() {
        $users = $this->User_model->get_users_by_role('');
        $data['list_users'] = $users;
        echo "<pre>";
        print_r($users);
        echo "</pre>";
        return $data;
    }

    public function get_users_by_role($role = '') {
        //$role = $this->input->post("role");

        $list_users = $this->User_model->get_users_by_role($role);
        echo json_encode($list_users);
    }

    public function register_user() {
        $member_dni = test_input( $this->input->post('list_members') ); // member selected at form

        $pass = test_input( $this->input->post('pwd') );
        $role = test_input( $this->input->post('role') );

        $try_insert = $this->User_model->register_user($role, $member_dni, $pass);

        echo json_encode($try_insert);
    }

    public function delete_user() {
        $member_dni = test_input( $this->input->post('member_dni') ); // member selected at form

        $try_delete = $this->User_model->delete_user($member_dni);

        echo json_encode($try_delete);
    }

}