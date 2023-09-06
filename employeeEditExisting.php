<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <a href="index.php">Back to Home</a>
    <form method="post" action="index.php?action=edit&id=<?php echo $employee['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $employee['name']; ?>" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $employee['email']; ?>" required><br><br>
        
        <label for="designation">Designation:</label>
        <input type="text" id="designation" name="designation" value="<?php echo $employee['designation']; ?>" required><br><br><input type="submit" name="submit" value="Update Employee">
    </form>
</body>
</html>