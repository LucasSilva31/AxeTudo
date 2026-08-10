<?php

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$arquivo = "usuarios/" . $cpf . ".dat";

$dados = "";
$dados .= "Nome: $nome\n";
$dados .= "CPF: $cpf\n";
$dados .= "Endereco: $endereco\n";
$dados .= "Bairro: $bairro\n";
$dados .= "CEP: $cep\n";
$dados .= "Cidade: $cidade\n";
$dados .= "Estado: $estado\n";

file_put_contents($arquivo, $dados);

header("Location: cadastro2.php");

exit;

?>