<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
    }

    public function index() {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $this->load->view('employee/list', $data);
    }

    public function add() {
        if ($this->input->post('submit')) {
            $this->Employee_model->add_employee();
            redirect('employee');
        } else {
            $this->load->view('employee/add');
        }
    }

    public function edit($id) {
        if ($this->input->post('submit')) { $this->Employee_model->update_employee($id);
            redirect('employee');
        } else {
            $data['employee'] = $this->Employee_model->get_employee($id);
            $this->load->view('employee/edit', $data);
        }
    }

    public function delete($id) {
        $this->Employee_model->delete_employee($id);
        redirect('employee');
    }
}
?>