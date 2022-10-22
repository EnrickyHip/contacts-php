<?php

declare(strict_types=1);

require_once __DIR__ . "/database_config.php";

class Database {
  private static PDO $connection;

  private const HOST = DATABASE_HOST;
  private const NAME = DATABASE_NAME;
  private const USER = DATABASE_USER;
  private const PASSWORD = DATABASE_PASSWORD; 

  public static function get_database(): PDO {
    if (!isset(self::$connection)) {
      try {
        $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::NAME . ";charset=utf8mb4";
        self::$connection = new PDO($dsn, self::USER, self::PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } catch (PDOException $exception) {
        throw $exception->getMessage();
      }
    }

    return self::$connection;
  }
}