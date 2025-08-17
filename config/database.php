<?php
$host = 'db';
$db   = 'faculdade';
$user = 'aluno';
$pass = 'senha123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
