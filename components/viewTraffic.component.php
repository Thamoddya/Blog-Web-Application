<?php

if (!isset($_SESSION['first_visit'])) {

    $updateViewTraffic = $connection->prepare("UPDATE `visitors` SET `count` = `count` + 1 where `id` = '1' ");
    $updateViewTraffic->execute();

    $_SESSION['first_visit'] = true;
}
