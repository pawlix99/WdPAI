<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index() {
        //TODO display login.html
        $this->render('login');
    }

    public function home() {
        //TODO display home.html
        $this->render('home');
    }

    public function news() {
        //TODO display home.html
        $this->render('news');
    }
    
    public function library() {
        //TODO display home.html
        $this->render('my library');
    }

    public function rankings() {
        //TODO display home.html
        $this->render('rankings');
    }
}