<?php

session_start();

include "../app/cons.php";
require_once "../app/DLL.php";

extract($_POST);

$_SESSION['email_cadastro'] = $email;

$consulta = "INSERT INTO usuarios (id_usuario, nome, cpf, endereco, bairro,cep, estado, cidade) VALUES (NULL, '$nome', '$cpf', '$endereco', '$bairro','$cep', '$estado', '$cidade')";
banco($server, $user, $password, $db, $consulta);

$consulta = "SELECT id_usuario FROM usuarios WHERE cpf = '$cpf'";
$resultado = banco($server, $user, $password, $db, $consulta);
$linha = $resultado->fetch_assoc();

$_SESSION['id_usuario'] = $linha['id_usuario'];

header("Location: ../cadastro2.php");

exit;

?>