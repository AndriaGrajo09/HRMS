<?php
// Include your database connection code here
// Example: require_once 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $employeeName = $_POST["employeeName"];
    $resignationDate = $_POST["resignationDate"];
    $reason = $_POST["reason"];

    // Insert resignation request data into the database
    // Example database insertion (you should adapt this to your database structure)
    /*$sql = "INSERT INTO resignation_requests (employee_name, resignation_date, reason) 
            VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$employeeName, $resignationDate, $reason]);
    */

    // You can also perform other actions or notifications as needed
    // For example, notifying HR or updating the employee's status in the system.

    // Redirect to a thank-you or confirmation page
    header("Location: resignation_confirmation.php");
    exit();
} else {
    // Redirect to the resignation request form if accessed directly
    header("Location: Resignation.php");
    exit();
}
?>