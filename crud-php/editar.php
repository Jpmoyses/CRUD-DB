<?php
require_once 'conexao.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$produto = $stmt->fetch();

if (!$produto) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <style>
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        body{display: flex;
        flex-direction: column;
        align-items: center;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
    form{
        display: flex;
        flex-direction: column;
        align-items:stretch;
        gap: 10px;
        width: 400px;
    }
    button{width: 100px;
        align-self: center;
        border: 2px solid #3FA2F6;
        border-radius: 12px;
        margin: 5px;
        padding: 6px;
        transition: transform .2s;}
    button:hover{
        color: white;
        background-color: #3FA2F6;
        transform: scale(1.2);
    }
    </style>
</head>
<body>
    <h1>Editar Produto</h1>
    <form action="atualizar.php" method="POST">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required><br><br>
        
        <label>Descrição:</label>
        <textarea name="descricao"><?= htmlspecialchars($produto['descricao']) ?></textarea><br><br>
        
        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" min="0" value="<?= $produto['preco'] ?>" required><br><br>
        
        <button type="submit">Atualizar</button>
    </form>
    <br>
    <a href="index.php">Voltar</a>
</body>
</html>