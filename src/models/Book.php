<?php

class Book {
    private $title;
    private $author;
    private $image;
    private $total_votes;
    private $total_value;
    private $id;


    public function __construct($title, $author, $image, $total_votes = 0, $total_value = 0, $id = null)
    {
        $this->title = $title;
        $this->author = $author;
        $this->image = $image;
        $this->total_votes = $total_votes;
        $this->total_value = $total_value;
        $this->id = $id;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getTotalVotes(): int
    {
        return $this->total_votes;
    }

    public function setTotalVotes(int $total_votes): void
    {
        $this->total_votes = $total_votes;
    }

    public function getTotalValue(): int
    {
        return $this->total_value;
    }

    public function setTotalValue(int $total_value): void
    {
        $this->total_value = $total_value;
    }

    public function getAverageRate(): float
    {
        $votes = $this->getTotalVotes();
        $value = $this->getTotalValue();
        if($votes == 0) return 0.0;
        return round($value/$votes, 2);
    }

}