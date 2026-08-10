<?php

session_start();

if (!isset($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = [];
}

if (isset($_GET["produto"])) {

    $produto = $_GET["produto"];

    $_SESSION["carrinho"][] = $produto;
}

header("Location: index.php");

exit;

?>