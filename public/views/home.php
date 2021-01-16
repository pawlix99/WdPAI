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
                        <fieldset class="rating">
                            <input class="input5" type="radio" id="5<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="5"/><label class="label5" for="5<?= $book->getId(); ?>" ></label>
                            <input class="input4" type="radio" id="4<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="4"/><label class="label4" for="4<?= $book->getId(); ?>" ></label>
                            <input class="input3" type="radio" id="3<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="3"/><label class="label3" for="3<?= $book->getId(); ?>" ></label>
                            <input class="input2" type="radio" id="2<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="2"/><label class="label2" for="2<?= $book->getId(); ?>" ></label>
                            <input class="input1" type="radio" id="1<?= $book->getId(); ?>" name="<?= $book->getId(); ?>" value="1"/><label class="label1" for="1<?= $book->getId(); ?>" ></label>
                        </fieldset>
                        <div>
                            <i class="fas fa-star" style="color: yellow"> (0.0)</i>
                            <i class="fas fa-plus" style="color: forestgreen"></i>
                        </div>
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
            <fieldset class="rating">
                <input class="input5" type="radio" id="" name="" value="5"/>
                <label class="label5" for="" ></label>
                <input class="input4" type="radio" id="" name="" value="4"/>
                <label class="label4" for="" ></label>
                <input class="input3" type="radio" id="" name="" value="3"/>
                <label class="label3" for="" ></label>
                <input class="input2" type="radio" id="" name="" value="2"/>
                <label class="label2" for="" ></label>
                <input class="input1" type="radio" id="" name="" value="1"/>
                <label class="label1" for="" ></label>
            </fieldset>
            <div>
                <i class="fas fa-star" style="color: yellow"> (0.0)</i>
                <i class="fas fa-plus" style="color: forestgreen"></i>
            </div>
        </div>
    </div>
</template>