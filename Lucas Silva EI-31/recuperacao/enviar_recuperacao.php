<?php

include "../app/cons.php";
require_once "../app/DLL.php";
require_once "../../vendor/autoload.php";

$configSMTP = require "C:/xampp/config/smtp.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];

$sql = "SELECT * FROM logins WHERE email = '$email'";
$resultado = banco($server, $user, $password, $db, $sql);

$usuario = $resultado->fetch_assoc();

if ($usuario) {

    $token = bin2hex(random_bytes(32));
    $expiracao = date('Y-m-d H:i:s', strtotime('+30 minutes'));

    $sql = "UPDATE logins
            SET token_recuperacao = '$token',
                expiracao_token = '$expiracao'
            WHERE id = ".$usuario['id'];

    banco($server, $user, $password, $db, $sql);

    $link = "http://localhost/AxeTudo/Lucas%20Silva%20EI-31/recuperacao/nova_senha.php?token=" . $token;

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->Username = $configSMTP['usuario'];
        $mail->Password = $configSMTP['senha'];

        $mail->setFrom($configSMTP['usuario'], 'Axé Store');
        $mail->addAddress($usuario['email']);

        $mail->isHTML(true);
        $mail->Subject = 'Recuperacao de senha - Axe Store';

        $mail->Body = "
            <h2>Recuperação de senha</h2>
            <p>Recebemos uma solicitação para alterar sua senha.</p>
            <p>Clique no link abaixo para continuar:</p>
            <a href='$link'>Alterar minha senha</a>
            <p>O link é válido por 30 minutos.</p>
        ";

        $mail->send();

        echo "Um link de recuperação foi enviado para seu e-mail.";

    } catch (Exception $e) {

        echo "Não foi possível enviar o e-mail.";

    }

} else {

    echo "E-mail não cadastrado.";

}

?>