<?php

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

?>
<table class="table table-bordered border-primary">
    <tbody>
        <tr>
            <td class="table-active text-white text-center "><i class="bi bi-eye-fill"></i> <?php echo $BlogViewCount  ?></td>
            <td class="table-active text-white text-center "><i class="bi bi-file-earmark-font"></i> <?php echo $blogCount  ?></td>
        </tr>
        <tr>
            <td class="table-active text-white text-center "><i class="bi bi-file-person-fill"></i> <?php echo $TrafficCount  ?></td>
            <td class="table-active text-white text-center "><i class="bi bi-person-circle"></i> <?php echo $RegistedToNewslettterCount  ?> </td>
        </tr>
    </tbody>
</table>