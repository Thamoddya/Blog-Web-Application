<div class="col-md-6">

    <select class="form-select" aria-label="Default select example" id="postID">
        <option selected disabled>POST SELECT</option>

        <?php

        $getPostData = $connection->prepare("SELECT postID,postTitle FROM `allblogs`");
        $getPostData->execute();
        while ($PostData = $getPostData->fetch()) {
        ?>
            <option value="<?php echo $PostData['postID'] ?>"><?php echo $PostData['postTitle'] ?></option>
        <?php
        }
        ?>

    </select>

    <div class="mb-1">
        <label for="postDisplayData" class="form-label text-white">POST PARAGAPH 1</label>
        <textarea class="form-control" id="postParagaphOne" rows="3"></textarea>
    </div>


    <div class="mb-1">
        <label for="postDisplayData" class="form-label text-white">POST PARAGAPH 2</label>
        <textarea class="form-control" id="postParagaphTwo" rows="3"></textarea>
    </div>


    <div class="mb-1">
        <label for="postDisplayData" class="form-label text-white">POST PARAGAPH 3</label>
        <textarea class="form-control" id="postParagaphThree" rows="3"></textarea>
    </div>


    <div class="mb-3">
        <label for="postTitle" class="form-label text-white">POST CONCLUTION</label>
        <input type="text" class="form-control" id="postConclution" placeholder="POST TITLE">
    </div>

    <div class="mb-3">
        <label for="postTitle" class="form-label text-white">POST QUOTE</label>
        <input type="text" class="form-control" id="postQUote" placeholder="POST TITLE">
    </div>
    <div class="mb-1">
        <label for="postAuthor" class="form-label text-white">POST QUOTE AUTHOR</label>
        <input type="text" class="form-control" id="postQUoteAuthor" placeholder="POST AUTHOR">
    </div>

    <div class="input-group mb-1">
        <label class="input-group-text" for="inputGroupFile01">POST OTHER IMAGE 1 (1320*750)</label>
        <input type="file" class="form-control" id="postOtherImageOne">
    </div>
    <div class="input-group mb-1">
        <label class="input-group-text" for="inputGroupFile01">POST OTHER IMAGE 2 (1320*750)</label>
        <input type="file" class="form-control" id="postOtherImageTwo">
    </div>
    <button class="btn btn-primary col-12 my-2" onclick="addPostData();" id="postALLUploadButton">UPLOAD</button>
    <button class="btn col-12 my-2 d-none" id="postALLUploadLoader">
        <div class="spinner-grow text-primary" role="status">
        </div>
    </button>
</div>