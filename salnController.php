<?php
// Include your database connection code here
require_once 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $employeeName = $_POST["employeeName"];
    $salnYear = $_POST["salnYear"];

    // Check if a file was uploaded
    if (isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] === UPLOAD_ERR_OK) {
        $fileTmpName = $_FILES["attachment"]["tmp_name"];
        $fileName = $_FILES["attachment"]["name"];

        // Specify the directory where you want to save the uploaded file
        $uploadDirectory = "saln_uploads/";

        // Create the directory if it doesn't exist
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Generate a unique filename to avoid overwriting existing files
        $uniqueFileName = uniqid() . "_" . $fileName;// Move the uploaded file to the destination directory
        $destination = $uploadDirectory . $uniqueFileName;
        if (move_uploaded_file($fileTmpName, $destination)) {
            // File upload successful
            echo "SALN file uploaded successfully.";
        } else {
            echo "Error uploading SALN file.";
        }
    } else {
        // No file uploaded
        echo "SALN file submission failed. Please upload a valid file.";
    }

    // Insert SALN data into the database
    // Example database insertion (you should adapt this to your database structure)
    
    $sql = "INSERT INTO saln_data (employee_name, saln_year, file_path) 
            VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$employeeName, $salnYear, $uniqueFileName]);
    
} else {
    // Redirect to the SALN submission form if accessed directly
    header("Location: SALN.php");
    exit();
}
?>