<?php
use App\models\PostData;
use App\db\components\queryHelper;

$postData=new PostData(new queryHelper());
$postData->getAllPosts();