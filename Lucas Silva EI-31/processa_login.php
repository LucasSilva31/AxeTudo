<?php

session_start();

$login = $_POST['login'];
$senha = md5($_POST['senha']);

$arquivo = "logins/" . $login . ".dat";

if (file_exists($arquivo)) {

    $dados = file($arquivo);

    $senhaSalva = trim($dados[1]);

    if ($senha == $senhaSalva) {

        $_SESSION["usuario"] = $login;

        header("Location: index.php");
        exit;

    }

}

header("Location: login.php");
exit;

?>