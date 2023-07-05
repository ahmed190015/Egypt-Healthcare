<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location:sign-in-copy.html ");
}
// Connect to the database
include("connect.php");

$sql = "SELECT * FROM hospital WHERE hospital_id = :hospital_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':hospital_id', $_SESSION['id']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Store the retrieved data in variables
$name = $user['name'];
$manager_name = $user['manager_full_name'];
$national_id = $user['national_id'];
$specialities = $user['specialities'];
$phone = $user['phone'];
$email = $user['e_mail'];
$address = $user['address'];
$hosimage = $user['image']; 

$sql = "SELECT * FROM calendar WHERE hospital_id = :hospital_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':hospital_id', $_SESSION['id']);
$stmt->execute();
$calender = $stmt->fetchAll(PDO::FETCH_ASSOC);



if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['details'])){
        $doctor_full_name = $_POST['ManagerFullName'];
        $phone_number = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $location = $_POST['Location'];
        $medical_specialities = $_POST['medical_specialities'];
        
        // Check if the user input is valid
        if (empty($doctor_full_name)) {
            echo 'Please enter the doctor\'s full name.';
            exit;
        }
        
        if (empty($phone_number)) {
            echo 'Please enter the phone number.';
            exit;
        }
        
        if (empty($address)) {
            echo 'Please enter the address.';
            exit;
        }
        
        if (empty($location)) {
            echo 'Please enter the location URL.';
            exit;
        }
        
        // Check if a file was uploaded
        if (isset($_FILES['det-img']) && $_FILES['det-img']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['det-img'];

            // Generate a unique filename
            $filename = uniqid() . "_" . $file['name'];

            // Check file extension
            $allowedExtensions = ['jpeg', 'jpg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (!in_array($fileExtension, $allowedExtensions)) {
                echo 'Invalid file type. Only JPEG, JPG, PNG, and GIF images are allowed.';
                exit;
            }

            // Get the file destination path
            $destination = 'uploads/' . $filename;

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
                exit;
            }
        } else {
            $filename = null; // No file uploaded
        }

        $stmt = $db->prepare('UPDATE hospital SET manager_full_name = ?, phone = ?, address = ?, location = ?, specialities = ?, image = ? WHERE hospital_id = ?');
        $stmt->execute(array($doctor_full_name, $phone_number, $address, $location, $medical_specialities, $filename, $_SESSION['id']));
        // Redirect the user to the home page
        header('Location:hospital-details.html');
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
            
            $sql = "SELECT * FROM calendar WHERE date = :day AND hospital_id = :hospital_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':day', $days[$i]);
            $stmt->bindParam(':hospital_id', $sessionid);
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
            } else {
                // Insert a new calendar entry
                $insertSql = "INSERT INTO calendar (date, start_time, end_time, hospital_id) VALUES (:day, :start_time, :end_time, :hospital_id)";
                $insertStmt = $db->prepare($insertSql);
                $insertStmt->bindParam(':day', $days[$i]);
                $insertStmt->bindParam(':start_time', $sTime[$i]);
                $insertStmt->bindParam(':end_time', $eTime[$i]);
                $insertStmt->bindParam(':hospital_id', $sessionid);
                $insertStmt->execute();
            }
        }
        
        // Redirect the user to a confirmation page
        header('Location: hospital-details.html');
    }
}
?>
