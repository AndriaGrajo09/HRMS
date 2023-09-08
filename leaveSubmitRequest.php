<!DOCTYPE html>
<html>
<head>
    <title>Submit Leave Request</title>
</head>
<body>
    <h1>Submit Leave Request</h1>
    <a href="index.php">Back to Home</a>
    <form method="post" action="index.php?controller=LeaveController&action=submit">
        <!-- Employee selection dropdown -->
        <label for="employee_id">Select Employee:</label>
        <select id="employee_id" name="employee_id">
            <?php foreach ($employees as $employee) { ?>
                <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?></option>
            <?php } ?>
        </select><br><br>
        
        <!-- Leave type selection -->
        <label for="leave_type">Leave Type:</label>
        <select id="leave_type" name="leave_type">
            <?php foreach ($leaveTypes as $type) { ?>
                <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
            <?php } ?>
        </select><br><br>
        
        <!-- Start and end date inputs -->
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>
        
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>
        
        <input type="submit" name="submit" value="Submit Leave Request">
    </form>
</body>
</html>