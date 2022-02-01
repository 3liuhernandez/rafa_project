<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class User_model extends CI_Model{
        protected $table_ = 'users u';
        protected $table = 'users';

        protected $role_admin = '1';
        protected $role_normal = '2';
        protected $role_all = '';

        protected $active = 1;
        protected $in_active = 0;

        public function __construct() {
            parent::__construct();
        }

        public function get_all_users() {
            $this->db->from( $this->table_ );
            $users = $this->db->get();
            return $users->result();
        }

        public function get_users_by_role($role = '') {
            $this->db->select('m.email, u.role, m.name, m.last_name, m.dni, m.type_id, mt.type_name');
            $this->db->from( $this->table_ );
            $this->db->join('members m', 'u.member_dni = m.dni AND m.status = 1', 'left');
            $this->db->join('members_type mt', 'm.type_id = mt.type_id', 'left');

            if( $role ) { $this->db->where('role', $role); }

            $this->db->where('u.status', $this->active);
            $users = $this->db->get();
            return $users->result();
        }


        public function register_user($role, $member_dni, $pass) {
            $data = array (
                'role' => $role,
                'pass' => $pass,
                'member_dni' => $member_dni,
                'status' => $this->active,
            );
            return $this->db->insert($this->table, $data);
        }

        public function delete_user( $member_dni ) {
            $this->db->where('member_dni', $member_dni);
            return $this->db->delete($this->table);
        }
    }
?>