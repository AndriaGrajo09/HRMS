<?php
class DesignationModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllDesignations() {
        // Implement logic to retrieve a list of all designations from the database
        $sql = "SELECT * FROM designations";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDesignationById($id) {
        // Implement logic to retrieve a designation by ID from the database
        $sql = "SELECT * FROM designations WHERE id = ?";$stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createDesignation($name, $description) {
        // Implement logic to insert a new designation into the database
        $sql = "INSERT INTO designations (name, description) VALUES (?, ?)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name, $description]);
    }

    public function updateDesignation($id, $name, $description) {
        // Implement logic to update a designation's information in the database
        $sql = "UPDATE designations SET name = ?, description = ? WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name, $description, $id]); }

        public function deleteDesignation($id) {
            // Implement logic to delete a designation from the database
            $sql = "DELETE FROM designations WHERE id = ?";
    
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        }
    }
    ?>