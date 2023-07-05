<?php
session_start();
if (!isset($_SESSION['id'])){
header('location:sign-in-copy.html');
exit();
}

include("connect.php");

  $_SESSION['doctorID'] = $_GET['id'];

  // Retrieve the doctor details based on the doctor ID
  $query = "SELECT * FROM doctor WHERE doctor_id = :doctorID";
  $stmt = $db->prepare($query);
  $stmt->bindValue(':doctorID', $_SESSION['doctorID']);
  $stmt->execute();

  // Check if the doctor record exists
  if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      // Store the doctor details in session variables or use them as required
      $_SESSION['docimage'] = $row['image'];
      $_SESSION['docname'] = $row['name'];
      $_SESSION['speciality'] = $row['specialize'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['location'] = $row['location'];
      //$_SESSION['workingHours'] = $row['workingHours'];
      //$_SESSION['daysOff'] = $row['daysOff'];
      // Add more session variables as needed
  }
if (isset($_POST['submit'])) {

    // Get the form data
    $userName = $_POST['userName'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['Time'];
  
    // Validate the form data
    if (empty($userName) || empty($phone) || empty($date) || empty($time)) {
      echo "Please fill in all required fields.";
      exit;
    }
    
    // Insert the form data into the database
    $sql = "INSERT INTO appointment (doctor_id, patient_id, name, phone, date, time) VALUES (:doctor_id, :patient_id, :userName, :phone, :date, :time)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':doctor_id', $_SESSION['doctorID']);
    $stmt->bindParam(':patient_id', $_SESSION['id']);
    $stmt->bindParam(':userName', $userName);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    $stmt->execute();

  
    // Redirect the user to a confirmation page
    header('Location: appointments.html');
  }
  

?>