<?php
defined('BASEPATH') or exit('No direct script access allowed');

class order_model extends CI_Model
{
    public function getAllOrder()
    {
        return $this->db->get('order')->result_array();
    }
}
