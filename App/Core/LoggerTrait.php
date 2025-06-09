<?php
namespace App\Core;

trait LoggerTrait {
    public function log($message) {
        echo "[LOG]: $message<br>";
    }
}
