<?php
session_start();
require 'autoload.php';
require 'db.php';

use App\Services\UserRepository;

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$userRepo = new UserRepository($pdo);
$user = $userRepo->getUserByEmail($_SESSION['email']);
?>
<h2>Profilis</h2>
<p>Vardas: <?= htmlspecialchars($user['name']) ?></p>
<p>El. paštas: <?= htmlspecialchars($user['email']) ?></p>
<p>Rolė: <?= htmlspecialchars($user['role']) ?></p>
<p><a href="logout.php">Atsijungti</a></p>