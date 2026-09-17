<?php
// Student exercise: trace the comment from input to the response.
$comment = $_POST['comment'] ?? '';

$connection = new PDO('mysql:host=localhost;dbname=course', 'course_app', 'development-password');
$statement = $connection->prepare('INSERT INTO comments (body) VALUES (:body)');
$statement->execute(['body' => $comment]);

$comments = $connection->query('SELECT body FROM comments ORDER BY id DESC')->fetchAll(PDO::FETCH_COLUMN);
foreach ($comments as $body) {
    // The value is inserted into an HTML response without output encoding.
    echo '<li>' . $body . '</li>';
}
