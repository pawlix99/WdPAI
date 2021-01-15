<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Book.php';

class BookRepository extends Repository
{

    public function getBook(int $id): ?Book
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM books WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($book == false) {
            return null;
        }

        return new Book(
            $book['title'],
            $book['author'],
            $book['image']
        );
    }

    public function addBook(Book $book): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO books (title, author, created_at, id_assigned_by, image)
            VALUES (?, ?, ?, ?, ?)
        ');

        $assingedById = 1;

        $stmt->execute([
            $book->getTitle(),
            $book->getAuthor(),
            $date->format('Y-m-d'),
            $assingedById,
            $book->getImage()

        ]);
    }

    public function getBooks(): array
    {
        $result = [];

        $stml = $this->database->connect()->prepare('
            SELECT * FROM books;
        ');
        $stml->execute();
        $books = $stml->fetchAll(PDO::FETCH_ASSOC);

        foreach ($books as $book) {
            $result[] = new Book(
                $book['title'],
                $book['author'],
                $book['image']
            );
        }

        return $result;
    }
}