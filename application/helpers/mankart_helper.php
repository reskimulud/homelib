<?php 

function is_logged_in() 
{
    $ci     = get_instance();
    if (!$ci->session->userdata('email')) {
        # code...
        redirect('auth');
    } else {
        $role_id    = $ci->session->userdata('role_id');
        $menu       = $ci->uri->segment(1);

        $queryMenu  = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id    = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
            ]);

        if ($userAccess->num_rows() < 1) {
            # code...
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci     = get_instance();

    // $result = $ci->db->where('user_access_menu', [
    //     'role_id' => $role_id,
    //     'menu_id' => $menu_id
    //     ]);
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
    

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function check_active($id)
{
    $ci     = get_instance();

    // $result = $ci->db->where('user_access_menu', [
    //     'id' => $id,
    //     'menu_id' => $menu_id
    //     ]);
    $ci->db->where('is_active', $id);
    $result = $ci->db->get('user');
    

    if ($result->num_rows() == 1) {
        return "checked='checked'";
    }
}

function web_info()
{
    $ci     = get_instance();

    return $ci->db->get('web_config_detail')->row_array();
}