<?php

    if ( !function_exists( 'isLogged' ) ) {
        function isLogged() {
            $CI = &get_instance();
            if ( $CI->session->userdata( 'is_logged' ) ) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    if ( !function_exists( 'test_input' ) ) {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = mb_strtolower($data);
            return $data;
        }
    }

?>