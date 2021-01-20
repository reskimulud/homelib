<?php
defined('BASEPATH') or exit('No direct script access allowed');

class E404 extends CI_Controller

{
    public function index()
    {
        $data['title']  = "404 Page Not Found!";
        $this->load->view('e404', $data);
    }
}