<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inventory_model extends CI_model {

    function __construct() {
        parent::__construct();
        // $this->load->model('medicine_model');
        $this->load->database();
    }

    function insertItem($item_id,$data, $deptId) {
        $data1 = array('item_id' => $item_id, 'hospital_id' => $this->session->userdata('hospital_id'), 'department_id' => $deptId);
        $data2 = array_merge($data, $data1);
        
        $this->db->insert('inventory', $data2);
    }
    //get all inventory
    function getInventory() {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('department_id', $this->session->userdata('department_id'));
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
        $this->db->where('l.department_id', $this->session->userdata('department_id'));
        $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));

        $query = $this->db->get();
        return $query->row();
    }

    function getItemByIdAndDeptId($item_id, $deptId) {
        $this->db->select('item_quantity,expire_date,item_id,inventory_id, expire_date');
        $this->db->from('inventory');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('item_id', $item_id);
        $this->db->where('department_id', $deptId);
        $query = $this->db->get();
        return $query->row();
    }

    function updateItem($item_id, $deptId, $data) {
        
        $this->db->where('item_id', $item_id);
        $this->db->where('department_id', $deptId);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->update('inventory', $data);
    }

    function deleteItemFromInventory($item_id, $deptId) {
        $this->db->where('item_id', $item_id);
        $this->db->where('department_id', $deptId);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->delete('inventory');
    }

    

    function getInvetoryItemByDeptId($dept_id) {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('department_id', $dept_id);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get();
        return $query->result();
    }

    function getInventoryDataByLimit($limit, $start, $order, $dir) {
        $dept_id = $this->session->userdata('department_id');
       
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description, l.last_add_date as last_add, l.last_out_date as last_out, l.expire_date,d.name as department');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->join('department as d', 'd.id = l.department_id');
        $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('l.department_id', $dept_id);
    
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
    
        $this->db->limit($limit, $start);
    
        $query = $this->db->get();
        return $query->result();
    }

    function getInventoryExpiredDataByLimit($limit, $start, $order, $dir)
    {
        $dept_id = $this->session->userdata('department_id');
       
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description, l.last_add_date as last_add, l.last_out_date as last_out, l.expire_date,d.name as department');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->join('department as d', 'd.id = l.department_id');
        $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('l.department_id', $dept_id);
        $this->db->where('l.expire_date <=', date('Y-m-d'));
    
        // if ($order != null) {
        //     $this->db->order_by($order, $dir);
        // } else {
        //     $this->db->order_by('id', 'desc');
        // }
        $this->db->order_by('l.expire_date', 'desc');
        $this->db->limit($limit, $start);
    
        $query = $this->db->get();
        return $query->result();
    }

    function getInventoryBySearch($search, $order, $dir) {
        
        
        $dept_id = $this->session->userdata('department_id');
       
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description, l.last_add_date as last_add, l.last_out_date as last_out,d.name as department');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->join('department as d', 'd.id = l.department_id');
        $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('l.department_id', $dept_id);

        $this->db->like('i.item_name', $search);
        $this->db->or_like('i.item_type', $search);
        $this->db->or_like('i.item_price', $search);
        $this->db->or_like('l.item_quantity', $search);
        $this->db->or_like('i.item_unit', $search);
        $this->db->or_like('i.item_description', $search);
    
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
    
        $query = $this->db->get();
        return $query->result();
    }

    function getInventoryByLimitBySearch($limit, $start, $search, $order, $dir) {

        $dept_id = $this->session->userdata('department_id');
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description, l.last_add_date as last_add, l.last_out_date as last_out, d.name as department');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->join('department as d', 'd.id = l.department_id');
        // $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('l.department_id', $dept_id);

        $this->db->like('i.item_name', $search);
        $this->db->or_like('i.item_type', $search);
        $this->db->or_like('i.item_price', $search);
        $this->db->or_like('l.item_quantity', $search);
        $this->db->or_like('i.item_unit', $search);
        $this->db->or_like('i.item_description', $search);
    
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
    
        $this->db->limit($limit, $start);
    
        $query = $this->db->get();
        $result = $query->result();
        return $result;



        
    }

    function getInventoryWithoutSearch($order, $dir) {

         $dept_id = $this->session->userdata('department_id');
        $this->db->select('l.item_id as id, i.item_name as name, i.item_type as category, i.item_price as price, l.item_quantity as quantity, i.item_unit as unit, i.item_description as description, l.last_add_date as last_add, l.last_out_date as last_out, d.name as department');
        $this->db->from('inventory as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->join('department as d', 'd.id = l.department_id');
        $this->db->where('l.hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('l.department_id', $dept_id);
    
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'asc');
        }
    
        $query = $this->db->get();
        return $query->result();
    }
    

    // function getItemQuantity($itemid, $dept_id)
    // {
    //     $this->db->select('item_quantity as quantity');
    //     $this->db->from('inventory');
    //     $this->db->where('item_id', $itemid);
    //     $this->db->where('department_id', $dept_id);
    //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));

    //     $query = $this->db->get();
    //     //return the quantity value
    //     return $query->row();
    // }

    function addQuantityByInventoryId($inventory_id, $quantity)
    {
        $this->db->select('item_quantity');
        $this->db->from('inventory');
        $this->db->where('inventory_id', $inventory_id);

        $query = $this->db->get();
        $previous_quantity = $query->row()->item_quantity;
        $new_quantity = $previous_quantity + $quantity;
        $data = array('item_quantity' => $new_quantity);
        $this->db->where('inventory_id', $inventory_id);
        
        
        $this->db->update('inventory', $data);


    }

    function getQuantityById($inventory_id)
    {
        $this->db->select('item_quantity');
        $this->db->from('inventory');
        $this->db->where('inventory_id', $inventory_id);

        $query = $this->db->get();
        $quantity = $query->row()->item_quantity;
        return $quantity;
    }
    
    
    
    
}
