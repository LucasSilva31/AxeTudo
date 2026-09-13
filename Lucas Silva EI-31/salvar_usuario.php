<?php

include "app/cons.php";
require_once "app/DLL.php";

extract($_POST);

$consulta = "INSERT INTO usuarios (id, nome, cpf, endereco, bairro,cep, estado) VALUES (NULL, '$nome', '$cpf', '$endereco', '$bairro','$cep', '$estado')";
banco($server, $user, $password, $db, $consulta);



header("Location: cadastro2.php");

exit;

?>