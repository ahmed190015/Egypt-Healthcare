<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: sign-in-copy.html");
    exit();
}

// Connect to the database
include("connect.php");

// Get the name, email, message, and file from the POST request
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if (empty($name) || empty($email) || empty($message)) {
    // If they are, show an error message
    echo '<p>Please fill out all of the fields.</p>';
} else {
    // Check if a file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file'];

        // Get the file name and generate a unique name
        $originalFilename = $file['name'];
        $fileExtension = pathinfo($originalFilename, PATHINFO_EXTENSION);
        $allowedExtensions = array('pdf', 'txt','docx');
        
        // Check if the file extension is allowed
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo 'File extension not allowed.';
            return;
        }
        
        $uniqueFilename = uniqid() . '.' . $fileExtension;
        $destination = 'uploads/' . $uniqueFilename;

        // Check if the destination folder exists, if not, create it
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            // File was moved successfully
            echo 'File uploaded and moved successfully.';
        } else {
            // Error moving the file
            echo 'Failed to move the uploaded file.';
        }
    } else {
        $uniqueFilename = null; // No file uploaded
    }

    // Insert the data into the database
    $sql = "INSERT INTO contact (patient_id, name, e_mail, message, file) VALUES (:patient_id, :name, :email, :message, :file)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':patient_id', $_SESSION['id']);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':file', $uniqueFilename);
    $stmt->execute();

    // Show a success message
    echo '<p>Your message has been sent successfully. We will get back to you as soon as possible.</p>';
}

// Close the connection to the database
$db = null;
?>
