<?php 
$pdo = require 'conexao.php';

try {
    $pdo->query("SELECT 1");
} catch (PDOException $e) {
    die("Falha na verificação de conexão: " . $e->getMessage());
}?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Crud PHP</title>
    <style>
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        body{display: flex;
            flex-direction: column;
            align-items: center;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
        button{border: 2px solid #3FA2F6;
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
    <h1>Produtos</h1>
    <a href="criar.php"><button>Adicionar Novo Produto</button></a>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        <?php
        $sql = "SELECT * FROM produtos";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()):
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nome']) ?></td>
            <td><?= htmlspecialchars($row['descricao']) ?></td>
            <td>R$ <?= number_format($row['preco'], 2, ',', '.') ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                <a href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
