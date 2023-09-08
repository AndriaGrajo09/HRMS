<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    public function get_all_employees() {
        return $this->db->get('employees')->result();
    }

    public function get_employee($id) {
        return $this->db->where('id', $id)->get('employees')->row();
    }

    public function add_employee() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'designation' => $this->input->post('designation')
        );
        $this->db->insert('employees', $data);
    }

    public function update_employee($id) {
        $data = array('name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'designation' => $this->input->post('designation')
    );
    $this->db->where('id', $id)->update('employees', $data);
}

public function delete_employee($id) {
    $this->db->where('id', $id)->delete('employees');
}
}
?>