<!DOCTYPE html>
<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo $_SESSION['userId'];
} else {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}

if(isset($_GET['home'])=='activity') {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/home");
}

if(isset($_GET['news'])=='activity') {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/news");
}

if(isset($_GET['my_library'])=='activity') {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/my library");
}

if(isset($_GET['rankings'])=='activity') {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/rankings");
}

if(isset($_GET['add-book'])=='activity') {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/addBook");
}

?>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/books.css">

    <script src="https://kit.fontawesome.com/55ca12752b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/search.js" defer></script>
    <script type="text/javascript" src="public/js/statistics.js" defer></script>
    <title>HOME</title>
</head>

<body>
<div class="base-container">
    <main>
        <header>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <a href="<?php isset($_GET['home']) ? $_SERVER['REQUEST_URI'] : null ?>?home=activity"" class="button">
                    <i class="fas fa-home"></i>
                    HOME
                    </a>
                </li>
                <li>
                    <a href="<?php isset($_GET['news']) ? $_SERVER['REQUEST_URI'] : null ?>?news=activity" class="button">
                        <i class="fas fa-newspaper"></i>
                        NEWS
                    </a>
                </li>
                <li>
                    <a href="<?php isset($_GET['my_library']) ? $_SERVER['REQUEST_URI'] : null ?>?my_library=activity" class="button">
                        <i class="fas fa-university"></i>
                        MY LIBRARY
                    </a>
                </li>
                <li>
                    <a href="<?php isset($_GET['rankings']) ? $_SERVER['REQUEST_URI'] : null ?>?rankings=activity" class="button">
                        <i class="fas fa-star"></i>
                        RANKINGS
                    </a>
                </li>
            </ul>
        </header>
            <section class="add-book">
                <h1>UPLOAD</h1>
                <form action="addBook" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name="title" type="text" placeholder="title">
                    <input name="author" type="text" placeholder="author">
                    <input type="file" name="file"/><br/>
                    <button type="submit">send</button>
                </form>
            </section>
        </main>
    </div>
</body>