<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller

{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    // $this->load->model('Pagination_model', 'page');
  }

  public function index()
  {
    $data['title']          = 'Dashboard';
    $data['user']           = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['users']          = $this->db->get('user')->result_array();
    $data['all']            = $this->db->get('user_role')->result();
    // $data['gallery']        = $this->database->getProductGallery();
    $data['products']       = $this->database->getProduct();

    $transaction            = $this->database->getTransaction();
    $transactions           = [];

    foreach ($transaction as $trans) {
      $products = json_decode($trans['product'], TRUE);
      foreach ($products as $product) {
        $trans['product_id']  = $product['product_id'];
        $trans['qty']         = $product['qty'];
        $transactions[] = $trans;

      }
    }
    $data['transactions']   = $transactions;

    $mostPurchased = [];

    foreach ($data['products'] as $product) {
      $mostPurchased[$product['id']] = 0;
      foreach ($transactions as $transaction) {
        if ($product['id'] == $transaction['product_id']) {
          $mostPurchased[$product['id']] += $transaction['qty'];
        }
      }
    }

    $data['mostPurchased'] = $mostPurchased;

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('backend/admin/index', $data);
    $this->load->view('template/footer', $data);
  }

  public function role()
  {
    $data['title']  = 'Role';
    $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['role']    = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('backend/admin/role', $data);
      $this->load->view('template/footer');

      $this->session->set_flashdata('error', 'Role gagal ditambahkan');
    } else {
      $this->db->insert('user_role', ['role' => $this->input->POST('role')]);
      $this->session->set_flashdata(
        'message',
        'Role baru ditambahkan'
      );
      redirect('admin/role');
    }
  }

  public function roleedit()
  {
    $data['title']  = 'Role';
    $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['all']    = $this->db->get('user_role')->result();

    $data['role']   = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('id', 'id', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('backend/admin/role', $data);
      $this->load->view('template/footer', $data);

      $this->session->set_flashdata('error', 'Role tidak diedit');
    } else {
      $data = array(
        "role" => $_POST['role'],
      );
      $this->db->where('id', $_POST['id']);
      $this->db->update('user_role', $data);
      $this->session->set_flashdata(
        'message',
        'Role diupdate'
      );
      redirect('admin/role');
    }
  }

  public function roledelete($id)
  {
    if ($id == "") {
      $this->session->set_flashdata('error', "Gagal menghapus data");
      redirect('admin/role');
    } else {
      $this->db->where('id', $id);
      $this->db->delete('user_role');
      $this->session->set_flashdata('message', 'Role dihapus!');
      redirect('admin/role');
    }
  }

  public function roleaccess($role_id)
  {
    $data['title'] = 'Role Access';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('backend/admin/role-access', $data);
    $this->load->view('template/footer');
  }

  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', 'Access diubah!');
  }

  public function userslist()
  {
    $data['title']  = 'Daftar Pengguna';
    $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['list']   = $this->database->getUserWithRoleName();

    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('backend/admin/userslist', $data);
      $this->load->view('template/footer');
    } else {
      $this->db->insert('user_role', ['role' => $this->input->POST('role')]);
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success notification" role="alert">
                    New role added!
                </div>'
      );
      redirect('admin/userslist');
    }
  }

  public function userdetail($id)
  {
    $data['title']  = 'User Detail';
    $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Menu_model', 'menu');

    $data['roles']   = $this->db->get('user_role')->result_array();
    $data['users']   = $this->db->get_where('user', ['id' => $id])->row_array();


    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email],');
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules('role_id', 'Role', 'required');
    // $this->form_validation->set_rules('is_active', 'Active', 'required');

    if ($this->form_validation->run() == false) {

      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('backend/admin/userdetail', $data);
      $this->load->view('template/footer');
    } else {

      $name       = $this->input->POST('name');
      $username   = $this->input->POST('username');
      $email      = $this->input->POST('email');
      $role       = $this->input->POST('role_id');
      // $active     = $this->input->POST('is_active');

      //cek gambar
      $upload_image   = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '3072';
        $config['upload_path'] = './assets/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $old_image  = $data['user']['image'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }

          $new_image  = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('name', $name);
      $this->db->set('username', $username);
      $this->db->set('email', $email);
      $this->db->set('role_id', $role);
      $this->db->where('id', $id);
      $this->db->update('user');

      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success notification" role="alert">
                    Your profile has been updated!
                </div>'
      );
      redirect('admin/userdetail/' . $id);
    }
  }

  public function deleteuser($id)
  {
    if ($id == "") {
      $this->session->set_flashdata('error', "Delete data, failed!");
      redirect('admin/userslist');
    } else {
      $this->db->where('id', $id);
      $this->db->delete('user');
      $this->session->set_flashdata('success', "Data deleted");
      redirect('admin/userslist');
    }
  }
}