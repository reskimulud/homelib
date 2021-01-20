<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller 
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     if (!$this->session->userdata('email')) {
    //         # code...
    //         redirect('landing');
    //     }
    // }
    public function index()
    {
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/template/navbar', $data);
        $this->load->view('frontend/landing/index', $data);
        $this->load->view('frontend/template/footer');
    }
}