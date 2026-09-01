<?php

require_once ".../app/DLL.php";

session_start();

extract($_POST);

$senha = md5($senha);

$sql_verifica = "SELECT * FROM logins WHERE login = '$login' and senha = '$senha'";
$resultado = banco($server, $user, $password, $db, $sql_verifica);
$linha = $resultado->fetch_assoc();

if ($linha) {
    header("Location: index.php");
}else{
    header("Location: login.php");
}

exit;

?>