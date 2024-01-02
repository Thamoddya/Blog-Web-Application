<?php

include_once "./connection.php";
$stmt = $connection->prepare("SELECT DISTINCT(tagName) FROM `posttags`");
$stmt->execute();

for ($GetTagName = 0; $GetTagName < $stmt->rowCount(); $GetTagName++) {
    $GetTagNameData = $stmt->fetch();

?>
    <a href="#" class="active"> <?php echo $GetTagNameData['tagName'] ?> </a>

<?php
}

?>