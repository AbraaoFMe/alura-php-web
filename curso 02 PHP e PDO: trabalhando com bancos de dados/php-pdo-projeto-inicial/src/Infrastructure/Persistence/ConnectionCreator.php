<?php

namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite';
        $connection = new PDO(dsn: 'sqlite:' . $databasePath);
        // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}