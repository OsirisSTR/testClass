<?php
session_start();
use App\models\PostData;
use App\db\components\queryHelper;

if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit;
}
$post = $newPost->getData($_GET['id']);
if (!$post) {
    header("Location:/");
    exit;
}

if (count($_POST) > 0) {
    $_POST["id"] = $_GET['id'];

    $fileName = $_FILES["photo"]["name"];
    $fileTmpName = $_FILES["photo"]["tmp_name"];
    $fileType = $_FILES["photo"]["type"];
    $fileError = $_FILES["photo"]["error"];
    $fileSize = $_FILES["photo"]["size"];
    $fileExtension = strtolower(end(explode('.', $fileName)));
    $fileName = explode('.', $fileName)[0];

    $extension = ["jpg", "jpeg", "png"];
    if ($_FILES["photo"]["name"] != null) {

        if (in_array($fileExtension, $extension)) {
            if ($fileSize < 500000) {
                if ($fileError === 0) {
                    if ($post->photo != "default.jpg") {
                        unlink("uploads/" . $post->photo);
                    }
                    $_POST["photo"] = implode(".", [$fileName, $fileExtension]);
                }
            }
        } else {
            $_POST["photo"] = "default.jpg";
        }
    } else {
        $_POST["photo"] = $post->photo;
    }

    $id = $newPost->updatePost($_POST);
    if ($_FILES["photo"]["name"] != null) {
        if ($id != null) {
            $fileDestination = "uploads/" . $_POST["photo"];
            move_uploaded_file($fileTmpName, $fileDestination);
        }
    }

     header("Location: /");
      exit;
}

require_once "views/posts/updatePost.view.php";
