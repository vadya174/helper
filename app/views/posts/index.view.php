<?php require_once __DIR__. "/../parts/header.php"; ?>

    <a class="col-md-4 btn  btn-primary mt-5 mb-3 p-3"
    href="/app/db/posts/insertPost.php">
        Добавить новую запись
    </a>

<div class="row">
    <?php
    $i= 1;
    foreach ($posts as $post): ?>
    <div class="card mt-3 p-2 col-md-4 col-sm-6">
        <img src="<?= $post->photo ? 'uploads/' . $post->photo : '' ?>"
             class="card-img-top img-small" alt="Фото">
        <div class="card-body">
            <h5 class="card-title"><?= $post->title ?></h5>
            <p class="card-text">
                <?= date_format(new DateTime($post->datePublication),
                'd.m.Y')?></p>
            <a class="btn btn-info p-2" style="width: 100%;"
            href="/showPost.php ? id=<?= $post->id; ?>">
                Подробно </a>
        </div>
    </div>
<?php endforeach;
    require_once "app/views/parts/footer.php";
?>