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
    header("Location: {$url}/my_library");
}

if(isset($_GET['rankings'])=='activity') {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/rankings");
}

if(isset($_GET['logout'])=='activity') {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}

?>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/rankings.css">

    <script src="https://kit.fontawesome.com/55ca12752b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/statistics.js" defer></script>
    <title>RANKINGS</title>
</head>

<body>
<div class="base-container">
    <main>
        <header>
            <?php include('header.php')?>
        </header>
        <section class="rankings">
            <div class="averages">
                <h2>TOP 10 BOOKS BY AVERAGE</h2>
                <div class="top-averages">
                    <?php foreach ($averages as $book):?>
                        <div>
                            <img src="public/uploads/<?= $book->getImage(); ?>">
                            <div>
                                <h3><?= $book->getTitle(); ?></h3>
                                <p><?= $book->getAuthor(); ?></p>
                                <div>
                                    <i name="star" class="fas fa-star" style="color: yellow"></i>
                                    <div>
                                        <h5 name="average">(<?= $book->getAverageRate(); ?>)</h5>
                                        <h5 name="votes">(<?= $book->getTotalVotes(); ?>)</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="votes">
                <h2>TOP 10 BOOKS BY VOTES</h2>
                <div class="top-votes">
                    <?php foreach ($tops as $book):?>
                        <div id="<?= $book->getId(); ?>">
                            <img src="public/uploads/<?= $book->getImage(); ?>">
                            <div>
                                <h3><?= $book->getTitle(); ?></h3>
                                <p><?= $book->getAuthor(); ?></p>
                                <div>
                                    <i name="star" class="fas fa-star" style="color: yellow"></i>
                                    <div>
                                        <h5 name="average">(<?= $book->getAverageRate(); ?>)</h5>
                                        <h5 name="votes">(<?= $book->getTotalVotes(); ?>)</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </section>
    </main>
</div>
</body>