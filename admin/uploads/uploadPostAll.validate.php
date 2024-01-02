<?php
include_once "../../connection.php";

$postID = $_POST['postID'];
$paragraph1 = $_POST['paragraph1'];
$paragraph2 = $_POST['paragraph2'];
$paragraph3 = $_POST['paragraph3'];
$conclusion = $_POST['conclusion'];
$quote = $_POST['quote'];
$quoteAuthor = $_POST['quoteAuthor'];
$otherImage1 = $_FILES['otherImage1'];
$otherImage2 = $_FILES['otherImage2'];

// Check if paragraphs are empty and assign NULL
if (empty($paragraph1)) {
    $paragraph1 = null;
}
if (empty($paragraph2)) {
    $paragraph2 = null;
}
if (empty($paragraph3)) {
    $paragraph3 = null;
}

// Check if quote and author are empty and assign NULL
if (empty($quote) && empty($quoteAuthor)) {
    $quote = null;
    $quoteAuthor = null;
}

// Generate unique IDs for the images
$image1Name = null;
$image2Name = null;


$uploadDirectory = "blogUpload/";

if (!empty($otherImage1)) {
    $image1Name = uniqid() . '.jpg'; // Change extension based on image file type
    move_uploaded_file($otherImage1['tmp_name'], $uploadDirectory . $image1Name);
}

if (!empty($otherImage2)) {
    $image2Name = uniqid() . '.jpg'; // Change extension based on image file type
    move_uploaded_file($otherImage2['tmp_name'], $uploadDirectory . $image2Name);
}

$stmt = $connection->prepare('INSERT INTO blog (postID, paragraph1, paragraph2, paragraph3, conclution, quote, quoteAutor, otherImg1, otherImg2) VALUES (:postID, :paragraph1, :paragraph2, :paragraph3, :conclution, :quote, :quoteAutor, :otherImg1, :otherImg2)');

$stmt->bindValue(':postID', $postID);
$stmt->bindValue(':paragraph1', $paragraph1);
$stmt->bindValue(':paragraph2', $paragraph2);
$stmt->bindValue(':paragraph3', $paragraph3);
$stmt->bindValue(':conclution', $conclusion);
$stmt->bindValue(':quote', $quote);
$stmt->bindValue(':quoteAutor', $quoteAuthor);
$stmt->bindValue(':otherImg1', $image1Name);
$stmt->bindValue(':otherImg2', $image2Name);

$stmt->execute();


// Return a response indicating success
$response = array('success' => true);
header('Content-Type: application/json');
echo json_encode($response);
?>