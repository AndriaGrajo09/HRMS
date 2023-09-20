<?php
// Establish a database connection
require_once 'database.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form (use $_POST for regular form fields)
$employee_name = $_POST["employee_name"];
$current_designation = $_POST["current_designation"];
$submission_date = $_POST["submission_date"];

// File upload handling (use $_FILES for file uploads)
$uploadDir = "uploads/"; // Specify the directory where you want to save attachments
$uploadedFile = $_FILES["attachment"]["name"];
$targetFile = $uploadDir . basename($uploadedFile);

if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFile)) {
    // File upload successful

    // Insert the data into the database
    $sql = "INSERT INTO promotion_requests (employee_name, current_designation, submission_date, attachment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $employee_name, $current_designation, $submission_date, $targetFile);
    if ($stmt->execute()) {
        echo "Promotion request submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
} else {
    // File upload failed
    echo "Error uploading file.";
}

$conn->close();
?>