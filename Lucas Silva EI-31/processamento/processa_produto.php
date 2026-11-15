<?php

session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

include "../app/cons.php";
require_once "../app/DLL.php";

extract($_POST);

$imagem = $_FILES['imagem'];

$nomeImagem = $imagem['name'];
$temporario = $imagem['tmp_name'];

$caminho = "../img/" . $nomeImagem;

move_uploaded_file($temporario, $caminho);

$caminho = "img/" . $nomeImagem;

$sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES ('$nome', '$descricao', '$preco', '$caminho')";

banco($server, $user, $password, $db, $sql);

header("Location:../admin/paineladmin.php");
exit;

?>