<?php
session_start();
if (!isset($_SESSION['id'])){
header('location:adminLogin.html');
exit();
}
include("../connect.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $profile_picture = $_FILES['img']['name'];
    
    // Perform additional validations and processing if required
    
    // Move uploaded file to a target directory
    $target_dir = 'upload/';
    $unique_name = uniqid('', true);
    $target_file = $target_dir . $unique_name . '.' . strtolower(pathinfo($profile_picture, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
    
    // Insert new admin data into the database
    $sql = "INSERT INTO admin (username, password, profile) VALUES ('$username', '$password', '$target_file')";
    $db->query($sql);
    header('location:admin.html');
    
    
}
?>