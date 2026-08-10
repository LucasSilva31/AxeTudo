<?php

session_start();

if (!isset($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = [];
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body class="store">

    <div class="content">

        <h2>Seu Carrinho</h2>

        <?php

        if (count($_SESSION["carrinho"]) == 0) {

            echo "<p>Carrinho vazio</p>";

        } else {

            foreach ($_SESSION["carrinho"] as $indice => $produto) {
        ?>

                <div class="card">

                    <h3><?= $produto ?></h3>

                    <a class="cancelar" href="remover.php?indice=<?= $indice ?>">
                        Remover
                    </a>

                </div>

        <?php
            }
        }
        ?>

        <br>

        <a class="btn" href="index.php"> Voltar </a>

        <a class="btn" href="salvar_venda.php"> Finalizar Compra </a>

    </div>

</body>

</html>