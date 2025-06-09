<?php
require 'autoload.php';
require 'db.php';

use App\Services\AuthService;

// Sukuriame autentifikavimo paslaugą
$authService = new AuthService($pdo);

// Testavimui: prisijungimo bandymai
echo "<h3>Admin Login Test:</h3>";
echo $authService->loginUser("ignas@example.com", "admin123") . "<br><br>";

echo "<h3>Regular User Login Test:</h3>";
echo $authService->loginUser("jonas@example.com", "user123") . "<br><br>";
