<?php
namespace App\Services;

use App\Models\Admin;
use App\Models\RegularUser;

class AuthService {
    private $pdo;
    private $userRepo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userRepo = new UserRepository($pdo);
    }

    public function loginUser($email, $password) {
        $userData = $this->userRepo->getUserByEmail($email);
        if (!$userData) return "Vartotojas nerastas.";

        if (!password_verify($password, $userData['password'])) {
            return "Neteisingas slaptažodis.";
        }

        $user = $userData['role'] === 'admin'
            ? new Admin($userData['name'], $userData['email'], $userData['password'])
            : new RegularUser($userData['name'], $userData['email'], $userData['password']);

        return $user->login($email, $password);
    }
}
