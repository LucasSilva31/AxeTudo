<?php

require_once ".../app/DLL.php";

extract($_POST);

$sql = "INSERT INTO usuarios (nome, cpf, endereco, bairro, cep, cidade, estado) VALUES ('$nome','$cpf', '$endereco', '$bairro', '$cep', '$cidade', '$estado')";

banco($server, $user, $password, $db, $sql);

header("Location: cadastro2.php");

exit;

?>