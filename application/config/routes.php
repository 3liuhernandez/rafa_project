<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login_controller';
$route['/'] = 'Login_controller';
$route['user_redirect'] = 'Login_controller/redirect';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'Home_controller';

// LOGIN CONTROLLER
$route['login'] = 'Login_controller';
$route['validate_login'] = 'Login_controller/validate_login';
$route['logout'] = 'Login_controller/logout';


// ADMIN
$route['admin'] = 'Admin_controller/index';

/* USUARIOS */
    /* VIEWS */
        /* ADMINS */
        $route['admin/users/admin']  = 'Admin_controller/users_admin';
        /* NORMALES */
        $route['admin/users/normal'] = 'Admin_controller/users_normal';

    /* GETTERS */
        /* ALL */
        $route['admin/users/admin/all']       = 'User_controller/get_all_users';
        /* BY ROLE */
        $route['admin/get_users_by_role/(:num)'] = 'User_controller/get_users_by_role/$1';

    /* SETTERS */
        $route['admin/register_user'] = 'User_controller/register_user';
        $route['admin/delete_user'] = 'User_controller/delete_user';

