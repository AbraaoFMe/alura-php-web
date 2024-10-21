<?php
use Alura\Pdo\Domain\Model\Student;

require_once '../vendor/autoload.php';

$db_path = __DIR__ . "/banco.sqlite";
$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$student = new Student(null, 'Tiago Medeiros', new \DateTimeImmutable('2002-06-18'));

$injection_statement = "', ''); DROP TABLE students; ---";
$query = "INSERT INTO students (name, birth_date) VALUES ('{$injection_statement}', '{$student->birthDate()->format('Y-m-d')}');";


//Exclui a tabela
/*
if ($pdo->exec()) {
    echo 'Tabela Excluída?' . PHP_EOL;
}
*/

//Não exclui a tabela
$statement = $pdo->prepare($query);

if ($statement->execute()) {
    echo 'Tabela Excluída?' . PHP_EOL;
}

