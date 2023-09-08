<?php
class LeaveModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function submitLeaveRequest($employeeId, $leaveType, $startDate, $endDate) {
        // Implement logic to insert a leave request into the database
        // You'll need to create a 'leave_requests' table with appropriate columns
        $sql = "INSERT INTO leave_requests (employee_id, leave_type, start_date, end_date, status, remarks)
                VALUES (?, ?, ?, ?, 'Pending', '')";$stmt = $this->db->prepare($sql);
        $stmt->execute([$employeeId, $leaveType, $startDate, $endDate]);
    }

    public function getAllLeaveRequests() {
        // Implement logic to retrieve all leave requests from the database
        $sql = "SELECT * FROM leave_requests";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function approveLeaveRequest($id) {
        // Implement logic to approve a leave request
        $sql = "UPDATE leave_requests SET status = 'Approved' WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    public function rejectLeaveRequest($id) { // Implement logic to reject a leave request
        $sql = "UPDATE leave_requests SET status = 'Rejected' WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    public function getLeaveRequestById($id) {
        // Implement logic to retrieve a leave request by ID from the database
        $sql = "SELECT * FROM leave_requests WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLeaveTypes() {// Implement logic to retrieve available leave types
        // You may store leave types in a separate table or define them as constants
        // Here, we assume predefined leave types as an example
        return ['Sick Leave', 'Vacation', 'Maternity Leave', 'Paternity Leave'];
    }
}
?>