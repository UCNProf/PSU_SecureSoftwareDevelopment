<?php
// Student exercise: trace the comment from input to the response.
$comment = $_POST['comment'] ?? '';

$connection = new PDO('sqlite:' . __DIR__ . '/course.db');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$connection->exec(<<<'SQL'
CREATE TABLE IF NOT EXISTS comments (
    id INTEGER PRIMARY KEY,
    body TEXT NOT NULL
);
SQL);

$statement = $connection->prepare('INSERT INTO comments (body) VALUES (:body)');
$statement->execute(['body' => $comment]);

$comments = $connection->query('SELECT body FROM comments ORDER BY id DESC')->fetchAll(PDO::FETCH_COLUMN);
foreach ($comments as $body) {
    // The value is inserted into an HTML response without output encoding.
    echo '<li>' . $body . '</li>';
}
