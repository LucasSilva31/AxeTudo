<?php

include "../app/cons.php";
require_once "../app/DLL.php";

session_start();

extract($_POST);

$sql_verifica = "SELECT * FROM logins WHERE login = '$login'";
$resultado = banco($server, $user, $password, $db, $sql_verifica);
$linha = $resultado->fetch_assoc();

if (!$linha || !password_verify($senha, $linha['senha'])) {
    header("Location: ../login.php");
    exit;
}

$_SESSION["usuario"] = $login;
$_SESSION["nivel"] = $linha['nivel'];
$_SESSION["id_usuario"] = $linha['id_usuario'];

if ($_SESSION['nivel'] == 'admin') {
    header("Location: ../admin/paineladmin.php");
} else {
    header("Location: ../index.php");
}

exit;


?>