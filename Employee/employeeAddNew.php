<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <h1>Add Employee</h1>
    <a href="index.php">Back to Home</a>
    <form method="post" action="index.php?action=add">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="designation">Designation:</label>
        <input type="text" id="designation" name="designation" required><br><br>
        
        <input type="submit" name="submit" value="Add Employee">
    </form>
</body>
</html>