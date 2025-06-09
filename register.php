<?php
require 'autoload.php';
require 'db.php';

use App\Services\UserRepository;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $email, $password, $role])) {
        echo "Registracija sėkminga. <a href='login.php'>Prisijungti</a>";
        exit;
    } else {
        echo "Klaida registruojant vartotoją.";
    }
}
?>
<form method="post">
    Vardas: <input type="text" name="name" required><br>
    El. paštas: <input type="email" name="email" required><br>
    Slaptažodis: <input type="password" name="password" required><br>
    Rolė:
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Registruotis</button>
</form>