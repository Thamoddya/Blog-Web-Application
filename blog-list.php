<?php
session_start();

require_once "./connection.php";
$PageName = "All Blog List";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thamoddya Rashmitha - <?php echo $PageName ?></title>
    <meta name="description" content="Thamoddya Rashmitha Blog - Knowledge Addict">
    <meta name="keywords" content="Thamoddya, Rashmitha, Knowledge,Addict, Science Blog, Technology Blog, Java Institute,Latest Post,Blog Post">

    <?php
    include_once "./components/head.imports.php";
    include_once "./components/viewTraffic.component.php";
    ?>
</head>

<body>

    <?php
    include_once "./components/preloader.component.php";
    include_once "./components/navbar.component.php";
    ?>

    <section class="blog-list-wrapper section-padding">
        <div class="container">
            <div class="section-head">
                <h2 class="heading-secondary">All Blogs</h2>
                <ul class="c-bredcrumb">
                    <li>
                        <a href="#"> Home </a>
                    </li>
                    <li><a href="#">All Blogs</a></li>
                </ul>
            </div>
            <div class="row gy-5">

                <div class="col-lg-9">

                    <?php

                    require_once "./layouts/blogList/mainAllBlogs.blogList.php";
                    // Get the total number of items
                    $totalItems = $connection->query("SELECT COUNT(*) FROM allblogs")->fetchColumn();

                    // Calculate the total number of pages
                    $totalPages = ceil($totalItems / $perPage);

                    // Generate the pagination links
                    ?>
                    <ul class="pagination-wrapper">
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <li><a href="blog-list.php?page=<?php echo $i ?>" <?php if ($i === $pageNumber) echo 'class="active"' ?>><?php echo $i ?></a></li>
                        <?php endfor; ?>
                    </ul>
                    <?php
                    include_once "./components/largeWidthAd.component.php";
                    ?>
                </div>

                <div class="col-lg-3">
                    <div class="right-content">
                        <!-- Widget search box -->
                        <div class="widget-search-box">
                            <input type="text" placeholder="Search" />
                            <button class="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <h3 class="heading-tertiary">Recent stories</h3>

                        <?php
                        include_once "./layouts/blogList/recent.blogList.php";
                        ?>

                        <div class="widget-categories">
                            <h3 class="footer-heading mb-20">Categories</h3>
                            <div class="categories-tags">

                                <?php
                                include_once "./layouts/blogList/widgetCategory.blogList.php";
                                ?>

                            </div>
                        </div>

                        <?php
                        include_once "./components/smalllAd2.component.php";
                        include_once "./components/socialprofile.component.php";
                        ?>
                        <div class="widget-popular-post mt-30">
                            <h3 class="heading-tertiary mb-20">Popular posts</h3>
                            <?php
                            include_once "./layouts//singlePost/popularPost.singlepost.php";
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