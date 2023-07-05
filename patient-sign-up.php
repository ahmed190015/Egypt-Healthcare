<?php
session_start();
// Connect to the database
include("connect.php");
// Get the name, email, password, blood type, national ID, and phone number from the POST request
$name = $_POST['FullName'];
$email = $_POST['emailAddress'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];
$blood_type = $_POST['blood_type'];
$national_id = $_POST['ID'];
$phone_number = $_POST['phoneNumber'];
$gender = $_POST['gender'];

// Check if the name, email, password, blood type, national ID, and phone number are not empty
if (empty($name) || empty($email) || empty($password) || empty($blood_type) || empty($national_id) || empty($phone_number || empty($gender))) {
    // If they are, show an error message
    echo '<p>Please fill out all of the fields.</p>';
} elseif ($password != $confirm_password) {
    // If the passwords do not match, show an error message
    echo '<p>Passwords do not match.</p>';
} else {
    // Check if the email is already used
    $checkEmailSql = "SELECT * FROM patient WHERE e_mail = :email";
    $checkEmailStmt = $db->prepare($checkEmailSql);
    $checkEmailStmt->bindParam(':email', $email);
    $checkEmailStmt->execute();

    if ($checkEmailStmt->rowCount() > 0) {
        // If the email is already used, show an error message
        echo '<p>Email address is already in use. Please choose a different email.</p>';
    } else {
        // If the email is not used, insert the data into the database
        $sql = "INSERT INTO patient (name, e_mail, password, bloodtype, national_id, phone, gender) VALUES (:name, :email, :password, :blood_type, :national_id, :phone_number, :gender)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':blood_type', $blood_type);
        $stmt->bindParam(':national_id', $national_id);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':gender', $gender);

        $stmt->execute();

        // Show a success message
        echo '<p>Your account has been created successfully. You can now log in.</p>';
        header('location:patient-sign-in.html');
    }
}
?>
