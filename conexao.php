<?php
$host = getenv("DB_HOST") ?: "db";
$db   = getenv("DB_NAME") ?: "crud_exemplo";
$user = getenv("DB_USER") ?: "usuario";
$pass = getenv("DB_PASSWORD") ?: "usuario_senha";
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
    // Adicione este header para mostrar o erro completo
    header('Content-Type: text/plain');
    die("ERRO DE CONEXÃO:\n" . $e->getMessage() . "\n\n" .
        "Configuração usada:\n" .
        "Host: $host\n" .
        "Database: $db\n" .
        "User: $user\n" .
        "Password: " . ($pass ? '*****' : 'vazia'));
}

// Garanta que a variável $pdo está disponível globalmente
return $pdo;
?>
