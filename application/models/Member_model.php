<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Member_model extends CI_Model{
        protected $table = 'members m';

        protected $active = 1;
        protected $in_active = 0;

        public function __construct() {
            parent::__construct();
        }

        public function get_all_members() {
            $this->db->from( $this->table );
            $users = $this->db->get();
            return $users->result();
        }

        public function get_members_by_type($type_id = '') {
            $this->db->select('m.name, m.last_name, m.dni, m.type_id, mt.type_name');
            $this->db->from( $this->table );
            $this->db->join('members_type mt', 'm.type_id = mt.type_id', 'left');
            if( $type_id ) { $this->db->where('type_id', $type_id); }
            $this->db->where('m.status', $this->active);
            $users = $this->db->get();
            return $users->result();
        }

        public function members_to_assign_user() {
            $this->db->select('m.name, m.last_name, m.email, m.dni, m.type_id, mt.type_name');
            $this->db->from( $this->table );
            $this->db->join('members_type mt', 'm.type_id = mt.type_id', 'right');
            /* SELECT ALL MEMBERS THAT DONT HAVE A USER ASSIGNED */
            $where = 'm.dni NOT IN (SELECT u.member_dni FROM users u WHERE u.status = 1)';
            $this->db->where($where);
            $this->db->where('m.status', $this->active);
            $users = $this->db->get();
            return $users->result();
        }
    }
?>