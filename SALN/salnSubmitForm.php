<!DOCTYPE html>
<html>
<head>
    <title>Submit SALN Data</title>
</head>
<body>
    <h1>Submit SALN Data</h1>
    <a href="index.php">Back to Home</a>
    <form method="post" action="index.php?controller=SalnController&action=submit">
        <!-- Assets input -->
        <label for="assets">Assets:</label>
        <input type="text" id="assets" name="assets" required><br><br>
        
        <!-- Liabilities input -->
        <label for="liabilities">Liabilities:</label>
        <input type="text" id="liabilities" name="liabilities" required><br><br>
        
        <input type="submit" name="submit" value="Submit SALN Data">
    </form>
</body>
</html>