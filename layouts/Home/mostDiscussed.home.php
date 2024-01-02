<?php
require_once(ROOT_PATH . '/../../connection.php');
$stmt = $connection->prepare("SELECT * FROM allblogs INNER JOIN category ON category.id = allblogs.categoryID INNER JOIN postviews ON postviews.postID = allblogs.postID ORDER BY postviews.viewCount DESC LIMIT :limitNumber");
$stmt->bindValue(":limitNumber", 1, PDO::PARAM_INT);
$stmt->execute();
?>

<?php
for ($mostUpdatedPostRow = 0; $mostUpdatedPostRow < $stmt->rowCount(); $mostUpdatedPostRow++) {
    $mostUpdatedPostData = $stmt->fetch();
?>
    <div class="discussed-post bg-cover" style="background-image: url('admin/uploads/blogUpload/<?php echo $mostUpdatedPostData['postImage'] ?>')">
        <div class="post-card">
            <span class="category"> <?php echo $mostUpdatedPostData['categoryName'] ?> </span>
            <a href="blog-list.php">
                <h3 class="heading-secondary">
                    <?php echo $mostUpdatedPostData['postTitle'] ?>
                </h3>
            </a>
            <div class="post-meta-wrapper">
                <div class="meta-left">
                    <p class="author meta-item">by <span><?php echo $mostUpdatedPostData['Author'] ?></span></p>
                    <span class="post-date meta-item">
                        <?php
                        $datetime_str = $mostUpdatedPostData['addedTime'];
                        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime_str);
                        $formatted_datetime = $datetime->format('M d, Y');
                        echo $formatted_datetime;
                        ?>
                    </span>
                    <span class="meta-item comment">
                        <i class="fa fa-eye"></i>
                        <?php echo $mostUpdatedPostData['viewCount'] ?>
                    </span>
                </div>
                <a href="blog-list.php?postID=<?php echo $mostUpdatedPostData['postID'] ?>" class="button post-button">
                    <span class="icon">
                        <img src="assets/img/icons/long-arrow.png" alt="arrow" />
                    </span>
                </a>
            </div>
        </div>
    </div>
<?php
};
?>

