<?php
// Establish a database connection
require_once 'database.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form (use $_POST for other form fields)
$employee_name = $_POST["employee_name"];

// File upload handling (use $_FILES for file uploads)
if (isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] === UPLOAD_ERR_OK) {
    $attachment = $_FILES["attachment"]["name"];
    
    // Specify the directory where you want to save attachments
    $uploadDir = "uploads/";

    // Create the target file path
    $targetFile = $uploadDir . basename($attachment);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFile)) {
        // File upload successful

        // Insert the data into the database
        $sql = "INSERT INTO saln_submit (employee_name, attachment) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ss", $employee_name, $attachment);

        if ($stmt->execute()) {
            echo "SALN file submitted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
// Close the statement
$stmt->close();
} else {
    // File upload failed
    echo "Error uploading file.";
}
} else {
// No file was uploaded or file upload error
echo "No file uploaded or file upload error.";
}

// Close the database connection
$conn->close();
?>