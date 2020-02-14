<?php
namespace App\models;
use App\db\components\queryHelper;

class PostData
{
    protected $pdo;

    public function __construct(queryHelper $db)
    {
        $this->pdo=$db;
    }

    public function getAllPosts()
    {
        $posts = $this->pdo->getAll("posts");
        require_once __DIR__."/../views/posts/index.view.php";
    }

    public function getOne($id){
        return $this->pdo->getOne("posts",$id);
    }

    public function store($data)
    {
        $temp["datePublication"] = date("Y-m-d");
        $temp["title"]=$data["title"];
        $temp["description"]= $data["description"];
        $temp["photo"]=$data["photo"];
        $temp["id_user"]=rand(1,2);

        $this->pdo->store("posts",$temp);

    }

    public function deletePost($id)
    {
        $this->pdo->delete("posts",$id,"id_user");
    }

    public function getData($id)
    {
        $this->pdo->getOne("posts",$id,"id_user");
    }

    public function updatePost($data)
    {
        $temp["datePublication"] = date("Y-m-d");
        $temp["title"]=$data["title"];
        $temp["description"]= $data["description"];
        $temp["photo"]=$data["photo"];

        $this->pdo->update("posts",$temp,"id_user");
    }


}