<?php
session_start();
require_once('../../connection.php');

if (empty($_POST['email'])) {
    $response = array(
        'success' => 'false',
        'message' => 'Login Unsuccessful',
        'error' => 'Empty Email address'
    );
} else {
    if (empty($_POST['password'])) {
        $response = array(
            'success' => 'false',
            'message' => 'Login Unsuccessful',
            'error' => 'Empty Password'
        );
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $stmt = $connection->prepare("SELECT * FROM `admin` WHERE `email` = :email AND `password` = :password ");
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $password);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount == '1') {
            $response = array(
                'success' => 'true',
                'message' => 'Login Successful'
            );
            $_SESSION['adminEmail'] = $email;
        } else {
            $response = array(
                'success' => 'false',
                'message' => 'Login Unsuccessful',
                'error' => 'Invalid credentials'
            );
        }
    }
}

echo json_encode($response);
?>