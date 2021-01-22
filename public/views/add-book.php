<!DOCTYPE html>
<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {} else {
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

if(isset($_GET['logout'])=='activity') {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}

?>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/books.css">

    <script src="https://kit.fontawesome.com/55ca12752b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/statistics.js" defer></script>
    <title>ADD BOOK</title>
</head>

<body>
<div class="base-container">
    <main>
        <header>
            <?php include('header.php') ?>
        </header>
            <section class="add-book">
                <div class="add-new-book">
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
                </div>
            </section>
        </main>
    </div>
</body>