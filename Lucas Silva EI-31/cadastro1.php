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

    <title>Axé Store | Cadastro</title>
</head>

<body class="auth-shell">

    <div class="auth-grid">
        <div class="auth-brand">
            <h1>CADASTRO</h1>
            <p>Crie sua conta para acessar o sistema</p>
        </div>

        <div class="auth-panel">

            <form class="auth-form" action="salvar_usuario.php" method="POST">

                <h2>DADOS PESSOAIS</h2>

                <div class="input-group">
                    <label>NOME COMPLETO</label>
                    <input type="text" name="nome" required>
                </div>

                <div class="input-group">
                    <label>CPF</label>
                    <input type="text" name="cpf" required>
                </div>

                <div class="input-group">
                    <label>ENDEREÇO</label>
                    <input type="text" name="endereco" required>
                </div>

                <div class="input-group">
                    <label>BAIRRO</label>
                    <input type="text" name="bairro" required>
                </div>

                <div class="input-group">
                    <label>CEP</label>
                    <input type="text" name="cep" required>
                </div>

                <div class="input-group">
                    <label>CIDADE</label>
                    <input type="text" name="cidade" required>
                </div>

                <div class="input-group">
                    <label>ESTADO</label>
                    <input type="text" name="estado" required>
                </div>

                <button type="submit">CONTINUAR</button>

            </form>

        </div>
    </div>

</body>
</html>