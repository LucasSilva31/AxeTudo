<?php

include "../app/cons.php";
require_once "../app/DLL.php";

if (!isset($_SESSION['id_usuario'])){
    header("location:../login.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$id_produto = $_GET['id'];

$consulta = "SELECT id FROM carrinhos WHERE id_usuario = '$id_usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);
$linha = $resultado->fetch_assoc();

if (!$linha) {
    $consulta = "INSERT INTO carrinhos (id_usuario) VALUES ('$id_usuario')";
    banco($server, $user, $password, $db, $consulta);

    $consulta = "SELECT id FROM carrinhos WHERE id_usuario = '$id_usuario'";
    $resultado = banco($server, $user, $password, $db, $consulta);
    $linha = $resultado->fetch_assoc();
}

?>