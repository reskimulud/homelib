<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        // $this->load->model('Pagination_model', 'page');
    }

    public function index()
    {
        $data['title']  = 'Pengaturan Menu';
        // $data['all']    = $this->db->get('user_menu')->result();
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['menu']   = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('backend/menu/index', $data);
            $this->load->view('template/footer', $data);

            $this->session->set_flashdata('error', "Menu not added!");
        } else {
            $menu           = $this->input->POST('menu');
            $icon           = $this->input->POST('icon');
            $is_show        = $this->input->POST('is_show');
            $has_sub_menu   = $this->input->POST('has_sub_menu');
            $url            = $this->input->POST('url');
            
            if ($has_sub_menu == 1) {
                $data = [
                    'menu'          => $menu,
                    'icon'          => $icon,
                    'is_show'       => $is_show,
                    'has_sub_menu'  => $has_sub_menu
                ];
            } else {
                $data = [
                    'menu'          => $menu,
                    'icon'          => $icon,
                    'is_show'       => $is_show,
                    'has_sub_menu'  => 0,
                    'url'           => $url
                ];
            }
            
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', "New menu added!");

            redirect('menu');
        }
    }

    public function editmenu()
    {


        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all']    = $this->db->get('user_menu')->result();

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('backend/menu/index', $data);
            $this->load->view('template/footer', $data);

            $this->session->set_flashdata('error', "Menu not edited!");
            redirect('menu');
        } else {
            $id             = $this->input->POST('id');
            $menu           = $this->input->POST('menu');
            $icon           = $this->input->POST('icon');
            $is_show        = $this->input->POST('is_show');
            $has_sub_menu   = $this->input->POST('has_sub_menu');
            $url            = $this->input->POST('url');
            
            if ($has_sub_menu == 1) {
                $data = [
                    'menu'          => $menu,
                    'icon'          => $icon,
                    'is_show'       => $is_show,
                    'has_sub_menu'  => $has_sub_menu
                ];
            } else {
                $data = [
                    'menu'          => $menu,
                    'icon'          => $icon,
                    'is_show'       => $is_show,
                    'has_sub_menu'  => 0,
                    'url'           => $url
                ];
            }

            $this->db->where('id', $id);
            $this->db->update('user_menu', $data);

            $this->session->set_flashdata('message', "Menu updated!");
            redirect('menu');
        }
    }

    public function deletemenu($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Delete data, failed!");
            redirect('menu');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('user_menu');
            $this->session->set_flashdata('message', "Data deleted");
            redirect('menu');
        }
    }

    public function submenu()
    {

        $data['title']  = 'Pengaturan Submenu';
        $data['all']    = $this->db->get('user_sub_menu')->result();
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['SubMenu']   = $this->database->getSubMenu();
        $data['menu']      = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('backend/menu/submenu', $data);
            $this->load->view('template/footer');

            $this->session->set_flashdata('error', "Submenu not added!");
        } else {
            $data   = [
                'title'     => $this->input->POST('title'),
                'menu_id'   => $this->input->POST('menu_id'),
                'url'       => $this->input->POST('url'),
                'icon'      => $this->input->POST('icon'),
                'is_show'   => $this->input->POST('is_show')
            ];

            $this->db->insert('user_sub_menu', $data);

            $this->session->set_flashdata('message', "Submenu added!");
            redirect('menu/submenu');
        }
    }

    public function editsubmenu()
    {

        $data['title']  = 'Pengaturan Submenu';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['SubMenu']   = $this->database->getSubMenu();
        $data['menu']   = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('backend/menu/sebmenu', $data);
            $this->load->view('template/footer');

            $this->session->set_flashdata('error', "Submenu not edited!");
        } else {
            $data   = [
                'title'     => $this->input->POST('title'),
                'menu_id'   => $this->input->POST('menu_id'),
                'url'       => $this->input->POST('url'),
                'icon'      => $this->input->POST('icon'),
                'is_show'   => $this->input->POST('is_show'  )
            ];

            $id = $this->db->where('id', $_POST['id']);
            $this->db->update('user_sub_menu', $data, $id);

            $this->session->set_flashdata('message', "Submenu updated!");
            redirect('menu/submenu');
        }
    }

    public function deletesubmenu($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Delete data, failed!");
            redirect('menu/submenu');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('user_sub_menu');
            $this->session->set_flashdata('message', "Data deleted");
            redirect('menu/submenu');
        }
    }
}