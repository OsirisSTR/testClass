<?php
//session_start();
use App\models\PostData;
use App\db\components\queryHelper;

$postData=new PostData(new queryHelper());

if($_SESSION["id"]==null){
    header("Location:index.php");
    session_destroy();
    exit;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit;
}
$post=$postData->getOne($_GET['id']);
if (isset($_POST["btnDelPost"])){
    if ($post->photo!="default.jpg") {
        unlink("uploads/" . $post->photo);
    }
    $postData->deletePost($_GET['id']);
    header("Location: /");
    exit;
}

if (isset($_POST["btnBack"])){
    header("Location: /");
    exit;
}
require_once __DIR__."/../../views/posts/deletePost.view.php";
