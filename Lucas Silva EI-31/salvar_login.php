<?php

$login = $_POST['login'];
$senha = md5($_POST['senha']);

$dados = "";
$dados .= "Login: $login\n";
$dados .= "$senha\n";

file_put_contents("logins/" . $login . ".dat", $dados);

header("Location: login.php");

exit;

?>