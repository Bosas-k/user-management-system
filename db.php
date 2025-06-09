<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=user_management;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Nepavyko prisijungti prie duomenų bazės: " . $e->getMessage());
}
