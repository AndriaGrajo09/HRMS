<?php
class DepartmentController {
    private $departmentModel;

    public function __construct($departmentModel) {
        $this->departmentModel = $departmentModel;
    }

    public function index() {
        // Retrieve a list of all departments
        $departments = $this->departmentModel->getAllDepartments();
        include 'views/department/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to add a department
            $name = $_POST['name'];
            $description = $_POST['description'];

            $this->departmentModel->addDepartment($name, $description);
            header('Location: index.php?controller=DepartmentController&action=index');
        } else {
            // Display the form to add a department
            include 'views/department/add.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to edit a department
            $name = $_POST['name'];
            $description = $_POST['description'];

            $this->departmentModel->updateDepartment($id, $name, $description);
            header('Location: index.php?controller=DepartmentController&action=index');
        } else {
            // Display the form to edit a department
            $department = $this->departmentModel->getDepartmentById($id);}
        }
    
        public function delete($id) {
            // Delete a department
            $this->departmentModel->deleteDepartment($id);
            header('Location: index.php?controller=DepartmentController&action=index');
        }
    }
    ?>