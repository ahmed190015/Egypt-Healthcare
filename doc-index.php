<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: sign-in-copy.html");
    exit;
}

// Connect to the database
include("connect.php");
if (isset($_POST['post'])) {

    // Get the form data
    $post_text = $_POST['post-textarea'];

    
    // Insert the form data into the database
    $sql = "INSERT INTO posts (doctor_id, text) VALUES (:doctor_id, :text)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':doctor_id', $_SESSION['id']);
    $stmt->bindParam(':text', $post_text);
    $stmt->execute();

  
    // Redirect the user to a confirmation page
    header('Location: doc-index.html');
  }

  if (isset($_POST['poll'])) {
    // Get the form data
    $poll_text = $_POST['polltext'];
    $poll_option1 = $_POST['input1'];
    $poll_option2 = $_POST['input2'];

    
    // Insert the form data into the database
    $sql = "INSERT INTO poll (doctor_id, polltext, option1, option2) VALUES (:doctor_id, :text, :option1, :option2)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':doctor_id', $_SESSION['id']);
    $stmt->bindParam(':text', $poll_text);
    $stmt->bindParam(':option1', $poll_option1);
    $stmt->bindParam(':option2', $poll_option2);
    $stmt->execute();

  
    // Redirect the user to a confirmation page
    header('Location: doc-index.html');
  }
  if (isset($_POST['media'])) {
    
  
      $text = $_POST['video-image-textarea'];
      $image = $_FILES['image'];
      $video = $_FILES['video'];    
    $imageFileName = '';
    $videoFileName = '';
    
      if (!empty($image['tmp_name'])) {
          $imageFileName = generateUniqueFileName($image['name']);
      }
      
      if (!empty($video['tmp_name'])) {
          $videoFileName = generateUniqueFileName($video['name']);
      }
      
      // Move uploaded files to the uploads folder (if provided)
      $uploadsDirectory = 'uploads/';
      
      if (!empty($image['tmp_name'])) {
          move_uploaded_file($image['tmp_name'], $uploadsDirectory . $imageFileName);
      }
      
      if (!empty($video['tmp_name'])) {
          move_uploaded_file($video['tmp_name'], $uploadsDirectory . $videoFileName);
      }
  
        // Insert the form data into the database table
        if (!empty($imageFileName) || !empty($videoFileName)) {
          // Insert the form data into the database table
          $stmt = $db->prepare("INSERT INTO media (textt, image, vedio) VALUES (:text, :image, :video)");
          $stmt->bindParam(':text', $text);
          $stmt->bindParam(':image', $imageFileName);
          $stmt->bindParam(':video', $videoFileName);
          $stmt->execute();
          
          // Redirect to a success page
          header("Location: doc-index.html");
          exit();
      } else {
          // Handle the case where neither the image nor the video file is uploaded
          echo "Please upload either an image or a video file.";
      }
  }
       
  


// Function to generate a unique file name
function generateUniqueFileName($originalFileName) {
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $uniqueFileName = uniqid() . '.' . $extension;
    return $uniqueFileName;
}


  
?>