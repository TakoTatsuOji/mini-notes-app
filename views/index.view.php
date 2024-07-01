<?php require 'partials/head.php' ?>

<div class="notes-container">
    <h1 class="h1-design">Your Notes</h1>
    <table class="table-design">
        <thead>
            <tr>
                <th scope="col" class="th-design">Note ID</th>
                <th scope="col" class="th-design">Title</th>
                <th scope="col" class="th-design">Actions</th>
            </tr>
        </thead>
        <tbody class="tbody-design">
            <?php foreach($notes as $note): ?>
                <tr class="tr-design">
                    <th scope="row" class="th-design"><?= $note['id'] ?></td>
                    <td class="td-design"><?= $note['title'] ?></td>
                    <td class="text-center">
                        <button type="button" class="btn show">
                            <a href="/show">Show</a>
                        </button>
                        <button type="button" class="btn edit">
                            <a href="/edit">Edit</a>
                        </button>
                        <button type="button" class="btn add">
                            <a href="/add">Add</a>
                        </button>
                        <button type="button" class="btn delete">
                            <a href="/delete">Delete</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php require 'partials/foot.php' ?>