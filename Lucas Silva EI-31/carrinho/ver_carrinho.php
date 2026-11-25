
<?php
session_start();

include "../app/cons.php";
require_once "../app/DLL.php";

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

$consulta = "SELECT itens_carrinho.id_item_carrinho AS id_carrinho FROM carrinhos WHERE id_usuario = '$id_usuario'";

$resultado = banco($server, $user, $password, $db, $consulta);
$carrinho = $resultado->fetch_assoc();

$itens = false;

if ($carrinho) {
    $id_carrinho = $carrinho['id_carrinho'];

    $consulta = "SELECT itens_carrinho.id, produtos.nome, produtos.preco, itens_carrinho.quantidade FROM itens_carrinho
                 INNER JOIN produtos
                 ON itens_carrinho.id_produto = produtos.id_produto
                 WHERE itens_carrinho.id_carrinho = '$id_carrinho'";

    $itens = banco($server, $user, $password, $db, $consulta);
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="store">

    <div class="content">

        <h2>Seu Carrinho</h2>

        
    <?php
        if (!$itens || $itens->num_rows == 0) {
            echo "<p>Carrinho vazio</p>";
        } else {
            while ($produto = $itens->fetch_assoc()) {
    ?>
        <div class="card">
            <h3><?= $produto['nome'] ?></h3>
            <p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <p>Quantidade: <?= $produto['quantidade'] ?></p>

            <a class="cancelar" href="remover.php?id=<?= $produto['id_item_carrinho'] ?>">
                Remover
            </a>
        </div>
    <?php
        }
    }
    ?>

        <br>

        <a class="btn" href="../index.php"> Voltar </a>

        <a class="btn" href="salvar_venda.php"> Finalizar Compra </a>

    </div>

</body>

</html>