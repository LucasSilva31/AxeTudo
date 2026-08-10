<?php

session_start();

if (isset($_GET["indice"])) {

    $indice = $_GET["indice"];

    unset($_SESSION["carrinho"][$indice]);

    $_SESSION["carrinho"] = array_values($_SESSION["carrinho"]);
}

header("Location: ver_carrinho.php");

exit;

?>