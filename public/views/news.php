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
    <link rel="stylesheet" type="text/css" href="public/css/news.css">

    <script src="https://kit.fontawesome.com/55ca12752b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/statistics.js" defer></script>
    <title>NEWS</title>
</head>

<body>
<div class="base-container">
    <main>
        <header>
            <?php include('header.php')?>
        </header>
        <section class="news">
            <div id="center">
                <div id="headline">
                    <h3>Headline</h3>
                    <h2><a href="#">Aenean nisl elit</a></h2>
                    <p class="postmeta" style="margin-bottom:2px;">January 19th, 2021 | <a href="#">Add a Comment</a></p>
                    <div class="the_content"> <img src="public/uploads/headline.jpg" alt="" width="230" height="165" border="0" />
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel ante justo. Quisque massa mi, sodales vel purus sit amet, eleifend luctus tellus. Vivamus arcu ligula, laoreet sit amet convallis sit amet, consequat et tortor. </p>
                        <p>Pellentesque rhoncus luctus lectus, quis hendrerit nulla condimentum id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras congue ex velit, eget rhoncus sem molestie eget. Sed efficitur tincidunt tortor et fermentum. Integer consectetur laoreet orci. &#8230; <a href="#">Read entire article &raquo;</a></p>
                    </div>
                </div>
                <div class="featured-popular">
                <div id="featured">
                    <h3>Featured</h3>
                    <div class="spost">
                        <h2><a href="#">Nunc velit massa</a></h2>
                        <img src="public/uploads/featured1.jpg" alt="" width="95" height="80" border="0" />
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio ullamcorper odio aliquam porta vel &#8230; <a href="#">Read more &raquo;</a></p>
                    </div>
                    <div class="spbottom"></div>
                    <div class="spost">
                        <h2><a href="#">Donec lacinia</a></h2>
                        <img src="public/uploads/featured2.jpg" alt="" width="95" height="80" border="0" />
                        <p>Donec lacinia massa et arcu commodo sit amet aliquet urna vulputate. Phasellus eget vulputate metus. Nam lacinia &#8230; <a href="#">Read more &raquo;</a></p>
                    </div>
                    <div class="spbottom"></div>
                    <div class="spost">
                        <h2><a href="#">Donec nec lacus</a></h2>
                        <img src="public/uploads/featured3.jpg" alt="" width="95" height="80" border="0" />
                        <p>Donec nec lacus ligula, ac fringilla nisl. Donec a neque metus, id cursus nibh. Fusce ullamcorper commodo &#8230; <a href="#">Read more &raquo;</a></p>
                    </div>
                    <div class="spbottom"></div>
                </div>
                <div id="popular">
                    <h3>Popular</h3>
                    <div class="spost">
                        <h2><a href="#">Vivamus sit</a></h2>
                        <img src="public/uploads/popular1.JPG" alt="" width="95" height="80" border="0" />
                        <p>Vivamus sit amet nibh et tellus posuere facilisis. Nam orci augue, blandit in pharetra id, euismod non &#8230; <a href="#">Read more &raquo;</a></p>
                    </div>
                    <div class="spbottom"></div>
                    <div class="spost">
                        <h2><a href="#">Nam vestibulum ultrices</a></h2>
                        <img src="public/uploads/popular2.JPG" alt="" width="95" height="80" border="0" />
                        <p>Nam vestibulum ultrices lobortis. Donec ac mauris a nulla imperdiet ullamcorper at in sapien. Nullam tempus, elit &#8230; <a href="#">Read more &raquo;</a></p>
                    </div>
                    <div class="spbottom"></div>
                    <div class="spost">
                        <h2><a href="#">Lorem ipsum dolor</a></h2>
                        <img src="public/uploads/popular3.JPG" alt="" width="95" height="80" border="0" />
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio ullamcorper odio aliquam porta vel &#8230; <a href="#">Read more &raquo;</a></p>
                    </div>
                    <div class="spbottom"></div>
                </div>
                </div>
                <div id="latest">
                    <h3>Latest</h3>
                    <div class="spost">
                        <h2><a href="#">Phasellus accumsan</a></h2>
                        <img src="public/uploads/latest1.jpeg" alt="" width="150" height="105" border="0" />
                        <p>Donec lacinia massa et arcu commodo sit amet aliquet urna vulputate. Phasellus eget vulputate metus. Nam lacinia nisl quis nibh scelerisque eget suscipit tortor fringilla. Donec eu pulvinar tortor. Suspendisse malesuada faucibus eros, vitae molestie quam tempus commodo. Curabitur aliquet cursus viverra. Sed vel vestibulum quam. Curabitur pulvinar hendrerit justo vestibulum pulvinar. Nulla sit amet nunc felis, et consequat arcu. &#8230; <a href="#">Read entire article &raquo;</a></p>
                    </div>
                    <div class="spbottom"></div>
                    <div class="spost">
                        <h2><a href="#">Integer blandit</a></h2>
                        <img src="public/uploads/latest2.jpg" alt="" width="150" height="105" border="0" />
                        <p>Donec nec lacus ligula, ac fringilla nisl. Donec a neque metus, id cursus nibh. Fusce ullamcorper commodo magna at eleifend. Phasellus posuere tristique enim, at placerat mauris sollicitudin at. Duis aliquam lacinia orci vel pharetra. Nulla facilisi. Nunc et quam mi. Nullam fringilla mauris sollicitudin leo facilisis hendrerit. Maecenas non metus et ligula adipiscing volutpat. Aenean in leo diam, in &#8230; <a href="#">Read entire article &raquo;</a></p>
                    </div>
                    <div class="spbottom"></div>
                    <div class="spost">
                        <h2><a href="#">Aenean eros enim</a></h2>
                        <img src="public/uploads/latest3.jpg" alt="" width="150" height="105" border="0" />
                        <p>Vivamus sit amet nibh et tellus posuere facilisis. Nam orci augue, blandit in pharetra id, euismod non diam. Ut eget ultrices libero. Phasellus nec nisl a metus consectetur eleifend. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ultrices dui in lorem tincidunt pretium. Donec pellentesque tristique dui, eu tempus elit malesuada a. Quisque sit &#8230; <a href="#">Read entire article &raquo;</a></p>
                    </div>
                    <div class="spbottom"></div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>