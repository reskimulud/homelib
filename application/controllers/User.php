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

    public function print_invoice($id)
    {
        $detailInvoice  = $this->database->queryDetailInvoice($id);

        if ($detailInvoice) {
            $data['title']      = 'Detail Invoice' . $detailInvoice['invoice_number'];
            $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['detail']     = $detailInvoice;
            $data['products']   = json_decode($detailInvoice['product']);
            
            $this->load->view('backend/transaction/print_invoice', $data);

        } else {
            $this->session->set_flashdata(
                'error',
                'Invoice tidak ditemukan'
            );
            redirect('transaksi/invoice');
        }

        
    }

    public function addToCart($product_id)
    {
        $user       = $this->database->getUser();
        $product    = $this->database->getProductById($product_id);
        $user_id    = $user['id'];

        $data   = [
            'id'            => "$product_id-and-$user_id",
            'user_id'       => $user_id,
            'product_id'    => $product_id,
            'qty'           => 1,
            'price'         => $product['price'],
            'name'          => $product_id,
        ];

        $saveToCart = $this->cart->insert($data);

        if ($saveToCart) {
            $carts = $this->cart->contents();

            foreach ($carts as $cart) {
                $dbCart = $this->db->get_where('user_cart', ['id' => $cart['id']])->row_array();

                if ($dbCart) {
                    $qty  = $dbCart['qty'];
                    $this->database->update(['qty' => $qty + $cart['qty']], $cart['id'], 'user_cart');
                    $this->cart->destroy();

                    $product = $this->database->getProductById($dbCart['product_id']);

                    if ($product) {
                        $this->database->update(['add_to_cart' => $product['add_to_cart'] + 1], $product['id'], 'product');
                    }

                } else {
                    $this->database->save($cart, 'user_cart');
                    $this->cart->destroy();
                }
            }
        }
    }

    public function cart()
    {
        $data['title']  = 'Keranjang Belanja';
        $data['user']   = $this->database->getUser();

        $data['products'] = $this->database->getCartByUser();

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/template/navbar', $data);
        $this->load->view('frontend/user/cart', $data);
        $this->load->view('frontend/template/footer');
    }

    public function deleteCart($rowid)
    {
        if ($rowid == '') {
            $this->session->set_flashdata(
                'error',
                'Produk tidak ditemukan'
            );
            redirect('user/cart');
        } else {
            $product = $this->db->get_where('user_cart', ['rowid' => $rowid])->row_array();

            if ($product) {
                $this->db->where('rowid', $rowid);
                $this->db->delete('user_cart');

                $this->session->set_flashdata(
                    'message',
                    'Produk dihapus dari keranjang'
                );
                redirect('user/cart');
            }
        }
    }

    public function clearCart($user_id)
    {
        if ($user_id == '') {
            $this->session->set_flashdata(
                'error',
                'Produk tidak ditemukan'
            );
            redirect('user/cart');
        } else {
            $product = $this->db->get_where('user_cart', ['user_id' => $user_id])->row_array();

            if ($product) {
                $this->db->where('user_id', $user_id);
                $this->db->delete('user_cart');

                $this->session->set_flashdata(
                    'message',
                    'Keranjang dibersihkan'
                );
                redirect('user/cart');
            }
        }
    }

    public function wishlist()
    {
        $data['title']      = 'Wishlist';
        $data['user']       = $this->database->getUser();
        $data['wishlists']  = $this->database->getUserWishlist();

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/template/navbar', $data);
        $this->load->view('frontend/user/wishlist', $data);
        $this->load->view('frontend/template/footer');
    }

    public function addWishlist()
    {
        $user       = $this->database->getUser();
        $userID     = $user['id'];
        $product_id = $this->input->POST('productID');
        $wishlists  = $this->db->query("SELECT * FROM `user_wishlist` WHERE `user_id` = $userID AND `product_id` = $product_id")->result_array();

        if (!$wishlists) {
            $this->database->save(['user_id' => $user['id'], 'product_id' => $product_id], 'user_wishlist');
        }

    }

    public function notification()
    {
        $data['title'] = 'Notifikasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->where('target', $data['user']['id']);
        $this->db->update('notification', ['is_seen' => 1]);

        $data['notifications'] = $this->database->userNotification();

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/template/navbar', $data);
        $this->load->view('frontend/user/notification', $data);
        $this->load->view('frontend/template/footer');
    }

    public function deletenotif($id)
    {
        if ($id != '') {
        $notification = $this->db->get_where('notification', ['id' => $id])->row_array();
        if ($notification) {
            $this->database->delete($id, 'notification');
            $this->session->set_flashdata(
            'message',
            'Notifikasi dihapus'
            );
            redirect('admin/notifikasi');
        } else {
            $this->sesson->set_flashdata(
            'error',
            'NOtifikasi tidak ditemukan'
            );
            redirect('admin/notifikasi');
        }
        } else {
        $this->session->set_flashdata(
            'error',
            'Notifikasi tidak ditemukan'
        );
        redirect('admin/notifikasi');
        }
    }

}