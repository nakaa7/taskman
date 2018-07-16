<?php
    define('ROOT', dirname(__DIR__));
    require_once(ROOT . '/vendor/liw/core/autoload.php');
    $config = require ROOT . '/config/web.php';
?>   
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Задачник рещающий все ваши проблемы.">
        <meta name="author" content="Антон Котов">
        <title>Задачник!</title>
        <link href="/web/assets/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal"><a class="p-2 text-dark" href="/">Задачник</a></h5>
            
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="/site/create">Создать задачу</a>
            </nav>
            <a class="btn btn-outline-primary" href="#">Вход</a>
        </div>
        <div class="album py-5 bg-light">
            <div class="container">
                <?php (new liw\core\Application($config))->run(); ?>
          
        </div>
        <footer class="pt-4 my-md-5 pt-md-5 border-top"></footer>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  
        <script src="/web/assets/bootstrap4/js/bootstrap.min.js"></script>
        <script src="/web/js/js.js"></script>
    </body>
</html>


