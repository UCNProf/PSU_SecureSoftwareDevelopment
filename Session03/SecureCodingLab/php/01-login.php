<?php
// Student exercise: identify security issues in this login handler.
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$connection = new PDO('sqlite:' . __DIR__ . '/course.db');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$connection->exec(<<<'SQL'
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL
);
SQL);

$userCount = (int) $connection->query('SELECT COUNT(1) FROM users')->fetchColumn();
if ($userCount === 0) {
    $seedUsers = $connection->prepare(
        'INSERT INTO users (username, password_hash) VALUES (:username, :password_hash)'
    );
    $seedUsers->execute([
        'username' => 'admin',
        'password_hash' => '482c811da5d5b4bc6d497ffa98491e38',
    ]);
    $seedUsers->execute([
        'username' => 'alice',
        'password_hash' => '68b08847ad96dcd958117d03828ee75c',
    ]);
    $seedUsers->execute([
        'username' => 'bob',
        'password_hash' => '12b141f35d58b8b3a46eea65e6ac179e',
    ]);
}

$sql = "SELECT id, username, password_hash FROM users
        WHERE username = '$username'";
$user = $connection->query($sql)->fetch(PDO::FETCH_ASSOC);

if ($user && $password === $user['password_hash']) {
    session_start();
    $_SESSION['user_id'] = $user['id'];
    echo 'Login successful';
} else {
    echo 'Invalid login';
}
