<?php
require_once 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $leaveType = $_POST["leaveType"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $leaveReason = $_POST["leaveReason"];

    // Check if a file was uploaded
    if (isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] === UPLOAD_ERR_OK) {
        $fileTmpName = $_FILES["attachment"]["tmp_name"];
        $fileName = $_FILES["attachment"]["name"];

        // Specify the directory where you want to save the uploaded file
        $uploadDirectory = "uploads/";

        // Create the directory if it doesn't exist
         if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Generate a unique filename to avoid overwriting existing files
        $uniqueFileName = uniqid() . "_" . $fileName;

        // Move the uploaded file to the destination directory
        $destination = $uploadDirectory . $uniqueFileName;
        if (move_uploaded_file($fileTmpName, $destination)) {
            // File upload successful
            echo "File uploaded successfully. Leave request submitted.";
            session_start();
            $_SESSION["user"] = "yes";
            header("Location: employeeDashboard.php");
            die();
        } else {
            echo "Error uploading file.";
        }
    } else { // No file uploaded
        echo "Leave request submitted (without attachment).";
    }

    // Insert leave request data into the database
    // Example database insertion (you should adapt this to your database structure)
    
    $sql = "INSERT INTO leave_requests (leave_type, start_date, end_date, leave_reason, attachment) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$leaveType, $startDate, $endDate, $leaveReason, $uniqueFileName]);
    
} else {
    // Redirect to the leave request form if accessed directly
    header("Location: Leave.php");
    exit();
}
?>