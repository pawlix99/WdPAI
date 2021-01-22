<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Book.php';
require_once __DIR__.'/../models/User.php';
require_once 'UserRepository.php';

class BookRepository extends Repository
{

    public function getBook(int $id): ?Book
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.books WHERE id = :id
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

        //TODO you should get this value from logged user session
        session_start();
        $assingedById = $_SESSION['userId'];

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

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM books ORDER BY id
        ');
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

    public function getBookByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM books WHERE LOWER(title) LIKE :search OR LOWER(author) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function vote(int $id)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE books SET total_votes = total_votes + 1 WHERE id = :id
        ');

        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function addRate(int $id, int $rate)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE books SET total_value = total_value + :rate WHERE id = :id
        ');

        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->bindParam(':rate',$rate, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getTopAverageBooks(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM books WHERE total_votes>0 ORDER BY total_value / total_votes DESC LIMIT 10 
        ');
        $stmt->execute();
        $averages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($averages as $book) {
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

    public function getTopVotedBooks(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM books WHERE total_votes>0 ORDER BY total_votes DESC LIMIT 10 
        ');
        $stmt->execute();
        $tops = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tops as $book) {
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


}