<?php
// Include your database connection code here
// Example: require_once 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $employeeName = $_POST["employeeName"];
    $currentPosition = $_POST["currentPosition"];
    $newPosition = $_POST["newPosition"];
    $promotionReason = $_POST["promotionReason"];

    // Check if a file was uploaded
    if (isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] === UPLOAD_ERR_OK) {
        $fileTmpName = $_FILES["attachment"]["tmp_name"];
        $fileName = $_FILES["attachment"]["name"];

        // Specify the directory where you want to save the uploaded file
        $uploadDirectory = "uploads/";

        // Create the directory if it doesn't exist
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);}

            // Generate a unique filename to avoid overwriting existing files
            $uniqueFileName = uniqid() . "_" . $fileName;
    
            // Move the uploaded file to the destination directory
            $destination = $uploadDirectory . $uniqueFileName;
            if (move_uploaded_file($fileTmpName, $destination)) {
                // File upload successful
                echo "File uploaded successfully. Promotion request submitted.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            // No file uploaded
            echo "Promotion request submitted (without attachment).";
        }
    
        // Insert promotion request data into the database
        // Example database insertion (you should adapt this to your database structure)
        /*$sql = "INSERT INTO promotion_requests (employee_name, current_position, new_position, promotion_reason, attachment) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$employeeName, $currentPosition, $newPosition, $promotionReason, $uniqueFileName]);
    */
} else {
    // Redirect to the promotion request form if accessed directly
    header("Location: Promotion.php");
    exit();
}
?>