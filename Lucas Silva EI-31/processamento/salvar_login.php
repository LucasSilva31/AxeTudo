<?php

session_start();

include "../app/cons.php";
require_once "../app/DLL.php";

extract($_POST);

$email = $_SESSION['email_cadastro'];

$senha = md5($senha);

$sql = "INSERT INTO logins (login, senha, email) VALUES ('$login', '$senha', '$email')";

banco($server, $user, $password, $db, $sql);

unset($_SESSION['email_cadastro']);

header("Location: ../login.php");
exit;

?>