<?php
include_once "../../connection.php";

$getBlogCount = $connection->prepare("SELECT COUNT(*) AS blogCount FROM allblogs;");
$getBlogCount->execute();
$blogCountGET = $getBlogCount->fetch();
$blogCount = $blogCountGET['blogCount'];

$getBlogViewCounnt = $connection->prepare("SELECT SUM(viewCount) AS viewCount FROM postviews");
$getBlogViewCounnt->execute();
$getBlogViewCounntGET = $getBlogViewCounnt->fetch();
$BlogViewCount = $getBlogViewCounntGET['viewCount'];

$getTrafficCount = $connection->prepare("SELECT `count` FROM visitors");
$getTrafficCount->execute();
$getTrafficCountGET = $getTrafficCount->fetch();
$TrafficCount = $getTrafficCountGET['count'];

$GetRegistedToNewslettterCount = $connection->prepare("SELECT COUNT(Email) FROM newsletter");
$GetRegistedToNewslettterCount->execute();
$GetRegistedToNewslettterCountGET = $GetRegistedToNewslettterCount->fetch();
$RegistedToNewslettterCount = $GetRegistedToNewslettterCountGET['COUNT(Email)'];


$data = array(
    'labels' => ['Blog Count', 'Blog View Count', 'Visit Count', 'Registered Count'],
    'datasets' => array(
        array(
            'label' => 'Blog Dataset',
            'data' => [$blogCount, $BlogViewCount, $TrafficCount, $RegistedToNewslettterCount],
            'backgroundColor' => [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
            ]
        )
    )
);

$jsonData = json_encode($data);

header('Content-Type: application/json');
echo $jsonData;
?>