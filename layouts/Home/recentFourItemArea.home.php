<?php

require_once(ROOT_PATH . '/../../connection.php');
$stmt = $connection->prepare("SELECT * FROM allblogs ORDER BY `id` DESC LIMIT :limitNumber");
$stmt->bindValue(":limitNumber", 4, PDO::PARAM_INT);
$stmt->execute();

for ($recentPost2 = 0; $recentPost2 < $stmt->rowCount(); $recentPost2++) {
    $recentPost_2_Data = $stmt->fetch();

?>
    <div class="col-md-6">
        <div class="main-post-card">
            <div class="card-thumb bg-cover" style="background-image: url('admin/uploads/blogUpload/<?php echo $recentPost_2_Data['postImage'] ?>')"></div>
            <span class="category"><?php echo $recentPost_2_Data['tagName'] ?></span>
            <div class="card-content">

                <div class="card-meta">
                    <div class="meta-item post-author">
                        <div class="author-avatar bg-cover" style="background-image: url('assets/img/recent-post/post-author1.png');">
                        </div>
                        <a href="blog-list.php" class="author-name"><?php echo $recentPost_2_Data['Author'] ?></a>
                    </div>
                    <span class="meta-item">
                    <?php
                        $datetime_str = $recentPost_2_Data['addedTime'];
                        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime_str);
                        $formatted_datetime = $datetime->format('M d, Y');
                        echo $formatted_datetime;
                        ?>
                    </span>
                    <span class="meta-item">
                        <i class="fa fa-share-alt"></i>
                    </span>
                </div>
                <a href="blog-list.php">
                    <h3 class="heading-tertiary">
                        <?php echo $recentPost_2_Data['postTitle'] ?>
                    </h3>
                </a>
                <a href="blog-list.php?postID=<?php echo $recentPost_2_Data['postID'] ?>" class="button">
                    <span>
                        <img src="assets/img/icons/long-arrow.png" alt="arrow" />
                    </span>
                </a>
            </div>
        </div>
    </div>

<?php
}

?>