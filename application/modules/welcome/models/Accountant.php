<?php
class Accountant extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }
    public function accdata()
    {
        $query = $this->db->get("accountant");
        $res = $query->result();
        //get  the name of the accountant
        $name = $res[0]->name;
        return $name;
    }
}

?>