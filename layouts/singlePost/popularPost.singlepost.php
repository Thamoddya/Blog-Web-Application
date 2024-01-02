<?php
include_once "./connection.php";
$stmt = $connection->prepare("SELECT * FROM allblogs INNER JOIN category ON category.id = allblogs.categoryID INNER JOIN postviews ON postviews.postID = allblogs.postID  ORDER BY postviews.viewCount DESC LIMIT :limitNumber");
$stmt->bindValue(":limitNumber", 3, PDO::PARAM_INT);
$stmt->execute();
?>

<?php
for ($PreviewmostUpdatedPostRowInSinglePost = 0; $PreviewmostUpdatedPostRowInSinglePost < $stmt->rowCount(); $PreviewmostUpdatedPostRowInSinglePost++) {
    $PreviewmostUpdatedPostDataInSingleArea = $stmt->fetch();
?>
    <div class="widget-category">
        <div class="cat-thumb bg-cover" style="background-image: url('admin/uploads/blogUpload/<?php echo $PreviewmostUpdatedPostDataInSingleArea['postImage'] ?>')"></div>
        <div class="cat-content">
            <a href="blog-list.php?postID=<?php echo $PreviewmostUpdatedPostDataInSingleArea['postID'] ?>">
                <h4 class="cat-title"><?php echo $PreviewmostUpdatedPostDataInSingleArea['postTitle'] ?></h4>
            </a>
            <div class="cat-meta">
                <span class="post-date meta-item"> 

                <?php
                 $datetime_str = $PreviewmostUpdatedPostDataInSingleArea['addedTime'];
                 $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime_str);
                 $formatted_datetime = $datetime->format('M d, Y');
                 echo $formatted_datetime;
                ?>
                </span>
                <span class="meta-item comment">
                    <i class="fa fa-eye"></i>
                    <?php echo $PreviewmostUpdatedPostDataInSingleArea['viewCount'] ?>
                </span>
            </div>
        </div>
    </div>
<?php
};
?>