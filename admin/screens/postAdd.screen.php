<div class="col-md-6">
    <div class="mb-3">
        <label for="postTitle" class="form-label text-white">POST TITLE</label>
        <input type="text" class="form-control" id="postTitle" placeholder="POST TITLE">
    </div>
    <div class="input-group mb-1">
        <label class="input-group-text" for="inputGroupFile01">POST IMAGE (1320*750)</label>
        <input type="file" class="form-control" id="postImage">
    </div>
    <div class="mb-1">
        <label for="postAuthor" class="form-label text-white">POST AUTHOR</label>
        <input type="text" class="form-control" id="postAuthor" placeholder="POST AUTHOR">
    </div>
    <div class="mb-1">
        <label for="postDisplayData" class="form-label text-white">POST DISPLAY DATA</label>
        <textarea class="form-control" id="postDisplayData" rows="3"></textarea>
    </div>
    <div class="mb-1">
        <label for="posttagName" class="form-label text-white">TAG NAME</label>
        <input type="text" class="form-control" id="posttagName" placeholder="POST TAG NAME">
    </div>
    <select class="form-select" aria-label="Default select example" id="postCategory">

        <option selected disabled>POST CATEGORY</option>

        <?php

        $getPostCategorysGet = $connection->prepare("SELECT * FROM `category`");
        $getPostCategorysGet->execute();
        while ($postCategorys = $getPostCategorysGet->fetch()) {
            ?>
            <option value="<?php echo $postCategorys['id'] ?>"><?php echo $postCategorys['categoryName'] ?></option>
            <?php
        }
        ?>
        
    </select>

    <button class="btn btn-primary col-12 my-2" onclick="createPost();" id="postUploadButton">UPLOAD</button>
    <button class="btn col-12 my-2 d-none" id="postUploadLoader">
        <div class="spinner-grow text-primary" role="status">
        </div>
    </button>
</div>