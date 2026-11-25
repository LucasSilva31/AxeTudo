<?php

session_start();

include "../app/cons.php";
require_once "../app/DLL.php";

extract($_POST);

$id_usuario = $_SESSION['id_usuario'];
$email = $_SESSION['email_cadastro'];

$senha = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO logins (id_usuario, login, senha, email, nivel) VALUES ('$id_usuario','$login', '$senha', '$email', 'cliente')";

banco($server, $user, $password, $db, $sql);

unset($_SESSION['email_cadastro']);
unset($_SESSION['id_usuario']);

header("Location: ../login.php");
exit;

?>