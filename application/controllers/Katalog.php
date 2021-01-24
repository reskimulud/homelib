<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title']      = 'Katalog Buku';
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['products']   = $this->database->getProduct();

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/template/navbar', $data);
        $this->load->view('frontend/katalog/index', $data);
        $this->load->view('frontend/template/footer');
    }

    public function detailproduk($id)
    {
        $product          = $this->database->getProductById($id);

        if ($product) {
            $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title']    = $product['title'];
            $data['product']  = $product;
            $data['products'] = $this->database->getProduct();
  
            $this->load->view('frontend/template/header', $data);
            $this->load->view('frontend/template/navbar', $data);
            $this->load->view('frontend/katalog/detail', $data);
            $this->load->view('frontend/template/footer');
        } else {
            $this->session->set_flashdata(
                'error',
                'Buku tidak ditemukan'
            );
            redirect('katalog');
        }
    }
}