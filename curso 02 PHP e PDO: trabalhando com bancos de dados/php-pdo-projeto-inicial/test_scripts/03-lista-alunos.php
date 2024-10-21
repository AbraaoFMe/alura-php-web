<?php

use Alura\Pdo\Domain\Model\Student;

require_once '../vendor/autoload.php';

$db_path = __DIR__ . "/banco.sqlite";
$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$query = "SELECT * FROM students;";

$statement = $pdo->query($query);
#var_dump($statement->fetchColumn(1)); exit();

$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData["id"],
        $studentData["name"],
        new \DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);