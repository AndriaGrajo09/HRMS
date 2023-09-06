<?php
class DesignationController {
    private $designationModel;

    public function __construct($designationModel) {
        $this->designationModel = $designationModel;
    }

    public function index() {
        // Retrieve a list of all designations
        $designations = $this->designationModel->getAllDesignations();
        include 'views/designation/list.php';
    }

    public function add() {if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle the form submission to add a designation
        $title = $_POST['title'];
        $description = $_POST['description'];

        $this->designationModel->addDesignation($title, $description);
        header('Location: index.php?controller=DesignationController&action=index');
    } else {
        // Display the form to add a designation
        include 'views/designation/add.php';
    }
}

public function edit($id) {
    if ($_SERVER['REQUEST_METHOD'] === public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to edit a designation
            $title = $_POST['title'];
            $description = $_POST['description'];

            $this->designationModel->updateDesignation($id, $title, $description);
            header('Location: index.php?controller=DesignationController&action=index');
        } else {
            // Display the form to edit a designation
            $designation = $this->designationModel->getDesignationById($id);
            include 'views/designation/edit.php';
        }
    }

    public function delete($id) {
        // Delete a designation
        $this->designationModel->deleteDesignation($id);
        header('Location: index.php?controller=DesignationController&action=index'); }
    }
    ?>