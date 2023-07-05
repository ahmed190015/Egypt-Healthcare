<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: sign-in-copy.html");
    exit();
}

// Include the necessary files and establish a database connection
include("connect.php");

$patient_id = $_SESSION['id'];

try {
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL query to retrieve user data
    $sql = "SELECT * FROM patient WHERE patient_id = :patient_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':patient_id', $patient_id);
    $stmt->execute();

    // Fetch the user data from the database
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Store the retrieved data in variables
    $name = $user['name'];
    $national_id = $user['national_id'];
    $mail = $user['e_mail'];
    $bloodType = $user['bloodtype'];
    $phone = $user['phone'];
    $email = $user['e_mail'];
    $gender = $user['gender'];
    $patimage = $user['image'];
    
    // Close the database connection
    $db = null;
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}


?>