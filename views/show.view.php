<?php require 'partials/head.php' ?>

<div class="notes-container">
    <?php require 'partials/goback.php' ?>
    <h1 class="h1-design"><?= $note['title'] ?></h1>
    <p><?= $note['body'] ?></p>
</div>

<?php require 'partials/foot.php' ?>