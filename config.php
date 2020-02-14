<?php
return[
    "host" => "localhost",
    "db" => "practice_posts",
    "login" => "root",
    "pass" => "",
    "opt" => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
];