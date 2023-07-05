<?php

include("connect.php");
session_start();
// Validate the user input
$name = $_POST['FullName'];
$national_id = $_POST['ID'];
$email = $_POST['emailAddress'];
$phone_number = $_POST['phoneNumber'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$gender = $_POST['gender'];

// Check if the email address is already taken
$stmt = $db->prepare('SELECT * FROM doctor WHERE e_mail = ?');
$stmt->execute(array($email));

if ($stmt->rowCount() > 0) {
    echo 'The email address is already taken.';
    exit;
}

// Check if the password is strong enough
if (strlen($password) < 8) {
    echo 'The password must be at least 8 characters long.';
    exit;
}
if ($password!=$confirm_password){
    echo ("passwords doesnt match");
    exit;
}

// Insert the user information into the database
$stmt = $db->prepare('INSERT INTO doctor (name, national_id, e_mail, phone, password, gender) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->execute(array($name, $national_id, $email, $phone_number, $password, $gender));

$stmt = $db->prepare('SELECT doctor_id FROM doctor WHERE e_mail = ?');
$stmt->execute(array($email));
$id=$email['doctor_id'];
$_SESSION['id'] = $id;
// Redirect the user to the home page
header('Location: your-reports.html');



?>
