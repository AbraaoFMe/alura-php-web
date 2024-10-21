<?php

use \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once '../vendor/autoload.php';

$connection = ConnectionCreator::createConnection();

$querySql = '
    INSERT INTO phones (id, area_code, number, student_id) VALUES
        (1, "61","999999999", 1),
        (2, "61","888888888", 1);
';

$connection->exec($querySql);