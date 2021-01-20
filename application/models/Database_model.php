<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Database_model extends CI_Model
{
    
    public function getAll($table)
    {
        return $this->db->get($table)->result_array();
    }
    
    public function getById($id, $table)
    {
        return $this->db->get_where($table, ['id' => $id])->row_array();
    }

    public function getField($field, $table)
    {
        $query  = "SELECT $field FROM $table";
        return $this->db->query($query)->result_array();
    }

    public function getFieldById($id, $field, $table)
    {
        $query  = "SELECT $field FROM $table WHERE `id` = $id ";
        return $this->db->query($query)->row_array();
    }

    public function save($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    
    public function update($data, $id, $table)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }

    public function delete($id, $table)
    {
        $this->db->where('id', $id);
        return $this->db->delete($table);
    }

    public function getUser()
    {
        $email  = $this->session->userdata('email');
        $query  = "SELECT `user`.*, `user_role`.`role`
                     FROM `user` JOIN `user_role`
                       ON `user`.`role_id`  = `user_role`.`id`
                    WHERE `user`.`email`    =  '{$email}'
                ";
        return $this->db->query($query)->row_array();
    }

    public function getUserWithRoleName()
    {
        $query  = "SELECT `user`.*, `user_role`.`role`
                     FROM `user` JOIN `user_role`
                       ON `user`.`role_id` = `user_role`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getUserWithRoleNameById($id)
    {
        $query  = "SELECT `user`.*, `user_role`.`role`
                     FROM `user` JOIN `user_role`
                       ON `user`.`role_id` = `user_role`.`id`
                    WHERE `user`.`id`      = $id
                ";
        return $this->db->query($query)->row_array();
    }

    public function getSubMenu()
    {
        $query  = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                     FROM `user_sub_menu` JOIN `user_menu`
                       ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getProduct()
    {
        $query  = "SELECT `product`.*, `user`.`name`, `product_category`.`category`
                     FROM `product` JOIN `user` JOIN `product_category`
                       ON `product`.`added_by`    = `user`.`id`
                      AND `product`.`category_id` = `product_category`.`id`   
                 ORDER BY `product`.`date_added` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getProductById($id)
    {
        $query  = "SELECT `product`.*, `user`.`name`, `product_category`.`category`
                     FROM `product` JOIN `user` JOIN `product_category`
                       ON `product`.`added_by`    = `user`.`id`
                      AND `product`.`category_id` = `product_category`.`id`   
                    WHERE `product`.`id`          = $id 
                 ORDER BY `product`.`date_added` DESC
                ";
        return $this->db->query($query)->row_array();
    }

    public function getProductCategory()
    {
        return $this->db->get('product_category')->result_array();
    }
    
    public function getProductCategoryById($id)
    {
        return $this->db->get_where('product_category', ['id' => $id])->row_array();
    }

    public function getTransaction()
    {
        $query  = "SELECT `transaction`.*, `user`.`name`, `product_payment_method`.`method`, `product_payment_method`.`icon`
                     FROM `transaction` JOIN `user` JOIN `product_payment_method`
                       ON `transaction`.`user_id`    = `user`.`id`
                      AND `transaction`.`method_id` = `product_payment_method`.`id`   
                 ORDER BY `transaction`.`date_created` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getTransactionById($id)
    {
        $query  = "SELECT `transaction`.*, `user`.`name`, `product_payment_method`.`method`, `product_payment_method`.`icon`
                     FROM `transaction` JOIN `user` JOIN `product_payment_method`
                       ON `transaction`.`user_id`    = `user`.`id`
                      AND `transaction`.`method_id` = `product_payment_method`.`id`   
                    WHERE `transaction`.`id`         = $id 
                 ORDER BY `transaction`.`date_created` DESC
                ";
        return $this->db->query($query)->row_array();
    }

    public function getTransactionByNumber($transactionNumber)
    {
        $query  = "SELECT `transaction`.*, `user`.`name`, `product_payment_method`.`method`, `product_payment_method`.`icon`
                     FROM `transaction` JOIN `user` JOIN `product_payment_method`
                       ON `transaction`.`user_id`    = `user`.`id`
                      AND `transaction`.`method_id` = `product_payment_method`.`id`   
                    WHERE `transaction`.`transaction_number`    = '$transactionNumber'
                ";
        return $this->db->query($query)->row_array();
    }

    public function getTransactionByUser()
    {
        $user   = $this->getUser();
        $id     = $user['id'];
        $query  = "SELECT `transaction`.*, `user`.`name`, `product_payment_method`.`method`, `product_payment_method`.`icon`
                     FROM `transaction` JOIN `user` JOIN `product_payment_method`
                       ON `transaction`.`user_id`   = `user`.`id`
                      AND `transaction`.`method_id` = `product_payment_method`.`id`   
                    WHERE `transaction`.`user_id`   = $id
                 ORDER BY `transaction`.`date_created` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getInvoice()
    {
        $query  = "SELECT `transaction_invoice`.*, `user`.`name`, `transaction`.`transaction_number`
                     FROM `transaction_invoice` JOIN `user` JOIN `transaction`
                       ON `transaction_invoice`.`order_by`          = `user`.`id`
                      AND `transaction_invoice`.`transaction_id`    = `transaction`.`id`
                 ORDER BY `transaction_invoice`.`date_created` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getInvoiceById($id)
    {
        $query  = "SELECT `transaction_invoice`.*, `user`.`name`, `transaction`.`transaction_number`
                     FROM `transaction_invoice` JOIN `user` JOIN `transaction`
                       ON `transaction_invoice`.`order_by`          = `user`.`id`
                      AND `transaction_invoice`.`transaction_id`    = `transaction`.`id`
                    WHERE `transaction_invoice`.`id`       = $id  
                 ORDER BY `transaction_invoice`.`date_created` DESC
                ";
        return $this->db->query($query)->row_array();
    }

    public function getTeam()
    {
        $query = "SELECT `web_config_team`.*, `user`.`email`, `user`.`image`,`user`.`username`
                    FROM `web_config_team` JOIN `user`
                      ON `web_config_team`.`user_id` = `user`.`id`
                      ";

        return $this->db->query($query)->result_array();
    }

    public function getTeamById($id)
    {
        $query = "SELECT `web_config_team`.*, `user`.`email`, `user`.`image`,`user`.`username`
                    FROM `web_config_team` JOIN `user`
                      ON `web_config_team`.`user_id` = `user`.`id`
                   WHERE `web_config_team`.`id`      = $id
                      ";

        return $this->db->query($query)->row_array();
    }

    public function getAddress()
    {
        $query = "SELECT `user_address`.*
                    FROM `user_address` JOIN `user`
                      ON `user_address`.`user_id` = `user`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getAddressById($id)
    {
        $query = "SELECT `user_address`.*
                    FROM `user_address` JOIN `user`
                      ON `user_address`.`user_id`   = `user`.`id`
                   WHERE `user_address`.`user_id`   = $id
                    ";
        return $this->db->query($query)->result_array();
    }
}