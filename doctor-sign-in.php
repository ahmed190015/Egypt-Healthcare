<?php
session_start();
// Connect to the database
include("connect.php");
// Get the username and password from the POST request
$username = $_POST['email'];
$password = $_POST['password'];
// Check if the username and password are valid
$sql = "SELECT * FROM doctor WHERE e_mail = :username AND password = :password";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

// If the username and password are valid, log the user in
if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $user['doctor_id']; // Fetch the national ID from the fetched user data
    header("Location: doc-index.html");
}
 else {
    // If the username and password are not valid, show an error message
    echo '<p>Invalid username or password</p>';
}

?>
