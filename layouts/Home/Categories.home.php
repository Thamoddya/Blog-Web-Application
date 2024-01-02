<?php
require_once(ROOT_PATH . '/../../connection.php');
$stmt = $connection->prepare("SELECT * FROM category LIMIT :limitNumber");
$stmt->bindValue(":limitNumber", 4, PDO::PARAM_INT);
$stmt->execute();
?>

<?php
for ($categoryDataRows = 0; $categoryDataRows < $stmt->rowCount(); $categoryDataRows++) {
    $categoryData = $stmt->fetch();
?>
    <a href="blog-list.php?categoryID=<?php echo $categoryData['id'] ?>" class="cat-item-link">
        <div class="cat-item">
            <div class="cat-thumb" style="background-image: url('./admin/uploads/category/<?php echo $categoryData['categoryImg'] ?>')">
            </div>
            <p class="cat-name">
                <?php echo $categoryData['categoryName'] ?>
                <?php
                $stmt2 = $connection->prepare("SELECT COUNT(id) FROM allblogs WHERE categoryID = :id");
                $id = $categoryData['id'];
                $stmt2->bindValue(":id", $id);
                $stmt2->execute();

                $getCountfetch = $stmt2->fetch();

                ?>
                <span>(<?php echo $getCountfetch['COUNT(id)'] ?>)</span>
            </p>
            <div class="button cat-button">
                <span>
                    <i class="fa fa-chevron-right"></i>
                </span>
            </div>
        </div>
    </a>
<?php
};
?>