<?php
session_start();
$postID = $_GET['postID'];

if (empty($postID)) {
    header('Location: ./index.php');
    exit();
};
include_once "./connection.php";
include_once "./components/viewTraffic.component.php";


$getDataSQLQuery = $connection->prepare("SELECT * FROM allblogs INNER JOIN category ON category.id = allblogs.categoryID INNER JOIN postviews ON postviews.postID = allblogs.postID WHERE allblogs.postID = :postID");
$getDataSQLQuery->bindValue(":postID", $postID, PDO::PARAM_INT);
$getDataSQLQuery->execute();
$allPostData = $getDataSQLQuery->fetch();

$getBlogDataSQLQuery = $connection->prepare("SELECT * FROM blog WHERE postID = :postID");
$getBlogDataSQLQuery->bindValue(":postID", $postID, PDO::PARAM_INT);
$getBlogDataSQLQuery->execute();
if ($getBlogDataSQLQuery->rowCount() > 0) {
    $allBlogData = $getBlogDataSQLQuery->fetch();
} else {
    echo "Not Still Added";
    exit();
}

// Check if session variable has been set for this post ID
if (!isset($_SESSION['viewed_post_' . $postID])) {

    // Increment view count in database
    $updateViewCount = $connection->prepare("UPDATE postviews SET viewCount = viewCount + 1 WHERE postID = :postID");
    $updateViewCount->bindValue(':postID', $postID);
    $updateViewCount->execute();

    // Set session variable to indicate that user has viewed this post
    $_SESSION['viewed_post_' . $postID] = true;
}

$PageName = $allPostData['postTitle'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Thamoddya Rashmitha Blog - Knowledge Addict">
    <meta name="keywords" content="Thamoddya, Rashmitha, Blog,Knowledge,Addict, Science Blog, Technology Blog, Java Institute,Latest Post,Blog Post">
    <title><?php echo $PageName ?></title>
    <meta name="description" content="<?php echo $PageName ?>">

    <?php
    include_once "./components/head.imports.php";
    ?>
</head>

<body>

    <?php
    include_once "./components/preloader.component.php";
    include_once "./components/navbar.component.php";
    ?>



    <!-- ============= SINGLE POST ============= -->
    <section class="single-post-wrapper blog-list-wrapper section-padding">
        <div class="container">
            <div class="section-head">
                <h2 class="heading-secondary"><?php echo $allPostData['categoryName'] ?></h2>
                <ul class="c-bredcrumb">
                    <li>
                        <a href="#"> <?php echo $allPostData['tagName'] ?> </a>
                    </li>
                    <!-- tag Name -->
                    <li><a href="#">Single Post</a></li>
                    <!-- Post Title -->
                    <li><a href="#"><?php echo $allPostData['postTitle'] ?></a></li>
                </ul>
            </div>
            <div class="row gy-5">
                <div class="col-lg-9">
                    <div class="left-content">
                        <!-- Post card -->
                        <div class="post-card">
                            <div class="card-thumb bg-cover" style="background-image: url('admin/uploads/blogUpload/<?php echo $allPostData['postImage'] ?>')"></div>
                            <div class="card-content">
                                <div class="card-meta">
                                    <div class="meta-item post-author">
                                        <span class="category"><?php echo $allPostData['tagName'] ?></span>
                                        <a href="#" class="author-name"><?php echo $allPostData['Author'] ?></a>
                                    </div>
                                    <span class="meta-item">
                                        <?php
                                        $datetime_str = $allPostData['addedTime'];
                                        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime_str);
                                        $formatted_datetime = $datetime->format('M d, Y');
                                        echo $formatted_datetime;
                                        ?>
                                    </span>
                                    <span class="meta-item">
                                        <i class="fa-solid fa-eye"></i>
                                        <?php echo $allPostData['viewCount'] ?>
                                    </span>
                                    <span class="meta-item">
                                       <i class="fa-solid fa-share-from-square"></i>
                                    </span>
                                </div>
                                <div class="post-content">
                                    <div>

                                        <h3 class="heading-primary">
                                            <?php echo $allPostData['postTitle'] ?>
                                        </h3>


                                        <?php
                                        if (!empty($allBlogData['paragraph1'])) {
                                        ?>
                                            <p class="body-text"><?php echo $allBlogData['paragraph1'] ?></p>
                                        <?php
                                        }
                                        ?>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <?php
                                                    if (!empty($allBlogData['otherImg1'])) {
                                                    ?>
                                                        <div class="card-thumb bg-cover" style="background-image: url('admin/uploads/blogUpload/<?php echo $allBlogData['otherImg1'] ?>')"></div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-6">
                                                    <?php
                                                    if (!empty($allBlogData['otherImg2'])) {
                                                    ?>
                                                        <div class="card-thumb bg-cover" style="background-image: url('admin/uploads/blogUpload/<?php echo $allBlogData['otherImg2'] ?>')"></div>

                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        if (!empty($allBlogData['paragraph2'])) {
                                        ?>
                                            <p class="body-text"><?php echo $allBlogData['paragraph2'] ?></p>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (!empty($allBlogData['quote'])) {
                                        ?>
                                            <div class="post-quote mt-3">
                                                <p class="body-text">
                                                    “<?php echo $allBlogData['quote'] ?> “
                                                </p>
                                                <div class="quote-bottom">
                                                    <a href="#" class="author"><?php echo $allBlogData['quoteAutor'] ?></a>
                                                    <span class="gradient-bar small"></span>
                                                </div>

                                                <img class="quote-icon" src="assets/img/single-post/quote-icon.png" alt="" />
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (!empty($allBlogData['paragraph3'])) {
                                        ?>
                                            <p class="body-text"><?php echo $allBlogData['paragraph3'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Conclution point -->
                        <?php
                        if (!empty($allBlogData['conclution'])) {
                        ?>
                            <div class="post-point">
                                <h3 class="heading-secondary"> Conclusion</h3>
                                <p class="body-text">
                                    <?php echo $allBlogData['conclution'] ?>
                                </p>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- Tags -->
                        <div class="tags">
                            <h3 class="heading-secondary">Tags</h3>
                            <div class="categories-tags">
                                <?php


                                $getTagNamesForPost = $connection->prepare("SELECT * FROM posttags WHERE postID = :postID");
                                $getTagNamesForPost->bindValue(":postID", $postID, PDO::PARAM_INT);
                                $getTagNamesForPost->execute();

                                if ($getTagNamesForPost->rowCount() > 0) {


                                    for ($tagcount = 0; $tagcount < $getTagNamesForPost->rowCount(); $tagcount++) {
                                        $PostTagData = $getTagNamesForPost->fetch();

                                ?>
                                        <a href="single-post.php"> <?php echo $PostTagData['tagName'] ?> </a>

                                <?php
                                    }
                                } else {
                                    echo "Waiting for tags...";
                                }
                                ?>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="right-content">
                        <!-- Widget search box -->

                        <h3 class="heading-tertiary">Recent Posts</h3>

                        <?php
                        include_once "./layouts/singlePost/mainRecent.singlePost.php";
                        ?>

                        <!-- Widget add banner -->
                        <div class="widget-ad-banner bg-cover" style="background-image: url('assets/img/blog/sidebar-add-banner.png')">
                            <div class="content">
                                <a href="https://thamo.ga/" class="button icon-button active ">
                                    <span>
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- Widget social profile -->

                        <?php
                        include_once "./components/socialprofile.component.php";
                        ?>
                        <!-- Widget popular post -->
                        <!-- Widget popular post -->
                        <div class="widget-popular-post mt-30">
                            <h3 class="heading-tertiary mb-20">Popular posts</h3>
                            <!-- Cat item -->
                            <?php
                            include_once "./layouts/singlePost/popularPost.singlepost.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include_once "./components/footer.component.php";
    include_once "./components/body.imports.php";
    ?>

</body>

</html>