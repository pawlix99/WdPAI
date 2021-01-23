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
    <link rel="stylesheet" type="text/css" href="public/css/my_library.css">

    <script src="https://kit.fontawesome.com/55ca12752b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/statistics.js" defer></script>
    <title>MY LIBRARY</title>
</head>

<body>
<div class="base-container">
    <main>
        <header>
            <?php include('header.php')?>
        </header>
        <section>
            <div class="books">
            <?php foreach ($books as $book):
                $name = $_SESSION['userId']."-". $book->getId();
                if(!isset($_COOKIE[$name])) {
                    $value = 0;
                    setcookie($name, $value);
                }
                ?>
                <div id="<?= $book->getId(); ?>">
                    <img src="public/uploads/<?= $book->getImage(); ?>">
                    <div>
                        <h4><?= $book->getTitle(); ?></h4>
                        <h5><?= $book->getAuthor(); ?></h5>
                        <fieldset id="<?= $name; ?>" class="rating" <?php echo ($_COOKIE[$name]>'0')?'disabled':'' ?>>
                            <input class="input5" type="radio" id="5<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="5" <?php echo ($_COOKIE[$name]=='5')?'checked':'' ?> /><label class="label5" for="5<?= $book->getId(); ?>" ></label>
                            <input class="input4" type="radio" id="4<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="4" <?php echo ($_COOKIE[$name]=='4')?'checked':'' ?> /><label class="label4" for="4<?= $book->getId(); ?>" ></label>
                            <input class="input3" type="radio" id="3<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="3" <?php echo ($_COOKIE[$name]=='3')?'checked':'' ?> /><label class="label3" for="3<?= $book->getId(); ?>" ></label>
                            <input class="input2" type="radio" id="2<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="2" <?php echo ($_COOKIE[$name]=='2')?'checked':'' ?> /><label class="label2" for="2<?= $book->getId(); ?>" ></label>
                            <input class="input1" type="radio" id="1<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="1" <?php echo ($_COOKIE[$name]=='1')?'checked':'' ?> /><label class="label1" for="1<?= $book->getId(); ?>" ></label>
                            <input class="<?= $book->getTotalVotes(); ?>" type="hidden" value="<?= $book->getTotalValue(); ?>"/>
                        </fieldset>
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