<?php
require_once __DIR__ . '/classes/book.php';
$book = new Book();

$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$mascot = $_POST['mascot'];
$remark = $_POST['remark'];
$report = $_POST['report'];

$book->insertBook($title, $author, $genre, $word, $url, $status, $cp, $fandom, $dramacd, $mascot, $remark);
$bookId = $book->getBookId($title);
$book->insertReport($bookId, $report);
