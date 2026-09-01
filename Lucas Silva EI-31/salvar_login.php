<?php

require_once ".../app/DLL.php";

extract($_POST);

$senha = md5($senha);

$sql = "INSERT INTO logins (login, senha) VALUES ('$login', '$senha')";

banco($server, $user, $password, $db, $sql);

header("Location: cadastro2.php");

?>