<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Axé Store | Recuperar senha</title>
</head>

<body class="auth-shell">

    <div class="auth-grid">
        <div class="auth-brand">
            <h1>RECUPERAR SENHA</h1>
            <p>Informe seu e-mail para continuar</p>
        </div>

        <div class="auth-panel">

            <form class="auth-form" action="enviar_recuperacao.php" method="POST">

                <h2>ESQUECEU SUA SENHA?</h2>

                <div class="input-group">
                    <label>E-MAIL CADASTRADO</label>
                    <input type="email" name="email" required>
                </div>

                <button type="submit">ENVIAR LINK</button>

            </form>

        </div>
    </div>

</body>
</html>