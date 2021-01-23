<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Book.php';
require_once __DIR__.'/../repository/BookRepository.php';

class BookController extends AppController
{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $bookRepository;

    public function __construct()
    {
        parent::__construct();
        $this->bookRepository = new BookRepository;
    }

    public function home()
    {
        $books = $this->bookRepository->getBooks();
        $likedBooks = $this->bookRepository->getLikedBooks();
        $this->render('home', ['books' => $books, 'likedBooks' => $likedBooks]);
    }

    public function rankings()
    {
        $averages = $this->bookRepository->getTopAverageBooks();
        $tops = $this->bookRepository->getTopVotedBooks();
        $this->render('rankings', ['averages' => $averages, 'tops' => $tops]);
    }

    public function addBook()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $book = new Book($_POST['title'], $_POST['author'], $_FILES['file']['name']);
            $this->bookRepository->addBook($book);

            return $this->render('home', [
                'messages' => $this->message,
                'books' => $this->bookRepository->getBooks()
            ]);
        }

        return $this->render('add-book', ['messages' => $this->message]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->bookRepository->getBookByTitle($decoded['search']));
        }
    }

    public function vote(int $id) {
        $this->bookRepository->vote($id);
        http_response_code(200);
    }

    public function addRate(int $id, int $rate) {
        $this->bookRepository->addRate($id, $rate);
        http_response_code(200);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }

}
