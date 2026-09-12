<?php

include "../app/cons.php";
require_once "../app/DLL.php";

session_start();

extract($_POST);

$senha = md5($senha);

$sql_verifica = "SELECT * FROM logins WHERE login = '$login'";
$resultado = banco($server, $user, $password, $db, $sql_verifica);
$linha = $resultado->fetch_assoc();

if (!$linha) {
header("Location: login.php");
exit;
}

$senhaSalva = $linha['senha'];

if ($senha == $senhaSalva) {

    $_SESSION["usuario"] = $login;

    header("Location: index.php");
    exit;

} else {
    header("Location: login.php");
    exit;
}


?>