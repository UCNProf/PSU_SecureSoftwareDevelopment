<?php
declare(strict_types=1);

$database = new PDO('sqlite:' . __DIR__ . '/books.db');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$database->exec(<<<'SQL'
CREATE TABLE IF NOT EXISTS books (
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL,
    author TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL
);
SQL);

$bookCount = (int) $database->query('SELECT COUNT(1) FROM books')->fetchColumn();
if ($bookCount === 0) {
    $seedBook = $database->prepare(
        'INSERT INTO books (title, author) VALUES (:title, :author)'
    );
    $seedBook->execute(['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald']);
    $seedBook->execute(['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee']);
    $seedBook->execute(['title' => '1984', 'author' => 'George Orwell']);
}

$userCount = (int) $database->query('SELECT COUNT(1) FROM users')->fetchColumn();
if ($userCount === 0) {
    $seedUser = $database->prepare(
        'INSERT INTO users (username, password_hash) VALUES (:username, :password_hash)'
    );
    $seedUser->execute([
        'username' => 'admin',
        'password_hash' => '482c811da5d5b4bc6d497ffa98491e38',
    ]);
    $seedUser->execute([
        'username' => 'alice',
        'password_hash' => '68b08847ad96dcd958117d03828ee75c',
    ]);
    $seedUser->execute([
        'username' => 'bob',
        'password_hash' => '12b141f35d58b8b3a46eea65e6ac179e',
    ]);
}

$term = (string) ($_GET['term'] ?? '');

$sql = "SELECT title, author FROM books WHERE title LIKE '%" . $term . "%'";
$rows = $database->query($sql)->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($rows, JSON_THROW_ON_ERROR);