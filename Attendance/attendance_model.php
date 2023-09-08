<?php
class Attendance_model {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function recordAttendanceFromBiometric($employeeId, $attendanceDate, $startTime, $endTime) {
        // Implement logic to record employee attendance received from the biometric system
        // You'll need to parse and insert the data into the 'attendance' table with appropriate columns
        // This method assumes you have a data import mechanism from the biometric system

        // Example: Insert attendance data into the database
        $sql = "INSERT INTO attendance (employee_id, attendance_date, start_time, end_time)
        VALUES (?, ?, ?, ?)";

$stmt = $this->db->prepare($sql);
$stmt->execute([$employeeId, $attendanceDate, $startTime, $endTime]);
}

public function calculateWorkingHours($employeeId, $attendanceDate) {
// Implement logic to calculate working hours for a specific employee and date

//Calculate working hours based on start and end times
$sql = "SELECT SUM(TIMESTAMPDIFF(HOUR, start_time, end_time)) AS total_hours
FROM attendance
WHERE employee_id = ? AND attendance_date = ?";

$stmt = $this->db->prepare($sql);
$stmt->execute([$employeeId, $attendanceDate]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

return $result['total_hours'];
}

public function generateAttendanceReport($employeeId, $startDate, $endDate) {
// generate an attendance report for a specific employee
// fetch attendance data within the specified date range

// Retrieve attendance records for the specified employee and date range
$sql = "SELECT * FROM attendance
WHERE employee_id = ? AND attendance_date BETWEEN ? AND ?";

$stmt = $this->db->prepare($sql);
$stmt->execute([$employeeId, $startDate, $endDate]);
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>