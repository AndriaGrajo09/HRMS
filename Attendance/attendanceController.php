<?php
class AttendanceController {
    private $attendanceModel;

    public function __construct($attendanceModel) {
        $this->attendanceModel = $attendanceModel;
    }

    public function index() {
        // Retrieve a list of all attendance records
        $attendanceRecords = $this->attendanceModel->getAllAttendance();
        include 'views/attendance/list.php';
    }

    public function calculateHours($employeeId) {
        // Calculate working hours for a specific employee
        $workingHours = $this->attendanceModel->calculateWorkingHours($employeeId);
        include 'views/attendance/hours.php';
    }
}
?>