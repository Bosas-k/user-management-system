<?php
namespace App\Core;

abstract class AbstractUser {
    protected $name;
    protected $email;
    protected $password;

    abstract public function login($email, $password);
    abstract public function logout();
    abstract public function userType();
}
