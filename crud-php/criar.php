<?php require_once 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
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
    margin-bottom: 20px;
    border: 2px solid #5CB338;
            border-radius: 12px;
            margin: 5px;
            padding: 6px;
            transition: transform .2s;}
        button:hover{
            color: white;
            background-color: #5CB338;
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <h1>Novo Produto</h1>
    <form action="atualizar.php" method="POST">
        <input type="hidden" name="action" value="create">
        
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>
        
        <label>Descrição:</label>
        <textarea name="descricao"></textarea><br><br>
        
        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" min="0" required><br><br>
        
        <button type="submit">Salvar</button>
    </form>
    <br>
    <a href="index.php">Voltar</a>
</body>
</html>