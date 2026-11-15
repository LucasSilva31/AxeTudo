<?php
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>

    <h1>Cadastrar Produto</h1>

    <form action="../processamento/processa_produto.php" method="POST" enctype="multipart/form-data">

        <label>Nome do produto:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>Descrição:</label>
        <textarea name="descricao" required></textarea>

        <br><br>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" required>

        <br><br>

        <label>Imagem:</label>
        <input type="file" name="imagem" accept="image/*" required>

        <br><br>

        <button type="submit">Cadastrar produto</button>

    </form>

</body>
</html>