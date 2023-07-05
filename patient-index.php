<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:sign-in-copy.html');
}
include('connect.php');
$query = "SELECT * FROM posts";
$stmt = $db->query($query);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Step 3: Generate HTML markup for the posts
$postMarkup = '';
foreach ($posts as $post) {
    $postMarkup .= '<div class="col-md-12 text-post p-3 mb-1">';
    $postMarkup .= '<div class="container">';
    $postMarkup .= '<div class="row">';
    // Add post content dynamically
    $postMarkup .= '<div class="col-12 txt-post">';
    $postMarkup .= '<span>' . $post['text'] . '</span>';
    $postMarkup .= '</div>';
    $postMarkup .= '</div>';
    $postMarkup .= '</div>';
    $postMarkup .= '</div>';
}

// Step 4: Replace the relevant section in the HTML with the generated post content
$html = file_get_contents('patient-index.html');
$html = str_replace('<div class="container col-md-9 col-sm-12 index-post-container col-xs-12">', '<div class="container col-md-9 col-sm-12 index-post-container col-xs-12">' . $postMarkup, $html);

// Step 5: Output the modified HTML
?>