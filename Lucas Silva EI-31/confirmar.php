<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$produto = $_GET['produto'] ?? "";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Confirmar Compra</title>

    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
</head>

<body class="confirmacao-body">

    <div class="confirmacao-box">

        <h1>CONFIRMAR COMPRA</h1>

        <p class="mensagem">Produto selecionado:</p>

        <h2><?= $produto ?></h2>

        <div class="acoes">

            <a class="cancelar" href="index.php">Cancelar</a>

            <a class="voltar" href="salvar_venda.php?produto=<?= $produto ?>">
                Finalizar Compra
            </a>

        </div>

    </div>

</body>
</html>