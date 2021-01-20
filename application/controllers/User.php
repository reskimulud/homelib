<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        // $this->load->model('Pagination_model', 'page');
    }


    public function index()
    {
        $data['title']          = 'Profil Saya';
        $data['user']           = $this->database->getUser();
        $data['address']        = $this->database->getAddressById($data['user']['id']);
        $data['transactions']   = $this->database->getTransactionByUser();

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/template/navbar', $data);
        $this->load->view('frontend/user/index', $data);
        $this->load->view('frontend/template/footer');
    }

    public function edit()
    {
        $data['title']  = 'Edit Profil';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $firstRow = $this->database->getById($data['user']['id'], 'user');

        if ($this->input->POST('email') == $data['user']['email']) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email],', [
                'is_unique' => 'Email telah terdaftar'
            ]);
        }

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('frontend/template/header', $data);
            $this->load->view('frontend/template/navbar', $data);
            // $this->load->view('template/topbar', $data);
            $this->load->view('frontend/user/edit', $data);
            $this->load->view('frontend/template/footer');
        } else {
            $id             = $this->input->POST('id');
            $email          = $this->input->POST('email');
            $name           = $this->input->POST('name');
            $profession     = $this->input->POST('profession');
            $address_id     = $this->input->POST('address_id');
            $phone          = $this->input->POST('phone');

            $data   = [
                'email'         => $email,
                'name'          => $name,
                'address_id'    => $address_id,
                'profession'    => $profession,
                'phone'         => $phone
            ];

            $update     = $this->database->update($data, $id, 'user');
            $lastRows   = $this->database->getById($id, 'user');

            // var_dump($firstRow); var_dump($lastRows); die;

            if ($update && $firstRow != $lastRows) {
                $this->session->set_userdata(['email' => $email]);
                $this->session->set_flashdata(
                    'message',
                    'Profil berhasil diperbarui'
                );
                redirect('user');
            } else {
                $this->session->set_flashdata(
                    'error',
                    'Profil tidak diperbarui'
                );
                redirect('user');

            }

        }
    }

    public function uploadImage()
    {

        $data = $this->input->post('image');
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $imageName = time() . '.png';
        file_put_contents('assets/img/profile/' . $imageName, $data);

        $old_image  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($old_image['image'] != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image['image']);
        }

        $this->db->set('image', $imageName);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('user');

        $this->session->set_flashdata(
            'message',
            'Your profile has been updated!'
        );
    }

    public function changePassword()
    {
        $data['title']  = 'Ubah Password';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');



        if ($this->form_validation->run() == false) {

            $this->load->view('frontend/template/header', $data);
            $this->load->view('frontend/template/navbar', $data);
            // $this->load->view('template/topbar', $data);
            $this->load->view('frontend/user/changepassword', $data);
            $this->load->view('frontend/template/footer');
        } else {
            $current_password   = $this->input->POST('current_password');
            $new_password       = $this->input->POST('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata(
                    'error',
                    'Wrong current password!'
                );
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'error',
                        'New password cannot be the same as current password  !'
                    );
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash  = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata(
                        'message',
                        'Password changed!'
                    );
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function edit_alamat($id)
    {
        $data['title']  = 'Edit Alamat';
        echo 'edit ' . $id;

    }

    public function default_alamat($idAddress, $idUser)
    {
        $address    = $this->db->get_where('user_address', ['id' => $idAddress])->row_array();
        if ($address) {
            $result = $this->database->update(['address_id' => $idAddress], $idUser, 'user');
            if ($result) {
                $this->session->set_flashdata(
                    'message',
                    'Alamat dijadikan sebagain default'
                );
                redirect('user');
            } else {
                $this->session->set_flashdata(
                    'error',
                    'Alamat tidak dijadikan sebagain default'
                );
                redirect('user');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                'Alamat tidak ditemukan'
            );
            redirect('user');
        }
    }

    public function wishlist()
    {
        $data['title']  = 'Wishlist';
        $data['user']   = $this->database->getUser();

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/template/navbar', $data);
        $this->load->view('frontend/user/wishlist', $data);
        $this->load->view('frontend/template/footer');
    }

    public function cart()
    {
        $data['title']  = 'Wishlist';
        $data['user']   = $this->database->getUser();

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/template/navbar', $data);
        $this->load->view('frontend/user/cart', $data);
        $this->load->view('frontend/template/footer');
    }

}