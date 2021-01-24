<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('API_model', 'api');
        $this->load->model('Notification_model', 'notif');
    }

    public function index()
    {
        $data['title']  = 'Checkout';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('products', 'Produk', 'required');

        if ($this->form_validation->run() == FALSE) {
            if (isset($_GET['p'])) {

                $product    = $this->input->GET('p');
                $decode     = str_replace('_', '=', $product);
                $decode     = json_decode(urldecode(base64_decode($decode)), TRUE);

                $products   = [];

                $i = 0;
                if (is_array($decode)) {

                    foreach ($decode as $produc) {
                        $p = $this->database->getProductById($produc['product_id']);
                        if ($p) {
    
                            $products[$i] = $p;
    
                        } else {
                            break;
                            $this->session->set_flashdata(
                                'error',
                                'Tidak ada produk yang dipilih'
                            );
                            redirect('katalog');
                        }
                        $products[$i]['qty'] = $produc['qty'];
                        $i++;
                    }
 
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Tidak ada produk yang dipilih'
                    );
                    redirect('katalog');
                }


                $data['products']   = $products;
                $data['json']       = json_encode($decode);
                $data['payments']   = $this->database->getAll('product_payment_method');

                $address    = $this->database->getAddressById($data['user']['id']);

                if ($address) {
                    $data['addresses']  = $address;
                    $data['encode']     = $product;

                    $this->load->view('frontend/template/header', $data);
                    $this->load->view('frontend/template/navbar', $data);
                    $this->load->view('frontend/checkout/index', $data);
                    $this->load->view('frontend/template/footer', $data);
                } else {

                    redirect('checkout/address/' . $product);
                }

            } else {

                $this->session->set_flashdata(
                    'error',
                    'Tidak ada produk yang dipilih'
                );
                redirect('katalog');
            }

        } else {
            $product    = $this->input->POST('products');
            $decode     = json_decode($product, TRUE);

            $products   = [];

            $i = 0;
            foreach ($decode as $produc) {
                $products[$i] = $this->database->getProductById($produc['product_id']);
                $products[$i]['qty'] = $produc['qty'];
                $i++;
            }

            $data['products']   = $products;
            $data['json']       = $product;
            $data['payments']   = $this->database->getAll('product_payment_method');

            $address    = $this->database->getAddressById($data['user']['id']);
            // var_dump($address); die;

            if ($address) {
                $product = base64_encode($product);
                $product = str_replace('=', '_', $product);
                $product = urlencode($product);
                
                $data['addresses']  = $address;
                $data['encode']     = $product;

                $this->load->view('frontend/template/header', $data);
                $this->load->view('frontend/template/navbar', $data);
                $this->load->view('frontend/checkout/index', $data);
                $this->load->view('frontend/template/footer', $data);
            } else {
                $product = base64_encode($product);
                $product = str_replace('=', '_', $product);
                $product = urlencode($product);

                redirect('checkout/address/' . $product);
            }
        }

    }

    public function address()
    {
        $data['title']  = 'Alamat Pengiriman';
        $data['user']   = $this->database->getUser();

        $header     = ['key: 12f7bb3d216d18280b421a0cd0c3c7ef'];
        $urlCity    = 'https://api.rajaongkir.com/starter/city';
        $urlProvince= 'https://api.rajaongkir.com/starter/province';

        $city       = $this->api->get($urlCity, $header);
        $province   = $this->api->get($urlProvince, $header);

        $data['cities']         = $city['rajaongkir']['results'];
        $data['provincies']     = $province['rajaongkir']['results'];

        $this->form_validation->set_rules('receiver', 'Nama Penerima', 'required');
        $this->form_validation->set_rules('address', 'Alamat Penerima', 'required');
        $this->form_validation->set_rules('city_id', 'Kota', 'required');
        $this->form_validation->set_rules('city_name', 'Kota', 'required');
        $this->form_validation->set_rules('sub_districts', 'Nama Kecamatan', 'required');
        $this->form_validation->set_rules('postal', 'Kode POS', 'required');
        $this->form_validation->set_rules('phone', 'No, Telepon', 'required');
                            
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('frontend/template/header', $data);
            $this->load->view('frontend/template/navbar', $data);
            $this->load->view('frontend/checkout/address', $data);
            $this->load->view('frontend/template/footer');

            if (form_error()) {
                $this->session->set_flashdata(
                    'error',
                    form_error()
                );
            }
        
        } else {
         
            $user_id        = $data['user']['id'];
            $receiver       = $this->input->POST('receiver');
            $address        = $this->input->POST('address');
            $city_id        = $this->input->POST('city_id');
            $city_name      = $this->input->POST('city_name');
            $sub_districts  = $this->input->POST('sub_districts');
            $postal         = $this->input->POST('postal');
            $phone          = $this->input->POST('phone');
            $option_address = $this->input->POST('option_address');
            
            $products       = $this->input->POST('products');

            $data   = [
                'user_id'       => $user_id,
                'receiver'      => $receiver,
                'address'       => $address,
                'city_id'       => $city_id,
                'city_name'     => $city_name,
                'sub_districts' => $sub_districts,
                'postal'        => $postal,
                'phone'         => $phone,
                'option_address'=> $option_address
            ];

            $result = $this->database->save($data, 'user_address');

            if ($result) {

                
                if ($products) {
                    $user = $this->database->getUser();
                    $address = $this->db->get_where('user_address', ['user_id' => $user['id']])->row_array();
                    $this->database->update(['address_id' => $address['id']], $user['id'], 'user');

                    redirect('checkout?p=' . $products);

                } else {

                    $this->session->set_flashdata(
                        'message',
                        'Alamat ditambahkan'
                    );
                    redirect('user');

                }

            } else {
                $this->session->set_flashdata(
                    'error',
                    'Alamat tidak ditambahkan'
                );
                redirect('user');
            }

        }

    }

    public function order()
    {
        $user   = $this->database->getUser();

        $char       = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffle    = substr(str_shuffle($char), 0, 6);

        if ($_POST) {

            $product            = $this->input->POST('product');
            $user_id            = $user['id'];
            $shipping_address   = $this->input->POST('shipping_address');
            $method_id          = $this->input->POST('method_id');
            $total_fee          = $this->input->POST('total_fee');
            $transactionNumber  =  date('dmy') . $user['id'] . $method_id . $shuffle ;

            if (isset($_POST['idC'])) {
                $idC    = str_replace('_', '=', $_POST['idC']);
                $idC    = json_decode(base64_decode(urldecode($idC)), TRUE);

                foreach ($idC as $idCart) {
                    $this->cart->remove($idCart);

                    $this->db->where('rowid', $idCart);
                    $this->db->delete('user_cart');
                }
            }

            $data   = [
                'transaction_number'    => $transactionNumber,
                'product'               => $product,
                'user_id'               => $user_id,
                'date_created'          => time(),
                'status'                => 1,
                'shipping_address'      => $shipping_address,
                'method_id'             => $method_id,
                'total_fee'             => $total_fee,
            ];

            $result = $this->database->save($data, 'transaction');

            if ($result) {

                $target = 'admin';
                $title  = "#$transactionNumber | Pesanan Baru Dibuat oleh User";
                $icon   = base_url('favicon.ico');
                $body   = $user['name'] . ' telah membuat pesanan dengan total harga sebesar Rp. ' . number_format($total_fee, 0, ',', '.');
                $href   = 'transaksi';

                $this->notif->notification($target, $title, $icon, $body, $href);

                $products = json_decode($product, TRUE);

                foreach ($products as $prod) {
                    $product = $this->database->getProductById($prod['product_id']);

                    if ($product) {
                        $this->db->where('id', $product['id']);
                        $this->db->update('product', ['sold' => $product['sold'] + 1]);
                    }
                }

                $this->session->set_flashdata(
                    'message',
                    'Pesanan dibuat dengan Nomer :' . $transactionNumber
                );
                redirect('checkout/billing/' . $transactionNumber);
            } else {
                $this->session->set_flashdata(
                    'error',
                    'Pesanan gagal dibuat'
                );
                redirect('katalog');
            }

        }

    }

    public function billing($transactionNumber)
    {
        $user        = $this->database->getUser();
        $transaction = $this->database->getTransactionByNumber($transactionNumber);
        
        if ($transaction && $transaction['user_id'] == $user['id']) {
            
            $data['title']          = 'Tagihan Pesanan';
            $data['user']           = $this->database->getUser();
            $data['transaction']    = $transaction;
            $data['method']         = $this->db->get_where('product_payment_method', ['id' => $transaction['method_id']])->row_array();

            $this->load->view('frontend/template/header', $data);
            $this->load->view('frontend/template/navbar', $data);
            $this->load->view('frontend/checkout/billing', $data);
            $this->load->view('frontend/template/footer');

        } else {
            $this->session->set_flashdata(
                'error',
                'Tagihan tidak ditemukan'
            );
            redirect('user');
        }
    }

    public function confirm($transactionNumber)
    {
        $user        = $this->database->getUser();
        $transaction = $this->database->getTransactionByNumber($transactionNumber);
        
        if ($transaction && $transaction['user_id'] == $user['id']) {

            if ($transaction['status'] != 1) {
                $this->session->set_flashdata(
                    'error',
                    'Transaksi sedang diproses, selesai atau sudah kadaluwarsa'
                );
                redirect('user');
            } else {

                $confirmByTransactionNumber = $this->db->get_where('transaction_confirm', ['transaction_number' => $transaction['transaction_number']])->row_array();
    
                if (!$confirmByTransactionNumber) {
    
                    $data['title']          = 'Konfirmasi Pembayaran';
                    $data['user']           = $user;
                    $data['transaction']    = $transaction;
    
                    $this->form_validation->set_rules('transaction_number', 'Number Transaksi', 'required');
    
                    if ($this->form_validation->run() == FALSE) {
    
                        $this->load->view('frontend/template/header', $data);
                        $this->load->view('frontend/template/navbar', $data);
                        $this->load->view('frontend/checkout/confirm', $data);
                        $this->load->view('frontend/template/footer');
                    } else {
                        $user               = $this->database->getUser();
                        $transaction_number = $this->input->POST('transaction_number');
                        $transaction        = $this->database->getTransactionByNumber($transaction_number);
    
                        if ($transaction && $transaction['user_id'] == $user['id']) {
                            $image  = $_FILES['proof_image']['name'];
                            
                            if ($image) {
    
                                $config['allowed_types'] = 'png|PNG|jpg|JPG|jpeg|JPEG|bmp|BMP|gif|GIF';
                                $config['max_size']     = '3080';
                                $config['upload_path'] = './assets/img/transaction_confirm/';
    
                                $this->load->library('upload', $config);
    
                                if ($this->upload->do_upload('proof_image')) {
                                    $new_image      = $this->upload->data();
                                    $proof_image    = $new_image['file_name'];
    
                                    $this->proof_image($proof_image);
    
                                } else {
                                    $this->session->set_flashdata(
                                        'error',
                                        $this->upload->display_errors()
                                    );
                                    redirect('checkout/confirm/' . $transaction_number);
                                }
    
                                $data   = [
                                    'transaction_id'        => $transaction['id'],
                                    'transaction_number'    => $transaction_number,
                                    'proof_image'           => $proof_image,
                                    'date_created'          => time()
                                ];
    
                                $this->database->save($data, 'transaction_confirm');

                                $target = 'admin';
                                $title  = "Permintaan konfirmasi pembayaran";
                                $icon   = base_url('favicon.ico');
                                $body   = $user['name'] . " telah membuat permintaan untuk mengonfirmasi pesanan #$transaction_number";
                                $href   = 'transaksi/konfirmasi';

                                $this->notif->notification($target, $title, $icon, $body, $href);
    
                                $this->session->set_flashdata(
                                    'message',
                                    'Permintaan telah dikirim ke admin dan akan diproses'
                                );
                                redirect('user');
    
                            } else {
                                $this->session->set_flashdata(
                                    'error',
                                    'Tidak ada gabar yang diupload'
                                );
                                redirect('checkout/confirm/' . $transaction_number);
                            }
                        } else {
                            $this->session->set_flashdata(
                                'error',
                                'No. Transaksi tidak dditemukan'
                            );
                            redirect('user');
                        }
                    }
    
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Permintaan sebelumnya telah terkirim'
                    );
                    redirect('user');
                }
            }
 
            
        } else {
            $this->session->set_flashdata(
                'error',
                'Nomer transaksi tidak ditemukan'
            );
            redirect('user');
        }
    }

    public function proof_image($proof_image)
    {
        $source_path = FCPATH . 'assets/img/transaction_confirm/' . $proof_image;
        $target_path = FCPATH . '/assets/img/transaction_confirm/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'height' => 350,

        );

        $this->load->library('image_lib', $config_manip[0]);
        $this->image_lib->initialize($config_manip);
        if (!$this->image_lib->resize()) {
            $this->session->set_flashdata('error', $this->image_lib->display_errors(NULL, NULL));
            redirect('user');
        }   
    }

}