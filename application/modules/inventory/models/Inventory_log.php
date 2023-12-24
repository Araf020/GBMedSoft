<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inventory_log extends CI_model {

    function __construct() {
        parent::__construct();
        // $this->load->model('medicine_model');
        $this->load->database();
    }

    // function updateLog($item_id,$dept_id, $data) {
        
    //     $this->db->where('item_id', $item_id);
    //     $this->db->where('dept_id', $dept_id);
    //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    //     $this->db->update('inventory_log', $data);

    // }
    

    function insertLog($data) {
        //insert and return id
        $this->db->insert('inventory_log', $data);
        return $this->db->insert_id();
        
    }

    function getLogs($item_id, $dept_id)
    {
        $this->db->select('timestamp, qty, remarks, previous_qty');
        $this->db->from('inventory_log');
        $this->db->where('item_id', $item_id);
        $this->db->where('dept_id', $dept_id);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function getLogsByItemId($item_id, $limit, $start, $order, $dir) {
        $dept_id = $this->session->userdata('department_id');
        $hospital_id = $this->session->userdata('hospital_id');
        $this->db->select('l.item_id as id, i.item_name as itemname, u.username as user, l.qty as quantity, l.previous_qty, l.timestamp, l.remarks');
        $this->db->from('inventory_log as l');
        $this->db->join('item as i', 'i.item_id = l.item_id');
        $this->db->join('users as u', 'u.id = l.update_user');
        $this->db->where('l.item_id', $item_id);
        $this->db->where('l.dept_id', $dept_id);
        $this->db->where('l.hospital_id', $hospital_id);
        // $this->db->where('l.timestamp >= DATE_SUB(NOW(), INTERVAL 3 MONTH)');


        // if ($order != null) {
        //     $this->db->order_by($order, $dir);
        // } else {
        //     $this->db->order_by('id', 'desc');
        // }
        $this->db->order_by('l.timestamp', 'desc');
    
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        return $query->result();
    }
    

    

    
}