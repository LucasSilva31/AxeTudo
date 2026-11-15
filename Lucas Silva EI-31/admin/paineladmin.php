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
    <title>Painel Administrativo</title>
</head>
<body>

    <h1>Painel Administrativo</h1>

    <h2>Bem-vindo, administrador!</h2>

    <a href="cadastrar_produto.php">Cadastrar produto</a>

</body>
</html>