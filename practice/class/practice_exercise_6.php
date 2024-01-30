<?php

class Post
{
    public $title;
    public $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function displayPost()
    {
        echo "Title: {$this->title} <br> Author: {$this->author}";
    }
}

class Blog
{
    private $blog = [];

    public function addPost(Post $post)
    {
        $this->blog[] = $post;
    }

    public function displayAllPost()
    {
        foreach ($this->blog as $blog) {
            echo $blog->displayPost() . "<br><br>";
        }
    }
}

$post1 = new Post("Introduction to PHP", "Xyz Mno");
$post2 = new Post("Object-Oriented Programming", "Mno Abc");

$blog = new Blog();
$blog->addPost($post1);
$blog->addPost($post2);

$blog->displayAllPost();
