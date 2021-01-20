<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagination_model extends CI_Model

{ 
    //==================================================================//
    //============================Role==================================//
    public function getAllRole() 
    {
        return $this->db->get('user_role')->result_array();
    }

    public function getRole($limit, $start)
    {
        return $this->db->get('user_role', $limit, $start)->result_array();
    }

    public function countAllRole()
    {
        return $this->db->get('user')->num_rows();
    }

    //=======================================================================
    //=========================Users===================================

    public function getAllUsers() 
    {
        return $this->db->get('user')->result_array();
    }

    public function getUsers($limit, $start)
    {
        return $this->db->get('user', $limit, $start)->result_array();
    }

    public function countAllUsers()
    {
        return $this->db->get('user')->num_rows();
    }

    //=====================================================================
    //=======================Music=========================================
    
    public function getAllMusic()
    {
        return $this->db->get('music')->result_array();
    }

    public function getMusic($limit, $start)
    {
        return $this->db->get('music', $limit, $start)->result_array();
    }

    public function countAllMusic()
    {
        return $this->db->get('music')->num_rows();
    }
    
    //=====================================================================
    //=======================Music=========================================
    
    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function getMenu($limit, $start)
    {
        return $this->db->get('user_menu', $limit, $start)->result_array();
    }

    public function countAllMenu()
    {
        return $this->db->get('user_menu')->num_rows();
    }

}