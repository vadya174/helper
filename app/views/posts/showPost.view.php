<?php
$title = "Просмотр фотографии";
require_once __DIR__. "/../parts/header.php"?>
    <h2 class="offset-3">Пост...</h2>
    <div class="card mt-3 col-8 offset-2">
        <img src="<?= $post->photo ? 'uploads/' . $post->photo : '' ?>"
             class="card-img-top img-big" alt="Фото">
        <div class="card-body">
            <h5 class="card-title"><?= $post->title ?></h5>
            <p class="card-text">
                <?= date_format(new DateTime($post->datePublication),
                    'd.m.Y')?></p>
            <a class="btn btn-outline-danger"
               href="../../deletePost.php ? id= <?=$post->id; ?>">
                удалить </a>
            <a class="btn btn-outline-primary"
               href="../../updatePost.php ? id= <?=$post->id; ?>">
                изменить </a>
            <a class="btn btn-outline-info"
               href="/index.php">
                назад </a>
        </div>
    </div>
<?php require_once  __DIR__ . "/../parts/footer.php"?>