<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <title>Axé Store | Login</title>
</head>

<body class="auth-shell">

    <div class="auth-grid">

        <div class="auth-brand">
            <h1>AXÉ STORE</h1>
            <p>Acesso ao sistema de cadastro e vendas</p>
        </div>

        <div class="auth-panel">

            <form class="auth-form" action="processa_login.php" method="POST">

                <h2>ENTRAR</h2>

                <div class="input-group">
                    <label>LOGIN</label>
                    <input type="text" name="login" required>
                </div>

                <div class="input-group">
                    <label>SENHA</label>
                    <input type="password" name="senha" required>
                </div>

                <button type="submit">ACESSAR SISTEMA</button>

                <a class="link" href="cadastro1.php">Criar nova conta</a>

            </form>

        </div>

    </div>

</body>
</html>