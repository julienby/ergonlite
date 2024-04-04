<?php
// config.php
namespace App\Config ;

// Dans config.php
class Database {
    private static $pdo = null;

    public static function getPDO() {
        if (self::$pdo === null) {
            // Initialiser PDO
            $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../');
            $dotenv->load();
            
            try {
                $pdoOptions = [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ];
                self::$pdo = new \PDO(
                    "sqlite:" . __DIR__ . DIRECTORY_SEPARATOR . '../Database/' . $_ENV['DB_FILE'],
                    null,
                    null,
                    $pdoOptions
                );
            } catch (\PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

