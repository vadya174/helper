<?php

require_once "bootstrap.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit;
}

$post = $newPost->getPostId($_GET['id']);

if (isset($_POST["btnDel"])) {
    if (file_exists('uploads/' . $post->photo)) {
        if ($post->photo != "default.jpg") {
            unlink('uploads/' . $post->photo);
        }
        $newPost->deletePost($_GET['id']);
    }
    header("Location: /");
    exit();
}

require_once "db/posts/deletePost.view.php";