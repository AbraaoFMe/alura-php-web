<?php
use Alura\Pdo\Domain\Model\Student;

require_once '../vendor/autoload.php';

$db_path = __DIR__ . "/banco.sqlite";
$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$query = "DELETE FROM students WHERE id = :id;";

$statement = $pdo->prepare($query);

$statement->bindValue(":id", 5, PDO::PARAM_INT);

if ($statement->execute()) {
    echo 'Aluno removido' . PHP_EOL;
}
