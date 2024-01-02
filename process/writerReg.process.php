<?php
session_start();
include_once "../connection.php";
$email = $_POST['email'];
$password = $_POST['password'];

$adminLogin = $connection->prepare("SELECT * FROM writers WHERE `Email` = :Email  AND `Password` = :Password");
$adminLogin->bindValue(":Email", $email);
$adminLogin->bindValue(":Password", $password);
$adminLogin->execute();

if ($adminLogin->rowCount() === 1) {
    $generateToken = uniqid();
    $addAuthToken = $connection->prepare("UPDATE `writers` SET `authToken` = :Token WHERE `Email` = :Email");
    $addAuthToken->bindValue(":Token", $generateToken);
    $addAuthToken->bindValue(":Email", $email);
    $addAuthToken->execute();
    $_SESSION['AuthToken'] = $generateToken;
    echo "success";
} else {

    echo "error";
}
