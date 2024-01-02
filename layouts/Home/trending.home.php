<?php
require_once(ROOT_PATH . '/../../connection.php');
$stmt = $connection->prepare("SELECT * FROM addtotrending INNER JOIN allblogs ON addtotrending.postID = allblogs.postID LIMIT :limitNumber");
$stmt->bindValue(":limitNumber", 3, PDO::PARAM_INT);
$stmt->execute();

$postSize = 5;
?>

<?php
for ($TrendingDataRows = 0; $TrendingDataRows < $stmt->rowCount(); $TrendingDataRows++) {
    $TrendingData = $stmt->fetch();
?>
    <div class="col-lg-<?php echo $postSize ?>">
        <div class="trending-card bg-cover" style="background-image: url('./admin/uploads/blogUpload/<?php echo $TrendingData['postImage'] ?>')">
            <div class="card-content">
                <span class="category"> <?php echo $TrendingData['tagName'] ?> </span>
                <a href="blog-list.php">
                    <h3 class="heading-primary">
                        <?php echo $TrendingData['postTitle'] ?>
                    </h3>
                </a>

                <a href="blog-list.php" class="author"> by <?php echo $TrendingData['Author'] ?></a>

                <a href="blog-list.php?postID=<?php echo $TrendingData['postID'] ?>" class="button icon-button">
                    <span class="icon">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
<?php
    $postSize = $postSize - 1;
};
?>