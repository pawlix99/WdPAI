<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Library.php';
require_once __DIR__.'/../repository/LibraryRepository.php';


class LibraryController extends AppController
{
    private $libraryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->libraryRepository = new LibraryRepository();
    }

    public function my_library()
    {
        $books = $this->libraryRepository->getBooks();
        $this->render('my_library', ['books' => $books]);
    }

    public function giveLike()
    {
        $id = $_POST['id'];
        $this->libraryRepository->giveLike($id);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/my_library");
    }
}