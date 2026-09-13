<?php
session_start();
?>

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

    <title>Axé Store</title>
</head>

<body class="store">

    <header class="topbar">
        <h1>AXÉ STORE</h1>

        <nav>
            <?php if (isset($_SESSION["usuario"])) { ?>

                <span>Olá, <?php echo $_SESSION["usuario"]; ?></span>
                <a href="ver_carrinho.php">Carrinho</a>
                <a href="sair.php">Sair</a>

            <?php } else { ?>

                <a href="login.php">Login</a>
                <a href="cadastro1.php">Cadastro</a>

            <?php } ?>
        </nav>
    </header>

    <main class="content">

        <h2>Produtos</h2>

        <div class="grid">

            <div class="card">
                <img class="img" src="img/colar.jpeg">
                <h3>Colar de Contas</h3>
                <p>Colar tradicional artesanal</p>
                <span class="price">R$ 49,90</span>
                <a class="btn" href="carrinho.php?produto=Colar de Contas&preco=49.90">Comprar</a>
            </div>

            <div class="card">
                <img class="img" src="img/guia.jpeg">
                <h3>Guia Proteção</h3>
                <p>Amuleto de proteção espiritual</p>
                <span class="price">R$ 39,90</span>
                <a class="btn" href="carrinho.php?produto=Guia Proteção&preco=39.90">Comprar</a>
            </div>

            <div class="card">
                <img class="img" src="img/pulseira.jpeg">
                <h3>Pulseira Axé</h3>
                <p>Pulseira simbólica artesanal</p>
                <span class="price">R$ 29,90</span>
                <a class="btn" href="carrinho.php?produto=Pulseira Axé&preco=29.90">Comprar</a>
            </div>

            <div class="card">
                <img class="img" src="img/pingente.jpeg">
                <h3>Pingente Odum</h3>
                <p>Pingente de proteção e fé</p>
                <span class="price">R$ 59,90</span>
                <a class="btn" href="carrinho.php?produto=Pingente Odum&preco=59.90">Comprar</a>
            </div>

        </div>

    </main>

</body>
</html>