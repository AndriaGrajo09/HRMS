<!DOCTYPE html>
<html>
<head>
    <title>Leave Details</title>
</head>
<body>
    <h1>Leave Details</h1>
    <a href="index.php">Back to Home</a>
    <h2>Leave Request ID: <?php echo $leaveRequest['id']; ?></h2>
    <p>Employee: <?php echo $employee['name']; ?></p>
    <p>Leave Type: <?php echo $leaveRequest['leave_type']; ?></p>
    <p>Start Date: <?php echo $leaveRequest['start_date']; ?></p>
    <p>End Date: <?php echo $leaveRequest['end_date']; ?></p>
    <p>Status: <?php echo $leaveRequest['status']; ?></p>
    <p>Remarks: <?php echo $leaveRequest['remarks']; ?></p>
</body>
</html>