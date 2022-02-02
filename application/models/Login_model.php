<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login_model extends CI_Model {
        protected $table = 'users u';
        protected $active = 1;

        public function __construct(){
            parent::__construct();
        }

        public function get_user_by_login($username, $password) {

            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('email', $username);

            $user_data = $this->db->get();
            $user_data = $user_data->result();

            if ( $user_data ) {
                return $user_data;

            } else {
                return '404';
            }
        }

        public function logout() {
            $dtz = new DateTimeZone("America/Argentina/Buenos_Aires");
            $dt = new DateTime("now", $dtz);
            $currentTime = $dt->format("Y-m-d") . " " . $dt->format("H:i:s");

            $user_id = $this->session->userdata('user_id');
            $this->db->set('updated_at', $currentTime);
            $this->db->where('id', $user_id);
            $this->db->update('users');
            if($this->db->affected_rows() > 0){
                return "200";

            } else{
                return "500";
            }
        }
    }
?>