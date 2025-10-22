<?php

namespace App\Core;

class Database {
    private static $pdo;

    public static function getConnection() {
        if (self::$pdo === null) {
            try {
                $dbPath = __DIR__ . '/../../database/app.db';
                self::$pdo = new \PDO('sqlite:' . $dbPath);

                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die("Veritabanı bağlantısı başarısız: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}