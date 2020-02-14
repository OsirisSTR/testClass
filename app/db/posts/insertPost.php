<?php
session_start();

use App\models\PostData;
use App\db\components\queryHelper;

$postData=new PostData(new queryHelper());

if($_SESSION["id"]==null){
    header("Location:index.php");
    session_destroy();
    exit;
}

if (isset($_POST["btnPost"])){
    $_POST["datePublication"]=date(" Y-m-d");
    $_POST["id_user"]=$_SESSION["id"];

    $fileName=$_FILES["photo"]["name"];
    $fileTmpName=$_FILES["photo"]["tmp_name"];
    $fileType=$_FILES["photo"]["type"];
    $fileError=$_FILES["photo"]["error"];
    $fileSize=$_FILES["photo"]["size"];
    $fileExtension=strtolower(end(explode('.',$fileName)));
    $fileName=explode('.',$fileName)[0];

    $extension = ["jpg","jpeg","png"];
    if (in_array($fileExtension,$extension)){
        if ($fileSize<500000){
            if($fileError===0){
                $_POST["photo"]=implode(".",[$fileName,$fileExtension]);
            }
        }
    }
    else{
        $_POST["photo"]="default.jpg";
    }

    $postData->store($_POST);

//    if ($id!=null){
//        $fileDestination="uploads/".$_POST["photo"];
//        move_uploaded_file($fileTmpName,$fileDestination);
//    }
    header("Location: /");
    exit;
}

if (isset($_POST["back"])){
    header("Location: /");
    exit;
}
require_once __DIR__."/../../views/posts/insertPost.view.php";
