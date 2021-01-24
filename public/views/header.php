<div class="logout">
    <a href="<?php isset($_GET['login']) ? $_SERVER['REQUEST_URI'] : null ?>?logout=activity" class="fas fa-power-off"></a>
</div>
<img src="public/img/logo.svg">
<ul>
    <li>
        <a href="<?php isset($_GET['home']) ? $_SERVER['REQUEST_URI'] : null ?>?home=activity" class="button">
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
