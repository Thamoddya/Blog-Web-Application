<section class="ftco-section">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <table class="tableBlog table-responsive-xl">
                    <tbody>
                        <?php
                        $getMainBlogData = $connection->prepare("SELECT * FROM allblogs INNER JOIN postviews ON allblogs.postID = postviews.postID ORDER BY postviews.viewCount DESC LIMIT 4");
                        $getMainBlogData->execute();
                        while ($mainBlogData = $getMainBlogData->fetch()) {
                        ?>
                            <tr class="alert" role="alert">
                                
                                <td class="d-flex align-items-center">
                                    <div class="img" style="background-image: url(uploads/blogUpload/<?php echo $mainBlogData['postImage'] ?>);"></div>
                                    <div class="pl-2 mx-1 email">
                                        <span><?php echo $mainBlogData['postTitle']; ?></span>
                                        <span class="text-white-50">Added: <?php
                                                                            $BlofAddedTimeMySql = $mainBlogData['addedTime'];
                                                                            $BlogAddedTime = new DateTime($BlofAddedTimeMySql);
                                                                            $formattedDatetime = $BlogAddedTime->format('d/m/Y');
                                                                            echo $formattedDatetime;
                                                                            ?></span>
                                    </div>
                                </td>
                                <td><?php echo $mainBlogData['tagName']; ?></td>
                                <td class="status"><span class="active"><i class="bi bi-eye"></i> <?php echo $mainBlogData['viewCount']; ?></span></td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>