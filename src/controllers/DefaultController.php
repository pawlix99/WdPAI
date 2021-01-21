<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index() {
        $this->render('login');
    }

    public function news() {
        $this->render('news');
    }

    public function my_library() {
        $this->render('my_library');
    }

    public function rankings() {
        $this->render('rankings');
    }
}