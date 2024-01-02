<?php

require_once(ROOT_PATH . '/../../connection.php');
$stmt = $connection->prepare("SELECT * FROM `allblogs` INNER JOIN category ON allblogs.categoryID = category.id  LIMIT :limitNumber");
$stmt->bindValue(":limitNumber", 3, PDO::PARAM_INT);
$stmt->execute();

for ($latesyTopicRows = 0; $latesyTopicRows < $stmt->rowCount(); $latesyTopicRows++) {
    $latesyTopicData = $stmt->fetch();

?>

    <div class="featured-topics-card">
        <div class="card-thumb bg-cover" style="background-image: url('admin/uploads/blogUpload/<?php echo $latesyTopicData['postImage'] ?>')"></div>
        <span class="topic-category"><?php echo $latesyTopicData['categoryName'] ?></span>
        <div class="card-content">
            <a href="blog-list.php">
                <h3 class="heading-secondary"><?php echo $latesyTopicData['postTitle'] ?></h3>
            </a>
            <p class="body-text">
                <?php echo $latesyTopicData['displayData'] ?>...
            </p>

            <div class="post-meta">
                <p class="author">by <span><?php echo $latesyTopicData['Author'] ?></span></p>

                <span class="post-date">
                    <?php
                    $datetime_str = $latesyTopicData['addedTime'];
                    $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime_str);
                    $formatted_datetime = $datetime->format('M d, Y');
                    echo $formatted_datetime;
                    ?>
                </span>
            </div>

            <a href="single-post.php?postID=<?php echo $gotDataForheader['postID'] ?>,search=<?php echo $gotDataForheader['postTitle'] ?>" class="button icon-button">

                <span class="icon">
                    <i class="fas fa-chevron-right"></i>
                </span>
            </a>
        </div>
    </div>
<?php
}

?>