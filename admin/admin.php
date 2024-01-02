<?php
session_start();
if (empty($_SESSION['adminEmail'])) {
    header('Location: ./adminLogin.php');
}
include_once "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - KNOWLADGE ADDICYT</title>
    <?php
    include_once "./includes/adminHead.include.php";
    ?>
</head>

<body class="bg-dark">
    <?php
    include_once "./components/navbar.admin.php";
    ?>


    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-4 ">
                <?php
                include_once "./components/detailtable.admin.component.php";
                ?>
                <div class="row mt-2">
                    <div class="col-12">
                        <div>
                            <canvas id="mainPageDetailChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <?php
                include_once "./components/table.admin.component.php";
                ?>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row">

            <?php
            include_once "./screens/postAdd.screen.php";
            include_once "./screens/postDataAdd.screen.php";
            ?>

        </div>
        <hr class="text-white">
    </div>

    <div class="container-fluid mt-4">
        <div class="row">
            <?php
            include_once "./screens/sendNotifyEmail.screen.php";
            ?>
             <?php
    include_once "./screens/sendOtherEMil.screen.php";
    ?>
        </div>

    </div>


    <?php
    include_once "./includes/adminBody.include.php";
    ?>
   

</body>

</html>