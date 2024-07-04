<?php require 'partials/head.php' ?>

<div class="notes-container">
    <?php require 'partials/goback.php' ?>
    <form action="/editnote" method="post">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title of the note" value="<?= $current_note_content['title'] ?>">
        </div>
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" placeholder="Body of the note"><?= $current_note_content['body'] ?></textarea>
        </div>
        <div>
            <button type="submit">Edit Note</button>
        </div>
    </form>
    <?php require 'partials/error.php' ?>
</div>

<?php require 'partials/foot.php' ?>