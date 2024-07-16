<?php require 'partials/head.php' ?>

<div class="notes-container">
    <?php require 'partials/goback.php' ?>
    <h1 class="h1-design">Edit a Note</h1>
    <form action="/editnote" method="post" class="form-design">
        <div class="form-div-design group">
            <input type="text" name="title" id="title" placeholder=" " required value="<?= $current_note_content['title'] ?>" class="input-design peer">
            <label for="title" class="label-design">Title</label>
        </div>
        <div class="form-div-design group">
            <label for="body" class="textarea-label-design">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" placeholder="Body of the note" class="textarea-design" required><?= $current_note_content['body'] ?></textarea>
        </div>
        <div class="form-div-design group">
            <button type="submit" class="submit-btn-design">Edit Note</button>
        </div>
    </form>
    <?php require 'partials/error.php' ?>
</div>

<?php require 'partials/foot.php' ?>