<?php
class SalnModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function submitSalnData($employeeId, $assets, $liabilities) {
        // Check if SALN data already exists for the employee
        $existingData = $this->getSalnDataByEmployeeId($employeeId);

        if ($existingData) {
            // Update existing SALN data
            $sql = "UPDATE saln_data SET assets = ?, liabilities = ? WHERE employee_id = ?";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$assets, $liabilities, $employeeId]);
        } else {
            // Insert new SALN data
            $sql = "INSERT INTO saln_data (employee_id, assets, liabilities) VALUES (?, ?, ?)";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$employeeId, $assets, $liabilities]);
        }
    } 
        
    public function getSalnDataByEmployeeId($employeeId) {
            // Implement logic to retrieve SALN data for a specific employee from the database
            $sql = "SELECT * FROM saln_data WHERE employee_id = ?";
    
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$employeeId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    ?>