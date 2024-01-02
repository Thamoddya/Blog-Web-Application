<div class="left-content">
    <?php
    include_once "./connection.php";

    // Get the current page number
    $pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Set the number of items to display per page
    $perPage = 3;

    // Calculate the offset based on the current page number and the number of items per page
    $offset = ($pageNumber - 1) * $perPage;

    // Prepare the SQL query with the LIMIT and OFFSET clauses
    $stmt = $connection->prepare("SELECT * FROM allblogs INNER JOIN category ON category.id = allblogs.categoryID INNER JOIN postviews ON postviews.postID = allblogs.postID ORDER BY allblogs.id DESC LIMIT :perPage OFFSET :offset");
    $stmt->bindValue(":perPage", $perPage, PDO::PARAM_INT);
    $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
    $stmt->execute();
    ?>

    <?php
    for ($getDataForAllBlog = 0; $getDataForAllBlog < $stmt->rowCount(); $getDataForAllBlog++) {
        $AllBlogData = $stmt->fetch();
    ?>
        <div class="post-card">
            <div class="post-card">
                <div class="card-thumb bg-cover" style="background-image: url('admin/uploads/blogUpload/<?php echo $AllBlogData['postImage'] ?>')"></div>
                <div class="card-content">
                    <div class="card-meta">
                        <div class="meta-item post-author">
                            <span class="category"><?php echo $AllBlogData['categoryName'] ?></span>
                            <a href="single-post.php?postID=<?php echo $AllBlogData['postID'] ?>" class="author-name"><?php echo $AllBlogData['Author'] ?></a>
                        </div>
                        <span class="meta-item">
                            <?php
                            $datetime_str = $AllBlogData['addedTime'];
                            $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime_str);
                            $formatted_datetime = $datetime->format('M d, Y');
                            echo $formatted_datetime;
                            ?>
                        </span>
                        <span class="meta-item">
                            <i class="fa fa-eye"></i>
                            <?php echo $AllBlogData['viewCount'] ?>
                        </span>
                        <span class="meta-item">
                            <i class="fal fa-share-alt"></i>
                        </span>
                    </div>
                    <div class="post-content">
                        <div>
                            <a href="single-post.php?postID=<?php echo $AllBlogData['postID'] ?>">
                                <h3 class="heading-primary">
                                    <?php echo $AllBlogData['postTitle'] ?>
                                </h3>
                            </a>
                            <p class="body-text">
                                <?php echo $AllBlogData['displayData'] ?>
                            </p>
                        </div>
                        <a href="single-post.php?postID=<?php echo $AllBlogData['postID'] ?>,search=<?php echo $AllBlogData['postTitle'] ?>" class="button icon-button">
                            <span class="icon">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    };
    ?>
</div>