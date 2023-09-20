<?php
// Establish a database connection
require_once 'database.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form (use $_POST for other form fields)
$employee_name = $_POST["employee_name"];
$resignation_date = $_POST["resignation_date"];
$reason = $_POST["reason"];
$submission_date = $_POST["submission_date"];

// File upload handling (use $_FILES for file uploads)
if (isset($_FILES["attachment"])) {
    $uploadDir = "uploads/"; // Specify the directory where you want to save attachments
    $uploadedFile = $_FILES["attachment"]["name"];$targetFile = $uploadDir . basename($uploadedFile);

    // Check if a file was uploaded and if there are no upload errors
    if ($_FILES["attachment"]["error"] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFile)) {
            // File upload successful

            // Insert the data into the database
            $sql = "INSERT INTO resignation_requests (employee_name, resignation_date, reason, submission_date, attachment) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("sssss", $employee_name, $resignation_date, $reason, $submission_date, $targetFile);

            if ($stmt->execute()) {echo "Resignation request submitted successfully.";
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
        // Handle specific file upload errors here if needed
        echo "File upload error: " . $_FILES["attachment"]["error"];
    }
} else {
    // No file input in the form
    echo "No file input in the form.";
}

// Close the database connection
$conn->close();
?>