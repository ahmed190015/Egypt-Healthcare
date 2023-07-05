<?php
include("connect.php");
session_start();

// Get the data from the form
$name = $_POST['FullName'];
$national_id = $_POST['ID'];
$email = $_POST['emailAddress'];
$phone_number = $_POST['phoneNumber'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$phone_doctor = $_POST['phone_doctor'];
$users='';
// Check if the email exists in the database
$sql = "SELECT * FROM hospital WHERE e_mail = ?";
$stmt = $db->prepare($sql);
$stmt->execute(array($users));
$user = $stmt->fetch();

// If the email does not exist, insert the new user into the database
if ($user === false) {
    $sql = "INSERT INTO hospital (e_mail ,name, national_id,  phone, password, phone_doctor)
    VALUES (:email, :name, :national_id, :phone_number, :password, :phone_doctor);";
   $stmt = $db->prepare($sql);
   $stmt->bindParam(':name', $name);
   $stmt->bindParam(':national_id', $national_id);
   $stmt->bindParam(':email', $email);
   $stmt->bindParam(':phone_number', $phone_number);
   $stmt->bindParam(':password', $password);
   $stmt->bindParam(':phone_doctor', $phone_doctor); 
   $stmt->execute();
    header('location:hospital-sign-in.html');
} else {
    header('Location: hospital-sign-in.html?error=email-already-exists');
    exit;
}

?>
