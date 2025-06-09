<?php
namespace App\Models;

use App\Core\AbstractUser;
use App\Core\AuthInterface;
use App\Core\LoggerTrait;

class Admin extends AbstractUser implements AuthInterface {
    use LoggerTrait;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function userType() {
        return "Admin";
    }

    public function login($email, $password) {
        if ($email === $this->email && password_verify($password, $this->password)) {
            $this->log("Admin {$this->name} logged in.");
            return "Admin logged in successfully.";
        }
        return "Neteisingas slaptažodis.";
    }

    public function logout() {
        $this->log("Admin {$this->name} logged out.");
        return "Admin logged out.";
    }
}
