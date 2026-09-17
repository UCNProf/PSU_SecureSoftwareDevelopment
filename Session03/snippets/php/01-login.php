<?php
// Student exercise: identify security issues in this login handler.
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$connection = new PDO(
    'mysql:host=localhost;dbname=course',
    'course_app',
    'development-password'
);

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
