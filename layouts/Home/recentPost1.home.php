<?php

require_once(ROOT_PATH . '/../../connection.php');
$stmt = $connection->prepare("SELECT * FROM addtorecent INNER JOIN allblogs ON allblogs.postID = addtorecent.postID INNER JOIN postviews ON postviews.postID = addtorecent.postID ORDER BY allblogs.id DESC  LIMIT :limitNumber");
$stmt->bindValue(":limitNumber", 2, PDO::PARAM_INT);
$stmt->execute();

for ($recentPost1 = 0; $recentPost1 < $stmt->rowCount(); $recentPost1++) {
    $recentPost_1_Data = $stmt->fetch();

?>
    <div class="recent-post-card">
        <div class="card-thumb bg-cover" style="background-image: url('admin/uploads/blogUpload/<?php echo $recentPost_1_Data['postImage'] ?>')"></div>
        <div class="card-content">
            <div class="post-meta">
                <span class="meta-item"> <?php echo $recentPost_1_Data['tagName'] ?> </span>
                <span class="meta-item">
                    <?php
                    $datetime_str = $recentPost_1_Data['addedTime'];
                    $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime_str);
                    $formatted_datetime = $datetime->format('M d, Y');
                    echo $formatted_datetime;
                    ?>
                </span>
                <span class="meta-item">
                    <i class="fa fa-eye"></i>
                    <?php echo $recentPost_1_Data['viewCount'] ?>
                </span>
            </div>
            <a href="blog-list.php?postID=<?php echo $recentPost_1_Data['postID'] ?>">
                <h3 class="heading-secondary">
                    <?php echo $recentPost_1_Data['postTitle'] ?>
                </h3>
            </a>
        </div>
    </div>

<?php
}

?>