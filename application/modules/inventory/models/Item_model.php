<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Item_model extends CI_model {

    function __construct() {
        parent::__construct();
        // $this->load->model('medicine_model');
        $this->load->database();
    }

    function updateItem($item_id, $data) {
        
        $this->db->where('item_id', $item_id);
        $this->db->update('item', $data);

    }

    function insertItem($data) {
        //insert and return id
        $this->db->insert('item', $data);
        return $this->db->insert_id();
        
    }
}