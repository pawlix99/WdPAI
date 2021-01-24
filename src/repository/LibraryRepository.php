<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Book.php';
require_once __DIR__.'/../models/Library.php';

class LibraryRepository extends Repository
{
    public function getBooks(): array
    {
        session_start();
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users_books ub LEFT JOIN books b
            ON ub.id_books = b.id WHERE id_users = :id_users
        ');
        $stmt->bindParam(':id_users', $_SESSION['userId'], PDO::PARAM_INT);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($books as $book) {
            $result[] = new Book(
                $book['title'],
                $book['author'],
                $book['image'],
                $book['total_votes'],
                $book['total_value'],
                $book['id']
            );
        }
        return $result;
    }

    public function giveLike(int $id): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_books (id_users, id_books)
            VALUES (?, ?)
        ');

        session_start();
        $id_users = $_SESSION['userId'];

        $stmt->execute([
            $id_users,
            $id
        ]);
    }
}