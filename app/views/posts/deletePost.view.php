<?php
$title = "Удаление поста";
require_once __DIR__ . "/../parts/header.php"
?>
    <form method="post" action="">
        <div class="row">
            <div class="card mt-3 p-2 col-md-4 col-sm-6">
                <img src="<?= $post->photo ? 'uploads/' . $post->photo : '' ?>"
                     class="card-img-top img-small" alt="Фото">
                <div class="card-body">
                    <h5 class="card-title"><?= $post->title ?></h5>
                    <p class="card-text">
                        <?= date_format(new DateTime($post->datePublication),
                            'd.m.Y')?></p>
                    <button type="submit" class="btn btn-danger" name="btnDel">Удалить</button>
                </div>
            </div>
    </form>
<?php require_once __DIR__ . "/../parts/footer.php"; ?>