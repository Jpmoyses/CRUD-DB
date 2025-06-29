<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'] ?? '';
    $preco = $_POST['preco'];

    if ($action === 'create') {
        $sql = "INSERT INTO produtos (nome, descricao, preco) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $descricao, $preco]);
    } 
    elseif ($action === 'update') {
        $id = $_POST['id'];
        $sql = "UPDATE produtos SET nome = ?, descricao = ?, preco = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $descricao, $preco, $id]);
    }
}

header('Location: index.php');
exit;
?>