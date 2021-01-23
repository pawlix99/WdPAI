<?php

class Library {
    private $id_users;
    private $id_books;

    public function __construct($id_users, $id_books)
    {
        $this->id_users = $id_users;
        $this->id_books = $id_books;
    }

    public function getIdUsers()
    {
        return $this->id_users;
    }

    public function getIdBooks()
    {
        return $this->id_books;
    }
}
