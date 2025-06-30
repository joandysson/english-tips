<?php

namespace App\Config\Database;

use PDO;
use PDOException;
/**
 * class Connection
 */
abstract class Connection
{
    /**
     * @var PDO $conn
     */
    protected static PDO $conn;

    public function __construct()
    {
        self::connect();
    }

    /**
     * @return void
     */
    private static function connect(): void
    {
        try {
            $db = getenv();
            $options = [
                PDO::ATTR_TIMEOUT => 2,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_general_ci'
            ];

            self::$conn = new PDO(
                $db['DB_DRIVER'] . ':host=' . $db['DB_HOST'] . ';dbname=' . $db['DB_NAME'] . ';charset=utf8',
                $db['DB_USER'],
                $db['DB_PASSWORD'],
                $options
            );

            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insert(string $table, string $fields, string $data, array $arrayData): void
    {
        self::$conn->beginTransaction();
        try {
            $sql = "INSERT into {$table} ({$fields}) VALUES ({$data});";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($arrayData);

            self::$conn->commit();
        } catch (PDOException $e) {
            self::$conn->rollBack();
            echo $e->getMessage();
        }
    }
}
