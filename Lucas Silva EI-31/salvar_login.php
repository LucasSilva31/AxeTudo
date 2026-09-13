<?php

include "app/cons.php";
require_once "app/DLL.php";

extract($_POST);

$senha = md5($senha);
$consulta = "INSERT INTO logins (id, login, senha) VALUES (NULL, '$login', '$senha')";
banco($server, $user, $password, $db, $consulta);

$sql = "INSERT INTO logins (login, senha) VALUES ('$login', '$senha')";

banco($server, $user, $password, $db, $sql);

header("Location: login.php");

?>