<?php
use Alura\Pdo\Domain\Model\Student;

require_once '../vendor/autoload.php';

$db_path = __DIR__ ."/banco.sqlite";
$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$student = new Student(null, 'Tiago Medeiros', new \DateTimeImmutable('2002-06-18'));

$query = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";

$statement = $pdo->prepare($query);

$statement->bindValue(":name", $student->name());
$statement->bindValue(":birth_date", $student->birthDate()->format('Y-m-d'));

if($statement->execute()){
    echo 'Aluno incluído' . PHP_EOL;
}
