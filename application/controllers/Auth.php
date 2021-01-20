<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 

{ 

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index($products = NULL)
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        // rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'User Login';
            $this->load->view('auth/template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/template/auth_footer');
        } else {
            // jika validasi success
            
            $url        = 'https://www.google.com/recaptcha/api/siteverify';
            $postField  = ['secret' => '6LfIZCcaAAAAAFb1hGt-I1CfgTbB1S3MAVNDA6Zx', 'response' => $this->input->POST('token'), 'remoteip' => $_SERVER['REMOTE_ADDR']];

            $this->load->model('API_model', 'api');
            $verify_reCAPTCHA = $this->api->post($url, $postField);

            if ($verify_reCAPTCHA['success'] == TRUE && $verify_reCAPTCHA['score'] > 0.5 && $verify_reCAPTCHA['action'] == 'submit' ) {

                $this->_login();

            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger notification" role="alert">
                        Verifikasi CAPTCHA salah!
                    </div>'
                );
                redirect('auth');
            }


        }
    }

    private function _login() 
    {
        $products   = $this->input->post('products');
        $email      = $this->input->POST('email');
        $password   = $this->input->POST('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        # usernya ada
        if ($user) {
            //jika usernya ada
            # pengecekan apakah usernya aktif
            if ($user) {
                //jika user telah melakukan aktifasi
                if ($user['is_active'] == 1) {
                    # pengecekan password
                    if (password_verify($password, $user['password'])) {
                        //jika password benar
                        //masukan field ke dalam database
                        $data = [
                            'email'     => $user['email'],
                            'role_id'   => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        //mengecek role_id  
                        if ($user['role_id'] == 1) {
                            # jika role 1 maka admin
                            $this->session->set_flashdata(
                                'message',
                                "Selamat datang di Homelib,  {$user['name']}"
                            );
                            redirect('admin');
                        } else {
                            # jika role 2 maka user

                            if ($products) {
                                redirect('checkout?p=' . $products);
                            } 
                            else {

                                $this->session->set_flashdata(
                                    'message',
                                    "Selamat datang di Homelib,  {$user['name']}"
                                );
                                redirect('user');
                            }

                        }
                        
                    } else { //jika password salah
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger notification" role="alert">
                            Wrong password!
                        </div>'
                        );
                        if ($products) {
                            redirect('auth/r/' . $products);
                        } else {
                            redirect('auth');
                        }
                    }
                } else { //jika user belum aktifasi
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger notification" role="alert">
                        This email has not been activated!
                    </div>'
                    );
                    if ($products) {
                            redirect('auth/r/' . $products);
                        } else {
                            redirect('auth');
                        }
                }
            }

            
        } else {    //jika user tidak ada
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger notification" role="alert">
                Email is not registered!
            </div>'
            );
            if ($products) {
                redirect('auth/r/' . $products);
            } else {
                redirect('auth');
            }
        }

    }
    
    public function registration($products = NULL) 
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }
        
        // di docs CI, cari form_validation->Rule Reference
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique'     => 'Username ini tidak tersedia!'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email],', [
            'is_unique'     => 'Email telah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches'       => 'Pasword tidak sama',
            'min_length'    => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ( $this->form_validation->run() == false) {
            
            $data['title'] = 'User Registration';
            $this->load->view('auth/template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('auth/template/auth_footer');
        } else {
            $data = [
                'username'          => htmlspecialchars($this->input->POST('username', true)),
                'name'              => htmlspecialchars($this->input->POST('name', true)),
                'email'             => htmlspecialchars($this->input->POST('email', true)),
                'role_id'           => 2,
                'password'          => password_hash($this->input->POST('password1'), PASSWORD_DEFAULT),
                'address_id'        => htmlspecialchars($this->input->POST('address', true)),
                'profession'        => htmlspecialchars($this->input->POST('profession', true)),
                'is_active'         => 1,
                'date_registered'   => time()
            ];

            $products = $this->input->post('products');
            
            $this->db->insert('user', $data);

            if ($products) {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-success notification" role="alert">
                    Congratulation! your account has been created. Please Login
                </div>');
                redirect('auth/r/' . $products);

            } else {

                $this->session->set_flashdata('message', 
                '<div class="alert alert-success notification" role="alert">
                    Congratulation! your account has been created. Please Login
                </div>');
                redirect('auth');
            }

        }
    }

    public function logout() 
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');


        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success notification" role="alert">
                You have been logout!
            </div>'
        );
        redirect('auth');
    }

    public function forgot()
    {
        $data['title'] = 'Forgot Password';
        $this->load->view('auth/template/auth_header', $data);
        $this->load->view('auth/forgot');
        $this->load->view('auth/template/auth_footer');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}