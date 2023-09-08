<?php
class LeaveController {
    private $leaveModel;

    public function __construct($leaveModel) {
        $this->leaveModel = $leaveModel;
    }

    public function index() {
        // Retrieve a list of all leave requests
        $leaveRequests = $this->leaveModel->getAllLeaveRequests();
        include 'views/leave/list.php';
    }

    public function submit() { public function index() {
        // Retrieve a list of all leave requests
        $leaveRequests = $this->leaveModel->getAllLeaveRequests();
        include 'views/leave/list.php';
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to submit a leave request
            $employeeId = $_POST['employee_id'];
            $leaveType = $_POST['leave_type'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $this->leaveModel->submitLeaveRequest($employeeId, $leaveType, $startDate, $endDate);
            header('Location: index.php?controller=LeaveController&action=index');
        } else {
            // Display the form to submit a leave request include 'views/leave/submit.php';
        }
    }

    public function approve($id) {
        // Implement logic to approve a leave request
        $this->leaveModel->approveLeaveRequest($id);
        header('Location: index.php?controller=LeaveController&action=index');
    }

    public function reject($id) {
        // Implement logic to reject a leave request
        $this->leaveModel->rejectLeaveRequest($id);
        header('Location: index.php?controller=LeaveController&action=index');
    }
}
?>