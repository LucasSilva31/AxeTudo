
<?php
include "../app/cons.php";
require_once "../app/DLL.php";

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$usuario = $_SESSION['usuario'];

$consulta = "SELECT id FROM carrinhos WHERE id_usuario = '$id_usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);
$carrinho = $resultado->fetch_assoc();

if (!$carrinho) {
    die("Carrinho não encontrado.");
}

$id_carrinho = $carrinho['id'];

$consulta = "SELECT produtos.id, produtos.nome, produtos.preco,
                    itens_carrinho.quantidade
             FROM itens_carrinho
             INNER JOIN produtos
             ON itens_carrinho.id_produto = produtos.id
             WHERE itens_carrinho.id_carrinho = '$id_carrinho'";

$resultado = banco($server, $user, $password, $db, $consulta);

$produtos = [];
$total = 0;

while ($produto = $resultado->fetch_assoc()) {
    $produtos[] = $produto;
    $total += $produto['preco'] * $produto['quantidade'];
}

if (count($produtos) == 0) {
    die("Carrinho vazio.");
}

$consulta = "INSERT INTO vendidos (id_usuario, data, total)
             VALUES ('$id_usuario', NOW(), '$total')";

banco($server, $user, $password, $db, $consulta);

$consulta = "SELECT id FROM vendidos
             WHERE id_usuario = '$id_usuario'
             ORDER BY id DESC LIMIT 1";

$resultado = banco($server, $user, $password, $db, $consulta);
$venda = $resultado->fetch_assoc();

$id_venda = $venda['id'];

foreach ($produtos as $produto) {
    $id_produto = $produto['id'];
    $nome = $produto['nome'];
    $preco = $produto['preco'];
    $quantidade = $produto['quantidade'];

    $consulta = "INSERT INTO itens_vendidos
                 (id_venda, id_produto, nome_produto, preco, quantidade)
                 VALUES ('$id_venda', '$id_produto', '$nome',
                         '$preco', '$quantidade')";

    banco($server, $user, $password, $db, $consulta);
}

$consulta = "DELETE FROM itens_carrinho
             WHERE id_carrinho = '$id_carrinho'";

banco($server, $user, $password, $db, $consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="confirmacao-body">
    <div class="confirmacao-box">
        <h1>COMPRA FINALIZADA</h1>

        <p class="mensagem">
            Obrigado pela compra,
            <span><?= $usuario ?></span>
        </p>

        <div class="info-compra">
            <p><strong>Pedido:</strong> #<?= $id_venda ?></p>
            <p><strong>Data:</strong> <?= date("d/m/Y") ?></p>

            <br>

            <?php foreach ($produtos as $produto) { ?>
                <p>
                    <?= $produto['nome'] ?>
                    (<?= $produto['quantidade'] ?>x)
                    - R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                </p>
            <?php } ?>

            <br>
            <p>Total: R$ <?= number_format($total, 2, ',', '.') ?></p>
        </div>

        <a class="voltar" href="../index.php">Voltar para loja</a>
    </div>
</body>
</html>
