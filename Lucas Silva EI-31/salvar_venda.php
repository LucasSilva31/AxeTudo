<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = [];
}

$usuario = $_SESSION["usuario"];

$produtos = $_SESSION["carrinho"];

$numero = rand(1000, 9999);

$data = date("d/m/Y");

$dados = "Venda: $numero\n";
$dados .= "Usuário: $usuario\n";
$dados .= "Data: $data\n\n";

foreach ($produtos as $produto) {

    $dados .= "Produto: $produto\n";
}

file_put_contents("vendas/$numero.dat", $dados);

$_SESSION["carrinho"] = [];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Compra Finalizada</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="confirmacao-body">

    <div class="confirmacao-box">

        <h1>COMPRA FINALIZADA</h1>

        <p class="mensagem">
            Obrigado pela compra,
            <span><?= $usuario ?></span>
        </p>

        <div class="info-compra">

            <p><strong>Pedido:</strong> #<?= $numero ?></p>

            <p><strong>Data:</strong> <?= $data ?></p>

            <br>

            <?php foreach ($produtos as $produto) { ?>

                <p><?= $produto ?></p>

            <?php } ?>

        </div>

        <a class="voltar" href="index.php">
            Voltar para loja
        </a>

    </div>

</body>

</html>