<?php
session_start();
require 'autoload.php';
require 'db.php';

use App\Services\AuthService;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $authService = new AuthService($pdo);
    $result = $authService->loginUser($email, $password);

    if (str_contains($result, "successfully")) {
        $_SESSION['email'] = $email;
        header("Location: profile.php");
        exit;
    } else {
        $error = $result;
    }
}
?>
<form method="post">
    El. paštas: <input type="email" name="email" required><br>
    Slaptažodis: <input type="password" name="password" required><br>
    <button type="submit">Prisijungti</button>
</form>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>