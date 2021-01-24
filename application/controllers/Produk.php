<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

    }

    public function index()
    {
        $data['title']      = 'Katalog Produk';
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['products']   = $this->database->getProduct();
        $data['categories'] = $this->database->getProductCategory();

        $this->form_validation->set_rules('title', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('product_desc', 'Deskripsi Produk', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required|integer');
        $this->form_validation->set_rules('weight', 'Berat', 'required');
        $this->form_validation->set_rules('category_id', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('backend/product/index', $data);
            $this->load->view('template/footer', $data);
        
        } else {
            $title          = $this->input->post('title');
            $product_desc   = $this->input->post('product_desc');
            $price          = $this->input->post('price');
            $weight         = $this->input->post('weight');

            $date_added     = time();
            $added_by       = $data['user']['id'];
            $category_id    = $this->input->POST('category_id');

            $hex            = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'];
            $color          = $hex[rand(0,15)].$hex[rand(0,15)].$hex[rand(0,15)].$hex[rand(0,15)].$hex[rand(0,15)].$hex[rand(0,15)];

            $data   = [
                'title'         => $title,
                'product_desc'  => $product_desc,
                'date_added'    => $date_added,
                'added_by'      => $added_by,
                'category_id'   => $category_id,
                'price'         => $price,
                'weight'        => $weight,
                'color'         => $color
            ];

            $result     = $this->database->save($data, 'product');

            if ($result) {
                
                $this->session->set_flashdata(
                    'message',
                    'Produk ditambahkan'
                );
            } else {
                $this->sesson->set_flashdata(
                    'error',
                    'Produk tidak ditambahkan'
                );
            }
            redirect('produk');

        }

    }

    public function editproduk()
    {
        $id             = $this->input->POST('id');
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $product        = $this->database->getProductById($id);

        $title          = $this->input->post('title');


        $product_desc   = $this->input->post('product_desc');
        $price          = $this->input->post('price');
        $weight         = $this->input->post('weight');
        
        $data   = [
            'title'         => $title,
            'product_desc'  => $product_desc,
            'price'         => $price,
            'weight'        => $weight
        ];

        $result     = $this->database->update($data, $id, 'product');

        if ($result) {
                
                $this->session->set_flashdata(
                    'message',
                    'Produk diubah'
                );
            } else {
                $this->sesson->set_flashdata(
                    'error',
                    'Produk tidak diubah'
                );
            }
        redirect('produk');
    }

    public function deleteproduk($id)
    {
        if ($id == '') {
            redirect('produk');
        } else {

            $product = $this->database->getProductById($id);

            if ($product['thumb'] != 'no_thumb.jpg') {
                unlink('assets/img/product_thumb/' . $product['thumb']);
                unlink('assets/img/product_thumb/small/' . $product['thumb']);
                unlink('assets/img/product_thumb/medium/' . $product['thumb']);
                unlink('assets/img/product_thumb/large/' . $product['thumb']);
            } 

            $result     = $this->database->delete($id, 'product');

            if ($result) {
                
                $this->session->set_flashdata(
                    'message',
                    'Produk dihapus'
                );
            } else {
                $this->sesson->set_flashdata(
                    'error',
                    'Produk tidak dihapus'
                );
            }
            redirect('produk');   

        }
    }

    public function thumb()
    {
        $thumb_upload   = $_FILES['thumb']['name'];
        $id             = $this->input->POST('id');
        $old_thumb      = $this->database->getFieldById($id, 'thumb', 'product');


        if ($thumb_upload) {
            $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG|bmp|BMP|gif|GIF';
            $config['max_size']     = '2040';
            $config['upload_path'] = './assets/img/product_thumb/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('thumb')) {
                $new_image  = $this->upload->data();
                $thumb = $new_image['file_name'];
                $this->resizeimage($new_image['file_name'], 'product_thumb/', 'produk');
                unlink('assets/img/product_thumb/' . $thumb);
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $this->session->set_flashdata(
                'error',
                'Thumb tidak ditambahkan'
            );
            redirect('produk');
        }

        if ($old_thumb['thumb'] != 'no_thumb.jpg' && $old_thumb != $thumb_upload) {
            unlink('assets/img/product_thumb/small/' . $old_thumb['thumb']);
            unlink('assets/img/product_thumb/medium/' . $old_thumb['thumb']);
            unlink('assets/img/product_thumb/large/' . $old_thumb['thumb']);
        }

        $data   = ['thumb' => $thumb];
        $result = $this->database->update($data, $id, 'product');

        if ($result) {
                
                $this->session->set_flashdata(
                    'message',
                    'Thumb ditambahkan'
                );
            } else {
                $this->sesson->set_flashdata(
                    'error',
                    'Thumb tidak ditambahkan'
                );
            }
        redirect('produk');

    }

    public function deletethumb($id)
    {
        $old_thumb      = $this->database->getFieldById($id, 'thumb', 'product');

        if ($old_thumb['thumb'] != 'no_thumb.jpg') {
            unlink('assets/img/product_thumb/' . $old_thumb['thumb']);
            unlink('assets/img/product_thumb/large/' . $old_thumb['thumb']);
            unlink('assets/img/product_thumb/medium/' . $old_thumb['thumb']);
            unlink('assets/img/product_thumb/small/' . $old_thumb['thumb']);

            $result = $this->database->update(['thumb' => 'no_thumb.jpg'], $id, 'product');

            if ($result) {
                
                $this->session->set_flashdata(
                    'message',
                    'Thumbnail dihapus'
                );
            } else {
                $this->sesson->set_flashdata(
                    'error',
                    'Thumbnail tidak dihapus'
                );
            }
            redirect('produk');
        } else {
            $result = $this->database->update(['thumb' => 'no_thumb.jpg', $id, 'product']);

            if ($result) {
                
                $this->session->set_flashdata(
                    'message',
                    'thumb dihapus'
                );
            } else {
                $this->sesson->set_flashdata(
                    'error',
                    'thumb tidak dihapus'
                );
            }
            redirect('produk');
        }
    }

    public function resizeimage($filename, $path, $redirect)
    {
        $source_path = FCPATH . 'assets/img/' . $path . $filename;
        $target_path_large = FCPATH . '/assets/img/' . $path . 'large/';
        $target_path_medium = FCPATH . '/assets/img/' . $path . 'medium/';
        $target_path_small = FCPATH . '/assets/img/' .$path . 'small/';
        $config_manip = array(
            //large thumb
            array(
                'image_library' => 'gd2',
                'source_image' => $source_path,
                'new_image' => $target_path_large,
                'maintain_ratio' => TRUE,
                'height' => 700,
            ),

            //medium thumb
            array(
                'image_library' => 'gd2',
                'source_image' => $source_path,
                'new_image' => $target_path_medium,
                'maintain_ratio' => TRUE,
                'height' => 500,
            ),

            //small thumb
            array(
                'image_library' => 'gd2',
                'source_image' => $source_path,
                'new_image' => $target_path_small,
                'maintain_ratio' => TRUE,
                'height' => 200,
            )
        );


        $this->load->library('image_lib', $config_manip[0]);
        foreach ($config_manip as $item) {
            $this->image_lib->initialize($item);
            if (!$this->image_lib->resize()) {
                $this->session->set_flashdata('error', $this->image_lib->display_errors(NULL, NULL));
                redirect($redirect);
            }
        }

        $this->image_lib->clear();
    }

    public function kategori()
    {
        $data['title']      = 'Kategori';
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['categories'] = $this->database->getProductCategory();

        $this->form_validation->set_rules('category', 'Nama Kategori', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('backend/product/category', $data);
            $this->load->view('template/footer', $data);
        } else {

            $category = $this->input->POST('category');

            $data       = [
                'category'    => $category,
                'date_added'    => time()
            ];

            $result     = $this->database->save($data, 'product_category');

            if ($result) {
                $this->session->set_flashdata(
                    'message',
                    'Kategori ditambahkan'
                );
                redirect('produk/kategori');
            } else {
                $this->session->set_flashdata(
                    'error',
                    'Kategori tidak ditambahkan'
                );
                redirect('produk/kategori');
            }
        }

    }

    public function deletekategori($id)
    {
        if ($id == '') {
            $this->session->set_flashdata(
                'error',
                'Kategori tidak dihapus'
            );
            redirect('produk/kategori');
        } else {
            $category    = $this->database->getProductCategoryById($id);

            if ($category) {

                $result     = $this->database->delete($id, 'product_category');

                if ($result) {

                    $this->session->set_flashdata(
                        'message',
                        'Kategori dihapus'
                    );
                    redirect('produk/kategori');
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Kategori tidak dihapus'
                    );
                    redirect('produk/kategori');
                }
                
            } else {
                $this->session->set_flashdata(
                    'error',
                    'Kategori tidak dihapus'
                );
                redirect('produk/kategori');
            }

        }
    }

    public function pembayaran()
    {
        $data['title']      = 'Metode Pembayaran';
        $data['user']       = $this->database->getUser();
        $data['payments']   = $this->db->get('product_payment_method')->result_array();

        $this->form_validation->set_rules('method', 'Nama Metode Pembayaran', 'required');
        $this->form_validation->set_rules('number', 'Nomor Pembayaran', 'required');
        $this->form_validation->set_rules('account_holder', 'Pemegang Akun', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('backend/product/payment', $data);
            $this->load->view('template/footer', $data);
        
        } else {
            $method         = $this->input->POST('method');
            $number         = $this->input->POST('number');
            $account_holder = $this->input->POST('account_holder');

            $filename = $_FILES['icon']['name'];

            if ($filename) {
                $config['allowed_types'] = 'png|PNG';
                $config['max_size']     = '2040';
                $config['upload_path'] = './assets/img/product_payment/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('icon')) {
                    $new_image  = $this->upload->data();
                    $icon = $new_image['file_name'];

                    $this->icon_pembayaran($icon);

                } else {
                    $this->session->set_flashdata(
                        'error',
                        $this->upload->display_errors()
                    );
                    redirect('produk/pembayaran');
                }
            }

            $data   = [
                'method'            => $method,
                'number'            => $number,
                'account_holder'    => $account_holder,
                'icon'              => $icon
            ];

            $result = $this->db->insert('product_payment_method', $data);

            if ($result) {
                $this->session->set_flashdata(
                    'message',
                    'Metode Pembayaran ditambahkan'
                );
                redirect('produk/pembayaran');
            } else {
                $this->session->set_flashdata(
                    'error',
                    'Metode Pembayaran tidak ditambahkan'
                );
                redirect('produk/pembayaran');
            }

        }

    }

    public function icon_pembayaran($icon)
    {
        $source_path = FCPATH . 'assets/img/product_payment/' . $icon;
        $target_path = FCPATH . '/assets/img/product_payment/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'height' => 80,

        );

        $this->load->library('image_lib', $config_manip[0]);
        $this->image_lib->initialize($config_manip);
        if (!$this->image_lib->resize()) {
            $this->session->set_flashdata('error', $this->image_lib->display_errors(NULL, NULL));
            redirect('produk/pembayaran');
        }   
    }

    public function editpembayaran()
    {
        $this->form_validation->set_rules('method', 'Nama Metode Pembayaran', 'required');
        $this->form_validation->set_rules('number', 'Nomor Pembayaran', 'required');
        $this->form_validation->set_rules('account_holder', 'Pemegang Akun', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                'Data tidak diedit'
            );
            redirect('produk/pembayaran');
        } else {

            $method = $this->input->POST('method');
            $number = $this->input->POST('number');
            $account_holder = $this->input->POST('account_holder');
            
            $id = $this->input->POST('id');
            $payment = $this->db->get_where('product_payment_method', ['id' => $id])->row_array();

            if ($payment) {

                $filename = $_FILES['icon']['name'];
    
                if ($filename) {
                    $config['allowed_types'] = 'png|PNG';
                    $config['max_size']     = '2040';
                    $config['upload_path'] = './assets/img/product_payment/';
    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('icon')) {
                        $new_image  = $this->upload->data();
                        $icon = $new_image['file_name'];
    
                        unlink('assets/img/product_payment/' . $payment['icon']);
                        $this->icon_pembayaran($icon);
    
                    } else {
                        $this->session->set_flashdata(
                            'error',
                            $this->upload->display_errors()
                        );
                        redirect('produk/pembayaran');
                    }
    
                    $data   = [
                        'method'            => $method,
                        'number'            => $number,
                        'account_holder'    => $account_holder,
                        'icon'              => $icon
                    ];
                } else {
                    $data   = [
                        'method'            => $method,
                        'number'            => $number,
                        'account_holder'    => $account_holder,
                    ];
    
                }
            



                $this->db->where('id', $id);
                $result = $this->db->update('product_payment_method', $data);

                if ($result) {
                    $this->session->set_flashdata(
                        'message',
                        'Metode Pembayaran diubah'
                    );
                    redirect('produk/pembayaran');
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Metode Pembayaran tidak diubah'
                    );
                    redirect('produk/pembayaran');
                }
            } else {
                $this->session->set_flashdata(
                    'error',
                    'Data Metode Pembayaran tidak ditemukan'
                );
                redirect('produk/pembayaran');
            }
        }

    }

    public function deletepembayaran($id)
    {
        if ($id == '') {
            $this->session->set_flashdata(
                'error',
                'Data tidak dihapus'
            );
            redirect('produk/pembayaran');
        } else {
            $payment = $this->db->get_where('product_payment_method', ['id' => $id])->row_array();

            if ($payment) {
                unlink('assets/img/product_payment/' . $payment['icon']);

                $result = $this->database->delete($id, 'product_payment_method');

                if ($result) {
                    $this->session->set_flashdata(
                        'message',
                        'Data berhasil dihapus'
                    );
                    redirect('produk/pembayaran');
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Data tidak dihapus'
                    );
                    redirect('produk/pembayaran');
                }
            }
        }
    }

}