<?php
session_start();

include "app/cons.php";
require_once "app/DLL.php";

$sql = "SELECT * FROM produtos";
$resultado = banco($server, $user, $password, $db, $sql);
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
                <a href="carrinho/ver_carrinho.php">Carrinho</a>
                <a href="processamento/sair.php">Sair</a>

            <?php } else { ?>

                <a href="login.php">Login</a>
                <a href="cadastro1.php">Cadastro</a>

            <?php } ?>
        </nav>
    </header>

    <main class="content">

        <h2>Produtos</h2>

        <div class="grid">

            <?php while ($produto = $resultado->fetch_assoc()) { ?>

                <div class="card">
                    <img class="img" src="<?php echo $produto['imagem']; ?>">

                    <h3><?php echo $produto['nome']; ?></h3>

                    <p><?php echo $produto['descricao']; ?></p>

                    <span class="price">
                        R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                    </span>

                    <a class="btn" href="carrinho/carrinho.php?id=<?php echo $produto['id_produto']; ?>">
                        Comprar
                    </a>
                </div>

            <?php } ?>

        </div>

    </main>

</body>
</html>