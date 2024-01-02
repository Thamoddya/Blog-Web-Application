<div class="col-md-6">
    <select class="form-select mb-3" id="NotifyPost">
        <option selected disabled>Select The Post</option>

        <?php
        $getPostDataForEmail = $connection->prepare("SELECT postID, postTitle FROM `allblogs` ORDER BY id DESC");
        $getPostDataForEmail->execute();
        while ($PostDataForEmail = $getPostDataForEmail->fetch()) {
            $postID = $PostDataForEmail['postID'];
            $postTitle = $PostDataForEmail['postTitle'];
        ?>
            <option value="<?php echo $postID ?>" data-bs-info="<?php echo $postTitle ?>"><?php echo $postTitle ?></option>
        <?php
        }
        ?>
    </select>

    <label for="NotifyPostDate" class="form-label text-white-50">Date</label>
    <input type="text" id="NotifyPostDate" class="form-control " aria-labelledby="passwordHelpBlock">
    <div id="passwordHelpBlock" class="form-text">
        EX : MAY 12 2023
    </div>
    <button class="col-12 btn btn-primary " onclick="sendEmail();" id="notifyEmailButton">Send Test Email</button>
    <button class="col-12 btn d-none " id="notifyEmailLoader">
        <div class="spinner-grow text-light" role="status">
        </div>
    </button>
</div>