<?php

class Book
{
    public $title;
    public $author;

    public function displayBookInfo()
    {
        echo "Title: $this->title, Author: $this->author";
    }
}

class Library
{
    private $books = [];

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function displayAllBooks()
    {
        foreach ($this->books as $book) {
            $book->displayBookInfo();
            echo "<br>";
        }
    }
}

$book1 = new Book();
$book1->title = "The Catcher in the Rye";
$book1->author = "J.D. Salinger";

$book2 = new Book();
$book2->title = "To Kill a Mockingbird";
$book2->author = "Harper Lee";

$book3 = new Book();
$book3->title = "XYZ";
$book3->author = "Abc Mno";

$library = new Library();
$library->addBook($book3);
$library->addBook($book1);
$library->addBook($book2);

$library->displayAllBooks();
