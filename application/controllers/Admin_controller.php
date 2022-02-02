<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    function __construct() {

		parent::__construct();

		if(!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

        if($this->session->userdata('role') > 1) {
			redirect(base_url());
		}

	}

    public function index() {
        $this->load->view('admin/index');
    }

	public function users() {
		$this->load->view('admin/users');
	}

	public function users_admin() {
		$data = '';
		$this->load->view('admin/users/admin/index', $data);
	}

	public function users_normal() {
		$this->load->view('admin/users/normal/index');
	}
}