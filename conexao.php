<?php
$host = 'db';
$db   = 'crud_exemplo';
$user = 'usuario';
$pass = 'usuario_senha';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Adicionar informações detalhadas de debug
    $error_info = [
        'message' => $e->getMessage(),
        'host' => $host,
        'db' => $db,
        'user' => $user,
        'code' => $e->getCode()
    ];
    die("Erro de conexão: " . print_r($error_info, true));
}
?>
?>
