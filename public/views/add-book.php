<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/books.css">

    <script src="https://kit.fontawesome.com/55ca12752b.js" crossorigin="anonymous"></script>
    <title>UPLOAD</title>
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
                    <textarea name="description" rows=5 placeholder="description"></textarea>

                    <input type="file" name="file"/><br/>
                    <button type="submit">send</button>
                </form>
            </section>
        </main>
    </div>
</body>