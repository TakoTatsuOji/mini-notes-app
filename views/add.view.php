<?php require 'partials/head.php' ?>

<div class="notes-container">
    <?php require 'partials/goback.php' ?>
    <form method="post">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title of the note" required value="<?= $_POST['title'] ?? '' ?>">
        </div>
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" placeholder="Body of the note" required>
                <?= $_POST['title'] ?? '' ?>
            </textarea>
        </div>
        <div>
            <button type="submit">Add Note</button>
        </div>
    </form>
    <?php require 'partials/error.php' ?>
</div>

<?php require 'partials/foot.php' ?>