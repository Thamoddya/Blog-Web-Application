<?php
session_start();
include_once "./connection.php";
$PageName = "Blog Home ";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thamoddya Rashmitha - <?php echo $PageName ?></title>
    <meta name="description" content="Thamoddya Rashmitha Blog - Knowledge Addict">
    <meta name="keywords" content="Thamoddya, Rashmitha, Blog, Science Blog, Technology Blog, Java Institute,Latest Post,Blog Post">

    <?php
    include_once "./components/head.imports.php";
    include_once "./components/viewTraffic.component.php";
    ?>
    <meta name="google-site-verification" content="xjDaOK72B7__BGgPeOYLYgc70RH54o2xUUcL7bV7BxY" />
</head>

<body>
    <?php
    include_once "./components/preloader.component.php";
    include_once "./components/navbar.component.php";
    include_once "./layouts/Home/hero.home.php";
    ?>
    <!-- ============= FEATURED TOPICS ============= -->
    <section class="featured-topics-wrapper section-padding">
        <div class="container">
            <div class="section-head bg-light rounded-3">
                <h2 class="heading-primary">Latest Topics</h2>
                <a href="#" class="button button-minimal">
                    View all
                    <span class="icon">
                        <img src="assets/img/icons/long-arrow.png" alt="arrow" />
                    </span>
                </a>
            </div>
            <div class="row gy-5 ">
                <div class="col-lg-9 left-content">
                    <?php
                    include_once "./layouts/Home/lastestTopics.home.php";
                    ?>
                </div>
                <div class="col-lg-3">
                    <div class="featured-topic-slidebar">
                        <div class="sidebar-widget widget-categories">
                            <div class="gradient-bar mb-30"></div>
                            <h3 class="heading-tertiary mb-20">Categories</h3>
                            <?php
                            require_once "./layouts/Home/Categories.home.php";
                            require_once "./components/smallAd.component.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4 overflow-x-hidden">
                        <?php
                        include_once "./components/newsletter.component.php";
                        ?>
                    </div>
                    <div class="col-md-8 overflow-x-hidden">
                        <div class="containerData mt-3 mt-md-0 mb-3 mb-md-0">
                            <h2 class="text text-center"></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============= AD CAMPAIGN ============= -->
    <div class="container mt-2">
        <div class="ad-campaign bg-cover" style="background-image: url('assets/img/add-campaign-1.png')">
            <div class="content-left">
                <span class="discount">Knowladge Addict</span>
            </div>
            <div class="content-right">
                <div class="content offset-lg-4 d-none d-lg-flex">
                    <a href="#" class="button icon-button active ">
                        <span class="icon">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============= TRENDING TOPICS ============= -->
    <section class="trending-wrapper section-padding">
        <div class="container">
            <div class="section-head">
                <h2 class="heading-primary">Trending topics</h2>
                <a href="blog-list.php" class="button button-minimal">
                    View all
                    <span class="icon">
                        <img src="assets/img/icons/long-arrow.png" alt="arrow" />
                    </span>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row gy-3">
                <?php
                include_once "./layouts/Home/trending.home.php";
                ?>
            </div>
        </div>
    </section>

    <!-- ============= DISCUSSED POST ============= -->
    <section class="discussed-post-wrapper section-padding">
        <div class="container">
            <div class="section-head">
                <h2 class="heading-primary">Most Engaged Post</h2>
                <a href="blog-list.php" class="button button-minimal">
                    View all
                    <span class="icon">
                        <img src="assets/img/icons/long-arrow.png" alt="arrow" />
                    </span>
                </a>
            </div>
            <div class="row gy-5">
                <div class="col-lg-9 left-content">

                    <?php
                    include_once "./layouts/Home/mostDiscussed.home.php";
                    ?>

                </div>
                <div class="col-lg-3">
                    <div class="sidebar-widget">
                        <div class="gradient-bar mb-30"></div>
                        <!-- Cat item -->
                        <?php
                        include_once "./layouts/Home/engagedPostpreviewPost.home.php";
                        ?>
                        <!-- WIDGET SOCIAL PROFILE -->
                        <?php
                        include_once "./components/socialprofile.component.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============= AD CAMPAIGN ============= -->
    <?php
    include_once "./components/largeWidthAd.component.php";
    ?>

    <!-- ============= RECENT POST ============= -->
    <section class="recent-post-wrapper section-padding">
        <div class="container">
            <div class="section-head">
                <h2 class="heading-primary">Recent Posts</h2>
                <a href="blog-list.php" class="button button-minimal">
                    View all
                    <span class="icon">
                        <img src="assets/img/icons/long-arrow.png" alt="arrow" />
                    </span>
                </a>
            </div>
            <div class="row gy-5 justify-content-end">
                <div class="col-lg-3 sidebar">
                    <div class="gradient-bar"></div>

                    <?php
                    include_once "./layouts/Home/recentPost1.home.php";
                    include_once "./components/smalllAd2.component.php";
                    ?>

                </div>
                <div class="col-lg-9">
                    <div class="row gy-4 main-post-card-wrapper">
                        <?php
                        include_once "./layouts/Home/recentFourItemArea.home.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include_once "./components/footer.component.php";
    include_once "./components/body.imports.php";
    ?>

    <script>
        const newsletterSubmit = () => {
            let email = $('#newsletterEmail').val();
            $('#newsletterButton').addClass('d-none');
            $('#newsletterLoader').removeClass('d-none');

            let formdata = new FormData();
            formdata.append('email', email);

            $.ajax({
                type: 'POST',
                url: './process/addToNewsletter.process.php',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response == 'success') {
                        $('#newsletterLoader').addClass('d-none');
                        $('#newsletterButton').removeClass('d-none');
                        $('#newsletterButton').html('Sent');
                        $('#newsletterButton').prop('disabled', true);
                    } else {
                        $('#newsletterButton').removeClass('d-none');
                        $('#newsletterButton').html('Error');
                        $('#newsletterButton').prop('disabled', true);
                        $('#newsletterLoader').addClass('d-none');
                    }
                }
            });

        }
    </script>
</body>

</html>