<?php
include_once "../../connection.php";

$postTitle = $_POST["postTitle"];
$postImage = $_FILES["postImage"];
$postAuthor = $_POST["postAuthor"];
$postDisplayData = $_POST["postDisplayData"];
$posttagName = $_POST["posttagName"];
$postCategory = $_POST["postCategory"];

if (empty($postTitle) || empty($postAuthor) || empty($postDisplayData) || empty($posttagName) || empty($postCategory)) {
    echo "Error: All fields are required.";
} else {
   
    function generateUniqueID() {
        return mt_rand(1000000000, 9999999999);
    }

    $uniqueID = generateUniqueID();
    $fileExtension = pathinfo($_FILES["postImage"]["name"], PATHINFO_EXTENSION);
    $imageName = $uniqueID . "." . $fileExtension;

    $stmt = $connection->prepare("INSERT INTO `allblogs` (postID, postImage, postTitle, Author, addedTime, displayData, tagName, categoryID) VALUES (?, ?, ?, ?, NOW(), ?, ?, ?)");
    $stmt->bindValue(1, $uniqueID);
    $stmt->bindValue(2, $imageName);
    $stmt->bindValue(3, $postTitle);
    $stmt->bindValue(4, $postAuthor);
    $stmt->bindValue(5, $postDisplayData);
    $stmt->bindValue(6, $posttagName);
    $stmt->bindValue(7, $postCategory);

    $stmt2 = $connection->prepare("INSERT INTO `postviews`(`postID`,`viewCount`) VALUES (?, 0)");
    $stmt2->bindValue(1, $uniqueID);

    if ($stmt->execute()) {
        if ($stmt2->execute()) {
            $targetDir = "blogUpload/";
            $targetFile = $targetDir . $imageName;
            if (move_uploaded_file($_FILES["postImage"]["tmp_name"], $targetFile)) {
                echo "Success";
            } else {
                echo "Error: There was an error uploading the file.";
            }
        } else {
            echo "Error in Statement 2.";
        }
    } else {
        echo "Error in Statement 1.";
    }
}
?>
