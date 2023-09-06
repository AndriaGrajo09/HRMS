<?php
class DepartmentModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllDepartments() {
        // Implement logic to retrieve a list of all departments from the database
        $sql = "SELECT * FROM departments";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDepartmentById($id) {
        // Implement logic to retrieve a department by ID from the database
        $sql = "SELECT * FROM departments WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createDepartment($name, $description) {
        // Implement logic to insert a new department into the database
        $sql = "INSERT INTO departments (name, description) VALUES (?, ?)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name, $description]);
    }

    public function updateDepartment($id, $name, $description) {
        // Implement logic to update a department's information in the database
        $sql = "UPDATE departments SET name = ?, description = ? WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name, $description, $id]); }

        public function deleteDepartment($id) {
            // Implement logic to delete a department from the database
            $sql = "DELETE FROM departments WHERE id = ?";
    
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        }
    }
    ?>