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

    function getAllItem()
    {
        $this->db->select('item_id as id, item_name as name');
        $this->db->from('item');
        // $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get();
        return $query->result();
    }

    function getItemById($itemid)
    {
        $this->db->select('item_id as id, item_name as name, item_type as category, item_price as price, item_unit as unit, item_description as description');
        $this->db->from('item');
        $this->db->where('item_id', $itemid);
        // $this->db->where('hospital_id', $this->session->userdata('hospital_id'));

        $query = $this->db->get();
        return $query->row();
    }

   
}