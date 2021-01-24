<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notification_model extends CI_Model
{
    public function notification($target, $title, $icon, $body, $href)
    {
        $data = [
            'target'        => $target,
            'title'         => $title,
            'icon'          => $icon,
            'body'          => $body,
            'href'          => $href,
            'date_created'  => time()
        ];

        return $this->db->insert('notification', $data);
    }
}