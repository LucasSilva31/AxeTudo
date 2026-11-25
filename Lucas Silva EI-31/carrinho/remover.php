
<?php
session_start();

include "../app/cons.php";
require_once "../app/DLL.php";

$id_usuario = $_SESSION['id_usuario'];
$id_item = $_GET['id'];

$consulta = "SELECT id FROM carrinhos WHERE id_usuario = '$id_usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);
$carrinho = $resultado->fetch_assoc();

if ($carrinho) {
    $id_carrinho = $carrinho['id'];

    $consulta = "DELETE FROM itens_carrinho
                 WHERE id = '$id_item'
                 AND id_carrinho = '$id_carrinho'";

    banco($server, $user, $password, $db, $consulta);
}

header("Location: ver_carrinho.php");
exit;
?>
