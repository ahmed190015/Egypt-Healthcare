<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: sign-in-copy.html");
    exit;
}

// Connect to the database
include("connect.php");
$sql = "SELECT * FROM doctor WHERE doctor_id = :doctor_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':doctor_id', $_SESSION['id']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Store the retrieved data in variables
$name = $user['name'];
$national_id = $user['national_id'];
$speciality = $user['specialize'];
$location = $user['address'];
$phone = $user['phone'];
$email = $user['e_mail'];
$gender = $user['gender'];
$imagedoc = $user['image']; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['details'])) {
    $sessionid = $_SESSION['id'];

    // Get the doctor details from the form
    $doctorFullName = $_POST['DoctorFullName'];
    $speciality = $_POST['speciality'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $location = $_POST['Location'];

    // Check if an image file was uploaded
    if (isset($_FILES["det-img"]) && $_FILES["det-img"]["error"] === UPLOAD_ERR_OK) {
        $filename = uniqid() . "_" . $_FILES["det-img"]["name"]; // Generate a unique filename
        $tempname = $_FILES["det-img"]["tmp_name"];
        $folder = "./uploads/".$filename;

        // Check if the uploaded file is an image
        $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "<h3>File extension not allowed. Only JPG, JPEG, PNG, and GIF files are allowed.</h3>";
            return;
        }

        // Move the uploaded image to the desired folder
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>Image uploaded successfully!</h3>";
        } else {
            echo "<h3>Failed to upload image!</h3>";
        }
    } else {
        $filename = null; // No image uploaded
    }

    // Update the doctor details in the database
    $sql = 'UPDATE doctor SET name = :name, specialize = :speciality, address = :address, phone = :phone_number, location = :location, image = :filename WHERE doctor_id = :doctor_id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $doctorFullName);
    $stmt->bindParam(':speciality', $speciality);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone_number', $phoneNumber);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':filename', $filename);
    $stmt->bindParam(':doctor_id', $sessionid);
    $stmt->execute();

    // Check if the doctor details were updated successfully
    if ($stmt->rowCount() > 0) {
        // The doctor details were updated successfully
        header('Location: doctor-details.html');
        echo 'The doctor details were updated successfully.';
    } else {
        // The doctor details were not updated successfully
        echo 'The doctor details were not updated successfully.';
    }
}
// Check if the form has been submitted
 else if (isset($_POST['calendar'])) {
// Get the form data
$days = array("Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
$sTime = array();
$eTime = array();
for ($i = 0; $i < 7; $i++) {
  $sTime[$i] = $_POST['sTime' . $i];
  $eTime[$i] = $_POST['eTime' . $i];
} 

// Update or insert the form data into the database
for ($i = 0; $i < 7; $i++) {
  // Check if the start time and end time are empty
  if (empty($sTime[$i]) || empty($eTime[$i])) {
    continue; // Skip this day if start time or end time is empty
  }
  
  $sql = "SELECT * FROM calendar WHERE date = :day AND doctor_id = :doctor_id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':day', $days[$i]);
  $stmt->bindParam(':doctor_id', $sessionid);
  $stmt->execute();
  $existingCalendar = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if ($existingCalendar) {
    // Update the existing calendar
    $updateSql = "UPDATE calendar SET start_time = :start_time, end_time = :end_time WHERE id = :calendar_id";
    $updateStmt = $db->prepare($updateSql);
    $updateStmt->bindParam(':start_time', $sTime[$i]);
    $updateStmt->bindParam(':end_time', $eTime[$i]);
    $updateStmt->bindParam(':calendar_id', $existingCalendar['id']);
    $updateStmt->execute();
       header('Location:doctor-details.html');

  } else {
    // Insert a new calendar entry
    $insertSql = "INSERT INTO calendar (date, start_time, end_time, doctor_id) VALUES (:day, :start_time, :end_time, :doctor_id)";
    $insertStmt = $db->prepare($insertSql);
    $insertStmt->bindParam(':day', $days[$i]);
    $insertStmt->bindParam(':start_time', $sTime[$i]);
    $insertStmt->bindParam(':end_time', $eTime[$i]);
    $insertStmt->bindParam(':doctor_id', $_SESSION['id']);
    $insertStmt->execute();
       header('Location:doctor-details.html');

  }
}

}
}

?>
