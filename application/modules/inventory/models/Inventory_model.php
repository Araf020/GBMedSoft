<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inventory_model extends CI_model {

    function __construct() {
        parent::__construct();
        // $this->load->model('medicine_model');
        $this->load->database();
    }

    function insertItem($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        
        $this->db->insert('inventory', $data2);
    }
    //get all inventory
    function getInventory() {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get();
        return $query->result();
    }
    function getItemById($itemid)
    {
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description, l.last_add_date as last_add, l.last_out_date as last_out');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->where('i.item_id', $itemid);
        $query = $this->db->get();
        return $query->row();
    }

    function getItemByIdAndDeptId($item_id, $deptId) {
        $this->db->select('item_quantity');
        $this->db->from('inventory');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('item_id', $item_id);
        $this->db->where('department_id', $deptId);
        $query = $this->db->get();
        return $query->row();
    }

    function updateItem($item_id, $deptId, $data) {
        //add last_add_date 
        // $data['last_add_date'] = date('Y-m-d H:i:s');
        $this->db->where('item_id', $item_id);
        $this->db->where('department_id', $deptId);
        $this->db->update('inventory', $data);
    }

    function getInvetoryItemByDeptId($id) {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('department_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getInventoryDataByLimit($limit, $start, $order, $dir) {
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description, l.last_add_date as last_add, l.last_out_date as last_out');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));
    
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
    
        $this->db->limit($limit, $start);
    
        $query = $this->db->get();
        return $query->result();
    }

    function getInventoryBySearch($search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
    
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));
        $this->db->like('i.item_name', $search);
        $this->db->or_like('i.item_type', $search);
        $this->db->or_like('i.item_price', $search);
        $this->db->or_like('l.item_quantity', $search);
        $this->db->or_like('i.item_unit', $search);
        $this->db->or_like('i.item_description', $search);
    
        $query = $this->db->get();
        return $query->result();
    }

    function getInventoryByLimitBySearch($limit, $start, $search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
    
        $this->db->limit($limit, $start);
    
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));
        $this->db->like('i.item_name', $search);
        $this->db->or_like('i.item_type', $search);
        $this->db->or_like('i.item_price', $search);
        $this->db->or_like('l.item_quantity', $search);
        $this->db->or_like('i.item_unit', $search);
        $this->db->or_like('i.item_description', $search);
    
        $query = $this->db->get();
        return $query->result();
    }

    function getInventoryWithoutSearch($order, $dir) {
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));
    
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'asc');
        }
    
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    
    
}
