<?php

include "../app/cons.php";
require_once "../app/DLL.php";

$token = $_POST['token'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar_senha'];

if ($senha != $confirmar) {

    echo "As senhas não são iguais.";

} else {

    $sql = "SELECT * FROM logins WHERE token_recuperacao = '$token' AND expiracao_token > NOW()";
    $resultado = banco($server, $user, $password, $db, $sql);
    $usuario = $resultado->fetch_assoc();

    if ($usuario) {

        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "UPDATE logins SET senha = '$senha', token_recuperacao = NULL, expiracao_token = NULL WHERE id = ".$usuario['id'];
        banco($server, $user, $password, $db, $sql);

        echo "Senha alterada com sucesso!";
        
        header("location:../login.php");
        exit;

    } else {
        echo "Link inválido ou expirado.";

    }

}

?>