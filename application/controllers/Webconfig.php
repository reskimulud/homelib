<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webconfig extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title']      = 'Pengaturan Website';
        $data['user']       = $this->database->getUser();
        $data['detail']     = $this->db->get('web_config_detail')->row_array();
        $data['teams']      = $this->database->getTeam();
        $data['users']      = $this->db->get('user')->result_array();
        $data['role']       = $this->db->get('user_role')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('backend/web_config/index', $data);
        $this->load->view('template/footer');
    }

    public function web_detail()
    {
        $detail     = $this->db->get('web_config_detail')->row_array();

        $this->form_validation->set_rules('name', 'Nama Website', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('domain', 'Nama Domain', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                'Data tidak diperbarui'
            );
            redirect('webconfig');
        } else {
            $name   = $this->input->POST('name');
            $email   = $this->input->POST('email');
            $domain   = $this->input->POST('domain');
            $description   = $this->input->POST('description');
            $keyword   = $this->input->POST('keyword');
            $address   = $this->input->POST('address');
            $gmaps   = $this->input->POST('gmaps');
            $telp   = $this->input->POST('telp');
            $github   = $this->input->POST('github');
            $facebook   = $this->input->POST('facebook');
            $instagram   = $this->input->POST('instagram');
            $twitter   = $this->input->POST('twitter');
            $pinterest   = $this->input->POST('pinterest');
            $policy   = $this->input->POST('policy');
            $terms   = $this->input->POST('terms');

            $favicon    = $_FILES['favicon']['name'];

            if ($favicon) {
                unlink('favicon.ico');
                
                $config['allowed_types'] = 'ico';
                $config['max_size']     = '200';
                $config['upload_path'] = './';
                $config['file_name']    = 'favicon.ico';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('favicon')) {
                    $new_image  = $this->upload->data();
                    $favicon = $new_image['file_name'];
                } else {
                    $this->session->set_flashdata(
                        'error',
                        $this->upload->display_errors()
                    );
                    redirect('webconfig');
                }
            }

            $data   = [
                'name'      => $name,
                'email'      => $email,
                'domain'      => $domain,
                'description'      => $description,
                'keyword'      => $keyword,
                'address'      => $address,
                'gmaps'      => $gmaps,
                'telp'      => $telp,
                'github'      => $github,
                'facebook'      => $facebook,
                'instagram'      => $instagram,
                'twitter'      => $twitter,
                'pinterest'      => $pinterest,
                'policy'      => $policy,
                'terms'      => $terms,
            ];

            if  ($detail) {
                $this->db->where('id', $detail['id']);
                $result     = $this->db->update('web_config_detail', $data);

                if ($result) {
                    if ($result === $detail) {
                        $this->session->set_flashdata(
                            'error',
                            'Data tidak diperbarui'
                        );
                        redirect('webconfig');
                    } else {

                        $this->session->set_flashdata(
                        'message',
                        'Data berhasil diperbarui'
                        );
                        redirect('webconfig');
                    }
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Data tidak diperbarui'
                    );
                    redirect('webconfig');
                }
            } else {
                $result     = $this->db->insert('web_config_detail', $data);

                if ($result) {
                    if ($result === $detail) {
                        $this->session->set_flashdata(
                            'error',
                            'Data tidak diperbarui'
                        );
                        redirect('webconfig');
                    } else {

                        $this->session->set_flashdata(
                            'message',
                            'Data berhasil diperbarui'
                            );
                            redirect('webconfig');
                    }
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Data tidak diperbarui'
                    );
                    redirect('webconfig');
                }

            }
            
        }
    }

    public function tim()
    {
        $this->form_validation->set_rules('name', 'Nama Anggota', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                'Anggota tidak ditambahkam'
            );
            redirect('webconfig');
        } else {
            $name       = $this->input->POST('name');
            $position   = $this->input->POST('position');
            $telp       = $this->input->POST('telp');
            $role       = $this->input->POST('role');
            $user_id    = $this->input->POST('user_id');

            $user = $this->db->get_where('user', ['id' => $user_id])->row_array();

            if ($user) {
                $data   = [
                    'user_id' => $user_id,
                    'name'  => $name,
                    'position'  => $position,
                    'telp'  => $telp
                ];

                $this->database->update(['role_id' => $role], $user_id, 'user');
            

                $result = $this->database->save($data, 'web_config_team');

                if ($result) {
                    $this->session->set_flashdata(
                        'message',
                        'Anggota ditambahkan'
                    );
                    redirect('webconfig');
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Anggota tidak ditambahkan'
                    );
                    redirect('webconfig');
                }
            }
            
        }
    }

    public function edit_tim()
    {
        $this->form_validation->set_rules('name', 'Nama Anggota', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                'Anggota tidak diubah'
            );
            redirect('webconfig');
        } else {
            $id         = $this->input->POST('id');
            $name       = $this->input->POST('name');
            $position   = $this->input->POST('position');
            $email      = $this->input->POST('email');
            $telp       = $this->input->POST('telp');

            $is_id  = $this->database->getById($id, 'web_config_team');

            if ($is_id) {
                
                $data   = [
                    'name'  => $name,
                    'position'  => $position,
                    'email'  => $email,
                    'telp'  => $telp
                ];
    
                $result = $this->database->update($data, $id, 'web_config_team');
    
                if ($result) {
                    $this->session->set_flashdata(
                        'message',
                        'Anggota diubah'
                    );
                    redirect('webconfig');
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Anggota tidak diubah'
                    );
                    redirect('webconfig');
                }
            } else {
                $this->session->set_flashdata(
                    'error',
                    'Anggota tidak ditemukan'
                );
                redirect('webconfig');
            }

            
        }
    }
}