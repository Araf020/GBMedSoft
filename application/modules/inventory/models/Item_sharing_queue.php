<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Item_sharing_queue extends CI_model {

    function __construct() {
        parent::__construct();
        // $this->load->model('medicine_model');
        $this->load->database();
    }

    function getItemQueueByDeptId($dept_id)
    {
        $hospital_id = $this->session->userdata('hospital_id');
        // the columns are 
        /**
         * id
            * item_id, inventory_id, quantity, from_dept, dest_dept, status, timestamp, hospital_id

            * inventory_id is reference column of inventory table

         */
        $this->db->select('q.id, q.quantity, it.item_name, d.name as from_dept_name,q.timestamp');
        $this->db->from('item_sharing_queue as q');
        $this->db->join('inventory as inv', 'inv.inventory_id = q.inventory_id');
        $this->db->join('item as it', 'inv.item_id = it.item_id');
        $this->db->join('department as d', 'd.id = q.from_dept');
        $this->db->where('q.dest_dept', $dept_id);
        $this->db->where('q.hospital_id', $hospital_id);
        $this->db->where('q.status', 'Pending');
        // Execute the query
        $query = $this->db->get();
        return $query->result();

        
    }

    function updateItemQueue($id, $data) {
        
        $this->db->where('id', $id);
        $this->db->update('item_sharing_queue', $data);

    }

    function getItemById($id)
    {
        $this->db->select('item_id, quantity, dest_dept, from_dept,inventory_id, expire_date');
        $this->db->from('item_sharing_queue');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function insertItemQueue($data)
    {
        $this->db->insert('item_sharing_queue', $data);
        return $this->db->insert_id();
    }

    
    

    

    
}