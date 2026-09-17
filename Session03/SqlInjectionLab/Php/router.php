<?php

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

if ($path === '/' || $path === '/search') {
    require __DIR__ . '/index.php';
    return true;
}

http_response_code(404);
echo 'Not found';