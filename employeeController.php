<?php
class EmployeeController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $employees = $this->model->getAllEmployees();
        include 'views/employee/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $designation = $_POST['designation'];
            
            $this->model->addEmployee($name, $email, $designation);
            header('Location: index.php');
        } else {
            include 'views/employee/add.php';
        }
    }public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $designation = $_POST['designation'];
            
            $this->model->updateEmployee($id, $name, $email, $designation);
            header('Location: index.php');
        } else {
            $employee = $this->model->getEmployeeById($id);
            include 'views/employee/edit.php';
        }
    }

    public function delete($id) {
        $this->model->deleteEmployee($id);
        header('Location: index.php');
    }
}
?>