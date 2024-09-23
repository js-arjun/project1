<?php
require_once('check_login.php'); 
include('connect.php');

if (isset($_POST['title']) && isset($_POST['review']) && isset($_POST['rating'])) {
    $title = $_POST['title'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $user_id = $myemail;

    $query = "INSERT INTO reviews (user_id, title, review, rating) VALUES ('$user_id', '$title', '$review', '$rating')";
 
    if ($conn->query($query) === TRUE) {
        $_SESSION['message'] = 'Review Successfully Submitted';
        header('Location: review.php');
    } else {
        $_SESSION['message'] = 'Something Went Wrong';
        header('Location: review.php');
    }
}
    
