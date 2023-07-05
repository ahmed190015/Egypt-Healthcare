<?php
include("connect.php");
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: sign-in-copy.html");
}
$patient_id = $_SESSION['id'];
// Set the PDO error mode to exception.
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get the user data from the database.
$sql = "SELECT * FROM patient WHERE patient_id = :patient_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':patient_id', $patient_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Store the values in variables.
$name = $row["name"];
$image = $row["image"];
$mail = $row["e_mail"];
$gender = $row["gender"];
$blood_type = $row["bloodtype"];
// Check if the query was successful
if ($stmt->rowCount() === 0) {
  die("ERROR: Could not get data.");
}
if (isset($_POST['form1'])) {
  $diseasesText = $_POST['diseases_text'];
  $desfile = $_FILES['desfile'];
  if ($_FILES['desfile']['error'] === UPLOAD_ERR_OK) {
    $tempFilePath = $_FILES['desfile']['tmp_name'];
    $desfileName = uniqid() . '_' . $_FILES['desfile']['name'];
    $fileExtension = pathinfo($desfileName, PATHINFO_EXTENSION);
    $allowedExtensions = ['pdf', 'docx', 'txt'];
    $uploadDir= 'uploads/';
    // Check if the file extension is allowed
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "File extension not allowed.";
        return;
    }

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($tempFilePath, $uploadDir . $desfileName)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
}
  // Save diseases text in a separate table
  $sql = "INSERT INTO diseases (patient_id,name,file) VALUES (?,?,?)";
  $stmt = $db->prepare($sql);
  if ($stmt->execute([$_SESSION['id'],$diseasesText,$desfileName])) {
      echo "Diseases report saved successfully.";
  } else {
      echo "Error: " . $stmt->errorInfo()[2];
  }

  // Handle file upload if selected

}

if (isset($_POST['form2'])) {
  $virusesText = $_POST['viruses_text'];
  $file = $_FILES['virfile'];
    // Handle file upload if selected
    if ($_FILES['virfile']['error'] === UPLOAD_ERR_OK) {
        $tempFilePath = $_FILES['virfile']['tmp_name'];
        $virfileName = uniqid() . '_' . $_FILES['virfile']['name'];
        $fileExtension = pathinfo($virfileName, PATHINFO_EXTENSION);
        $allowedExtensions = ['pdf', 'docx', 'txt'];
        $uploadDir= 'uploads/';
        // Check if the file extension is allowed
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "File extension not allowed.";
            return;
        }
    
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($tempFilePath, $uploadDir . $virfileName)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    }
  // Save diseases text in a separate table
  $sql = "INSERT INTO viruses (patient_id,name,file) VALUES (?,?,?)";
  $stmt = $db->prepare($sql);
  if ($stmt->execute([$_SESSION['id'],$virusesText,$virfileName])) {
      echo "virus report saved successfully.";
  } else {
      echo "Error: " . $stmt->errorInfo()[2];
  }


}
if (isset($_POST['form3'])) {
  $allergiesText = $_POST['allergies_text'];
  $allfile =$_FILES['allfile'];
  if ($_FILES['allfile']['error'] === UPLOAD_ERR_OK) {
    $tempFilePath = $_FILES['allfile']['tmp_name'];
    $allfileName = uniqid() . '_' . $_FILES['allfile']['name'];
    $fileExtension = pathinfo($allfileName, PATHINFO_EXTENSION);
    $allowedExtensions = ['pdf', 'docx', 'txt'];
    $uploadDir= 'uploads/';
    // Check if the file extension is allowed
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "File extension not allowed.";
        return;
    }

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($tempFilePath, $uploadDir . $allfileName)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
}
  // Save diseases text in a separate table
  $sql = "INSERT INTO allergies (patient_id,name,file) VALUES (?,?,?)";
  $stmt = $db->prepare($sql);
  if ($stmt->execute([$_SESSION['id'],$allergiesText,$allfileName])) {
      echo "allergies report saved successfully.";
  } else {
      echo "Error: " . $stmt->errorInfo()[2];
  }

  // Handle file upload if selected

}
if (isset($_POST['form4'])) {
  $fractionsText = $_POST['fractions_text'];
  $fracfile = $_FILES['fracfile'];
  if ($_FILES['fracfile']['error'] === UPLOAD_ERR_OK) {
    $tempFilePath = $_FILES['fracfile']['tmp_name'];
    $fracfileName = uniqid() . '_' . $_FILES['fracfile']['name'];
    $fileExtension = pathinfo($fracfileName, PATHINFO_EXTENSION);
    $allowedExtensions = ['pdf', 'docx', 'txt'];
    $uploadDir= 'uploads/';
    // Check if the file extension is allowed
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "File extension not allowed.";
        return;
    }

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($tempFilePath, $uploadDir . $fracfileName)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
}
  // Save diseases text in a separate table
  $sql = "INSERT INTO fractions (patient_id,name, file) VALUES (?,?, ?)";
  $stmt = $db->prepare($sql);
  if ($stmt->execute([$_SESSION['id'],$fractionsText, $fracfileName])) {
      echo "Fractions report saved successfully.";
  } else {
      echo "Error: " . $stmt->errorInfo()[2];
  }
  
}


?>
