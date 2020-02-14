<?php ?>
<html lang="ru">
<head>
    <title><?= $title ?></title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="my.ico">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Главная</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Посты</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Поиск..." aria-label="Search" name="find" value="<?=$search?>">
            <a class="btn btn-outline-success my-2 my-sm-0" href="../../index.php?=" name="search">Найти</a>
            <a class="btn btn-outline-info my-2 my-sm-0"

               href="../../registration.php"
               id="regisration" name="regisration">Регистрация</a>
            <a class="btn btn-outline-success my-2 my-sm-0"

               href="../../authorization.php"
               id="go" name="go">Войти</a>
            <a class="btn btn-outline-success my-2 my-sm-0"
               name="exit"
               style="display: <?php if ($_SESSION["user"] == null) {
                   echo 'none';
               } else echo '' ?>"

               id="go" name="go">Выйти</a>
        </form>
    </div>
</nav>
<div class="container">