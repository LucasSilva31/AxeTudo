
<?php
session_start();

include "../app/cons.php";
require_once "../app/DLL.php";

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$id_produto = $_GET['id'];

$consulta = "SELECT id_carrinho FROM carrinhos WHERE id_usuario = '$id_usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);
$linha = $resultado->fetch_assoc();

if (!$linha) {
    $consulta = "INSERT INTO carrinhos (id_usuario) VALUES ('$id_usuario')";
    banco($server, $user, $password, $db, $consulta);

    $consulta = "SELECT id_carrinho FROM carrinhos WHERE id_usuario = '$id_usuario'";
    $resultado = banco($server, $user, $password, $db, $consulta);
    $linha = $resultado->fetch_assoc();
}

$id_carrinho = $linha['id_carrinho'];

$consulta = "SELECT * FROM produtos WHERE id_produto = '$id_produto'";
$resultado = banco($server, $user, $password, $db, $consulta);
$produto = $resultado->fetch_assoc();

if ($produto) {
    $consulta = "SELECT id_item_carrinho, quantidade FROM itens_carrinho WHERE id_carrinho = '$id_carrinho' AND id_produto = '$id_produto'";

    $resultado = banco($server, $user, $password, $db, $consulta);
    $item = $resultado->fetch_assoc();

    if ($item) {
        $quantidade = $item['quantidade'] + 1;

        $consulta = "UPDATE itens_carrinho SET quantidade = '$quantidade' WHERE id_item_carrinho = '".$item['id_item_carrinho']."'";
    } else {
        $consulta = "INSERT INTO itens_carrinho (id_carrinho, id_produto, quantidade) VALUES ('$id_carrinho', '$id_produto', 1)";
    }

    banco($server, $user, $password, $db, $consulta);
}

header("Location: ver_carrinho.php");
exit;
?>
