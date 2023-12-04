<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('finance/finance_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('notice/notice_model');
        $this->load->model('home_model');
        $this->load->model('hospital/hospital_model');
        $this->load->model('settings/settings_model');
        // $this->modules = array('finance', 'appointment', 'notice', 'home', 'settings');
        $this->modules = array(
            'bed',
            'finance',
            'patient',
            'donor',
            'medicine',
            'report',
            'department',
            'doctor',
            'appointment',
            'notice',
            'nurse',
            'pharmacist',
            'laboratorist',
            'accountant',
            'receptionist',
            'attendance',
            'leave',
            'payroll',
            'prescription',
            'lab',
            'pharmacy',
            'file',
            'email',
            'sms',
            'chat'
        );
    }

    public function index() {
        $data = array();

        if (!$this->ion_auth->in_group(array('superadmin'))) {

            $date = date('d-m-Y');
            $clock_in = date('h:i A');
            $clock_out = "";
            $late = "";
            $halfday = "";
            $work_from = "";
            $details = array();
            $month = date('F', strtotime($date));
            $year = date('Y', strtotime($date));
            $day = explode('-', $date);

            $result = $this->db->get_where('attendance', array('staff' => $this->ion_auth->user()->row()->id, 'month' => $month, 'year' => $year))->row();
            if (!empty($result->details)) {
                $details = explode('#', $result->details);

                $detail = explode('_', $details[$day[0] - 1]);
            }

            $finalDetail = ($clock_in != '' ? $clock_in : 'NONE') . '_' . ($clock_out != '' ? $clock_out : 'NONE') . '_' . ($late == 'late' ? $late : 'NONE') . '_' . ($halfday == 'halfday' ? $halfday : 'NONE') . '_' . ($work_from == '' ? 'office' : $work_from);

            $details[$day[0] - 1] = $finalDetail;

            $detail = implode('#', $details);
            if (!empty($result->log)) {
                $logs = explode("_", $result->log);
                $checkAdded = "";

                if ($clock_in != '') {
                    $checkAdded = $logs[$day[0] - 1];
                    $logs[$day[0] - 1] = 'yes';
                }

                $log = implode('_', $logs);
            } else {
                $log = '';
                $checkAdded = '';
            }


            $data = array(
                'log' => $log,
                'details' => $detail
            );
            if (!empty($result->id)) {
                if ($checkAdded != 'yes') {
                    $this->db->where('id', $result->id);
                    $this->db->update('attendance', $data);
                }
            }

            $data['sum'] = $this->home_model->getSum('gross_total', 'payment');
            $data['payments'] = $this->finance_model->getPayment();
            $data['notices'] = $this->notice_model->getNotice();
            $data['this_month'] = $this->finance_model->getThisMonth();
            $data['expenses'] = $this->finance_model->getExpense();

            if ($this->ion_auth->in_group(array('Doctor'))) {
                redirect('doctor/details');
            } else {
                $data['appointments'] = $this->appointment_model->getAppointment();
            }

            if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) {
                redirect('finance/addPaymentView');
            }

            if ($this->ion_auth->in_group(array('Pharmacist'))) {
                redirect('finance/pharmacy/home');
            }

            if ($this->ion_auth->in_group(array('Patient'))) {
                redirect('patient/medicalHistory');
            }
            if ($this->ion_auth->in_group(array('Laboratorist'))) {
                redirect('lab');
            }


            if (!$this->ion_auth->in_group(array('Patient', 'Pharmacist', 'Accountant', 'Receptionist', 'Doctor'))) {
                $data['this_month']['payment'] = $this->finance_model->thisMonthPayment();
                $data['this_month']['expense'] = $this->finance_model->thisMonthExpense();
                $data['this_month']['appointment'] = $this->finance_model->thisMonthAppointment();

                $data['this_day']['payment'] = $this->finance_model->thisDayPayment();
                $data['this_day']['expense'] = $this->finance_model->thisDayExpense();
                $data['this_day']['appointment'] = $this->finance_model->thisDayAppointment();

                $data['this_year']['payment'] = $this->finance_model->thisYearPayment();
                $data['this_year']['expense'] = $this->finance_model->thisYearExpense();
                $data['this_year']['appointment'] = $this->finance_model->thisYearAppointment();

                $data['this_month']['appointment'] = $this->finance_model->thisMonthAppointment();
                $data['this_month']['appointment_treated'] = $this->finance_model->thisMonthAppointmentTreated();
                $data['this_month']['appointment_cancelled'] = $this->finance_model->thisMonthAppointmentCancelled();

                $data['this_year']['payment_per_month'] = $this->finance_model->getPaymentPerMonthThisYear();

                $data['this_year']['expense_per_month'] = $this->finance_model->getExpensePerMonthThisYear();
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('dashboard'); // just the header file
                $this->load->view('home', $data);
                $this->load->view('footer', $data);
            }
        } else {
            $data['hospitals'] = $this->hospital_model->getHospital();
            $data['this_month']['payment'] = $this->hospital_model->thisMonthlyDepositCount();
            $data['this_yearly']['payment'] = $this->hospital_model->thisYearlyDepositCount();
            $data['this_year']['payment_per_month'] = $this->hospital_model->getPaymentPerMonthThisYear();
            $data['this_monthly']['payment'] = $this->hospital_model->thisMonthlyDeposit();
            $data['this_year']['payment'] = $this->hospital_model->thisYearlyDeposit();
            $data['this_day']['payment'] = $this->hospital_model->thisDayMonthlyPayment();
            $data['this_day']['payment_yearly'] = $this->hospital_model->thisDayYearlyPayment();
            $data['this_year_payment']['payment'] = $this->hospital_model->thisYearYearlyPayment();
            $data['this_month_payment']['payment'] = $this->hospital_model->thisYearMonthlyPayment();
            $data['hospitals'] = $this->hospital_model->getHospital();
            $data['settings'] = $this->settings_model->getSettings();
            $this->load->view('dashboard'); // just the header file
            $this->load->view('home', $data);
            $this->load->view('footer');
        }
    }

    public function permission() {
        $this->load->view('permission');
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
