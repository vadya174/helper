<?php

namespace app\models;

use App\db\components\QueryHelper;

class PostData
{
    protected $db;

    public function __construct(QueryHelper $db)
    {
        $this->db = $db;
    }
    public function getPostId($id)
    {
        $stmt=$this->db->prepare("SELECT * FROM posts where id=:id");
        if($stmt->execute(["id"=>$id])){
            return $stmt->fetch();
        };
        return null;
    }

    public function getOne($id)
    {
        return $this->db->getOne("posts",$id);
    }

    public function getAllPosts()
    {
        $posts= $this->db->getAll("posts","datePublication");
        require_once __DIR__. "/../views/posts/index.view.php";
    }

    public function insertPost($data)
    {
        $stmt = $this->db->prepare("INSERT INTO posts (title,description,datePublication,photo,user_id)
        values (:title,:description,:datePublication,:photo,:user_id)");
        if ($stmt->execute([
            "title" => $data["title"],
            "description" => $data["description"],
            "datePublication" => $data["datePublication"],
            "photo"=>$data["photo"],
            "user_id"=>$data["user_id"]
        ])) {
            return $this->db->lastInsertId();
        };
        return -1;
    }

    public function deletePost($id)
    {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id=:id");
        if ($stmt->execute(["id" => $id])) {
            return 1;
        };
        return -1;
    }


    public function updatePost($data)
    {
        $stmt = $this->db->prepare("UPDATE posts  set title=:title, description=:description,photo=:photo
                                              WHERE id=:id");
        if ($stmt->execute([
            "title" => $data["title"],
            "description" => $data["description"],
            "photo" => $data["photo"],
            "id" => $data["id"]])) {
            return 1;
        };
        return -1;
    }
}
