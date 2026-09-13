<?php

include "app/cons.php";
require_once "app/DLL.php";

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

$data = date("Y-m-d");
$total = 0;

foreach ($produtos as $produto) {
    $preco = $produto['preco'];
    $total += $preco;
}

$consulta = "INSERT INTO vendidos (n_venda, usuario, data, total) VALUES ('$numero', '$usuario','$data', '$total')";
banco($server, $user, $password, $db, $consulta);

foreach ($produtos as $produto) {
    $nome = $produto['produto'];
    $preco = $produto['preco'];
    $consulta = "INSERT INTO itens_vendidos (n_venda, produto, preco) VALUES ('$numero', '$nome', '$preco')";
    banco($server, $user, $password, $db, $consulta);
}

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

                <p><?= $produto['produto'] ?> - R$ <?= $produto['preco'] ?></p>

            <?php } ?>
            <br>
            <p>Total: R$ <?= number_format($total, 2) ?> </p>
        </div>

        <a class="voltar" href="index.php">
            Voltar para loja
        </a>

    </div>

</body>

</html>