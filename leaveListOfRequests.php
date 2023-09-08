<!DOCTYPE html>
<html>
<head>
    <title>List of Leave Requests</title>
</head>
<body>
    <h1>List of Leave Requests</h1>
    <a href="index.php">Back to Home</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th><th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leaveRequests as $request) { ?>
                <tr>
                    <td><?php echo $request['id']; ?></td>
                    <td><?php echo $request['employee']; ?></td>
                    <td><?php echo $request['leave_type']; ?></td>
                    <td><?php echo $request['start_date']; ?></td>
                    <td><?php echo $request['end_date']; ?></td>
                    <td><?php echo $request['status']; ?></td>
                    <td>
                        <?php if ($request['status'] === 'Pending') { ?>
                            <a href="index.php?controller=LeaveController&action=approve&id=<?php echo $request['id']; ?>">Approve</a> | <a href="index.php?controller=LeaveController&action=reject&id=<?php echo $request['id']; ?>">Reject</a>
                        <?php } else { ?>
                            N/A
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>