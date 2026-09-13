<?php

session_start();

if (!isset($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = [];
}

if (isset($_GET["produto"])) {

    $produto = $_GET["produto"];
    $preco = $_GET["preco"];

    $_SESSION["carrinho"][] = ["produto"=>$produto,"preco"=>$preco];
}

header("Location: index.php");

exit;

?>