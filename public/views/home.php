<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/books.css">

    <script src="https://kit.fontawesome.com/55ca12752b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/search.js" defer></script>
    <title>HOME</title>
</head>

<body>
    <div class="base-container">
        <main>
            <header>
                <img src="public/img/logo.svg">
                <ul>
                    <li>
                        <a href="#" class="button">
                            <i class="fas fa-home"></i>
                            HOME
                        </a>
                    </li>
                    <li>
                        <a href="#" class="button">
                            <i class="fas fa-newspaper"></i>
                            NEWS
                        </a>
                    </li>
                    <li>
                        <a href="#" class="button">
                            <i class="fas fa-university"></i>
                            MY LIBRARY
                        </a>
                    </li>
                    <li>
                        <a href="#" class="button">
                            <i class="fas fa-star"></i>
                            RANKINGS
                        </a>
                    </li>
                </ul>
            </header>
            <section class="options">
                <div class="search-bar">
                    <input placeholder="search book/author">
                </div>
                <div class="add-book">
                    <a href="#" class="add-book-button">
                        <i class="fas fa-plus"></i> add book
                    </a>
                </div>
            </section>
            <section class="books">
                <?php foreach ($books as $book): ?>
                <div id="book-1">
                    <img src="public/uploads/<?= $book->getImage(); ?>">
                    <div>
                        <h3><?= $book->getTitle(); ?></h3>
                        <p><?= $book->getAuthor(); ?></p>
                        <i class="fas fa-star"> 10.0</i>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>

<template id="book-template">
    <div id="">
        <img src="">
        <div>
            <h3>title</h3>
            <p>author</p>
            <i class="fas fa-star"> 0.0</i>
        </div>
    </div>
</template>