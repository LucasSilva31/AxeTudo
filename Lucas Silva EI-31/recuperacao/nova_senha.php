<?php

$token = $_GET['token'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Axé Store | Nova senha</title>
</head>

<body class="auth-shell">

    <div class="auth-grid">

        <div class="auth-brand">
            <h1>NOVA SENHA</h1>
            <p>Cadastre uma nova senha para sua conta</p>
        </div>

        <div class="auth-panel">

            <form class="auth-form" action="salvar_nova_senha.php" method="POST">

                <h2>ALTERAR SENHA</h2>

                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

                <div class="input-group">
                    <label>NOVA SENHA</label>
                    <input type="password" name="senha" required>
                </div>

                <div class="input-group">
                    <label>CONFIRMAR SENHA</label>
                    <input type="password" name="confirmar_senha" required>
                </div>

                <button type="submit">SALVAR SENHA</button>

            </form>

        </div>

    </div>

</body>
</html>