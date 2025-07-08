<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('check_login')) {
    function check_login()
    {
        $CI = &get_instance(); // Mendapatkan instance CodeIgniter
        $CI->load->library('session'); // Memuat library session

        // Cek apakah session 'user_id' ada
        if (!$CI->session->userdata('user_id')) {
            // Jika session tidak ada, redirect ke halaman login
            redirect(base_url('index.php/welcome/login'));
        }
    }
}

if (!function_exists('check_role')) {
    function check_role($required_role = 'Admin')
    {
        $CI = &get_instance(); // Mendapatkan instance CodeIgniter
        $CI->load->library('session'); // Memuat library session
        $CI->load->helper('url'); // Memuat helper untuk redirect

        // Cek apakah session 'role' ada dan sesuai dengan role yang diinginkan
        $user_role = $CI->session->userdata('role');

        if ($user_role !== $required_role) {
            redirect(base_url('index.php/welcome/denied'));
        }
    }
}


