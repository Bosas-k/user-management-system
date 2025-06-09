<?php
namespace App\Models;

use App\Core\AbstractUser;
use App\Core\AuthInterface;
use App\Core\LoggerTrait;

class RegularUser extends AbstractUser implements AuthInterface {
    use LoggerTrait;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function userType() {
        return "Regular User";
    }

    public function login($email, $password) {
        if ($email === $this->email && password_verify($password, $this->password)) {
            $this->log("User {$this->name} logged in.");
            return "User logged in successfully.";
        }
        return "Neteisingas slaptažodis.";
    }

    public function logout() {
        $this->log("User {$this->name} logged out.");
        return "User logged out.";
    }
}
