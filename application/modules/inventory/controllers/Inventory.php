<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . '../vendor/autoload.php';


//require_once 'dompdf/autoload.inc.php';
class Inventory extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
        $this->load->model('doctor/doctor_model');
        
        // if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Nurse', 'Laboratorist', 'Doctor', 'Patient'))) {
        //     redirect('home/permission');
        // }
    }

    public function index() {
        
        $data['doctors'] = $this->doctor_model->getDoctor();

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $current_user = $this->ion_auth->get_user_id();
            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
        }
        // $data['prescriptions'] = $this->prescription_model->getPrescriptionByDoctorId($doctor_id);
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); 
        $this->load->view('inventory_view', $data);
        $this->load->view('home/footer'); 
    }

    public function getAllItems()
    {
        
    }

    public function all() {

        echo "all prescription";
    }

    function getMedicineList()
    {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        $order = $this->input->post("order");
        $columns_valid = array(
            "0" => "id",
            "1" => "namee",
            "2" => "category",
            "3" => "box",
            "4" => "price",
            "5" => "s_price",
            "6" => "quantity",
            "7" => "generic",
            "8" => "company",
            "9" => "effects",
            "10" => "e_date",
        );
        $values = $this->settings_model->getColumnOrder($order, $columns_valid);
        $dir = $values[0];
        $order = $values[1];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['medicines'] = $this->medicine_model->getMedicineBysearch($search, $order, $dir);
            } else {
                $data['medicines'] = $this->medicine_model->getMedicineWithoutSearch($order, $dir);
            }
        } else {
            if (!empty($search)) {
                $data['medicines'] = $this->medicine_model->getMedicineByLimitBySearch($limit, $start, $search, $order, $dir);
            } else {
                $data['medicines'] = $this->medicine_model->getMedicineByLimit($limit, $start, $order, $dir);
            }
        }

        $i = 0;
        foreach ($data['medicines'] as $medicine) {
            $i = $i + 1;
            $settings = $this->settings_model->getSettings();
            if ($medicine->quantity <= 0) {
                $quan = '<p class="os">Stock Out</p>';
            } else {
                $quan = $medicine->quantity;
            }
            $load = '<button type="button" class="btn btn-info btn-xs btn_width load" data-toggle="modal" data-id="' . $medicine->id . '">' . lang('load') . '</button>';
            $option1 = '<button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="' . $medicine->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</button>';

            $option2 = '<a class="btn btn-info btn-xs btn_width delete_button" href="medicine/delete?id=' . $medicine->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i> ' . lang('delete') . '</a>';
            $info[] = array(
                $i,
                $medicine->name,
                $medicine->category,
                $medicine->box,
                $settings->currency . $medicine->price,
                $settings->currency . $medicine->s_price,
                $quan . '<br>' . $load,
                $medicine->generic,
                $medicine->company,
                $medicine->effects,
                $medicine->e_date,
                $option1 . ' ' . $option2
                //  $options2
            );
        }

        if (!empty($data['medicines'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => count($this->medicine_model->getMedicine()),
                "recordsFiltered" => $i,
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getItemList()
    {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        $order = $this->input->post("order");
        // $columns_valid = array(
        //     "0" => "id",
        //     "1" => "namee",
        //     "2" => "category",
        //     "3" => "box",
        //     "4" => "price",
        //     "5" => "s_price",
        //     "6" => "quantity",
        //     "7" => "generic",
        //     "8" => "company",
        //     "9" => "effects",
        //     "10" => "e_date",
        // );

        $columns_valid = array(
            "0" => "id",
            "1" => "name",
            "2" => "category",
            "3" => "price",
            "4" => "quantity",
            "5" => "unit",
            "6" => "description",
            "7" => "last_add",
            "8" => "last_out",
            // "9" => "effects",
            // "10" => "e_date",
        );
        $values = $this->settings_model->getColumnOrder($order, $columns_valid);
        $dir = $values[0];
        $order = $values[1];

        //for test
        $testData = $this->inventory_model->getInventoryDataByLimit($limit, $start, $order, $dir);

        // if ($limit == -1) {
        //     if (!empty($search)) {
        //         $data['items'] = $this->medicine_model->getMedicineBysearch($search, $order, $dir);
        //     } else {
        //         $data['items'] = $this->medicine_model->getMedicineWithoutSearch($order, $dir);
        //     }
        // } else {
        //     if (!empty($search)) {
        //         $data['items'] = $this->medicine_model->getMedicineByLimitBySearch($limit, $start, $search, $order, $dir);
        //     } else {
        //         $data['items'] = $this->medicine_model->getMedicineByLimit($limit, $start, $order, $dir);
        //     }
        // }

        if ($limit == -1) {
            if (!empty($search)) {
                $data['items'] = $this->inventory_model->getInventoryBySearch($search, $order, $dir);
            } else {
                $data['items'] = $this->inventory_model->getInventoryWithoutSearch($order, $dir);
            }
        } else {
            if (!empty($search)) {
                $data['items'] = $this->inventory_model->getInventoryByLimitBySearch($limit, $start, $search, $order, $dir);
            } else {
                $data['items'] = $this->inventory_model->getInventoryDataByLimit($limit, $start, $order, $dir);
            }
        }

        $i = 0;
        foreach ($data['items'] as $item) {
            $i = $i + 1;
            $settings = $this->settings_model->getSettings();
            if ($item->quantity <= 0) {
                $quan = '<p class="os">Stock Out</p>';
            } else {
                $quan = $item->quantity;
            }
            $load = '<button type="button" class="btn btn-info btn-xs btn_width load" data-toggle="modal" data-id="' . $item->id . '">' . lang('load') . '</button>';
            $option1 = '<button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="' . $item->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</button>';

            $option2 = '<a class="btn btn-info btn-xs btn_width delete_button" href="medicine/delete?id=' . $item->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i> ' . lang('delete') . '</a>';
            $info[] = array(
                $i,
                $item->name,
                $item->category,
                // $item->box,
                $settings->currency . $item->price,
                // $settings->currency . $item->s_price,
                $quan . '<br>' . $load,
                $item->unit,
                $item->description,
                $item->last_add,
                $item->last_out,
                $option1 . ' ' . $option2
                //  $options2
            );
        }
        $totalEntries = count($this->inventory_model->getInventory());

        if (!empty($data['items'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $totalEntries,
                "recordsFiltered" => $i,
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

}

/* End of file inventory.php */
