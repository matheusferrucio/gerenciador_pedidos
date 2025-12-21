<?php
    require_once(__DIR__."/../../back/_session.php");

    require_once(__DIR__."/../../back/config.php");

    if(!isset($_SESSION['usuario'])){
        header("location:".BASE_URL."index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="shortcut icon" href="<?= BASE_URL; ?>images/icon_box.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="<?= BASE_URL; ?>images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/reset.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/lista_pedidos.css">
    <script src="<?= BASE_URL; ?>js/sidebar.js" defer></script>
    <script src="<?= BASE_URL; ?>js/script.js" defer></script>
</head>
<body>
    <div class="container">
        <?php require_once(__DIR__."/../sidebar.php"); ?>

        <main class="conteudo_principal">
            <header>
                <a href="<?= BASE_URL; ?>pages/front/cadastros/cadastrar_pedido.php" class="btn_cadastrar_pedido">
                    <i class='bx bx-plus'></i>
                    Cadastrar pedido
                </a>
            </header>
            <section class="lista_pedidos">
                <div class="row">
                    <h1 class="titulo_sessao">Lista de pedidos</h1>
                </div>
                <div class="row frame_pedidos">
                    <a href="<?= BASE_URL; ?>pages/front/views/view_pedido.php" class="card_pedido">
                        <div class="borda_lateral"></div>

                        <div class="conteudo_card_pedido">
                            <div class="informacao placa">
                                <span class="sub_titulo">Placa</span>
                                <h2 class="inf_titulo">aaa-1234</h2>
                            </div>

                            <div class="informacao oficina">
                                <span class="sub_titulo">Oficina</span>
                                <h2 class="inf_titulo">Exemplo de nome oficina</h2>
                            </div>

                            <div class="informacao valor_pedido">
                                <span class="sub_titulo">Valor pedido</span>
                                <h2 class="inf_titulo">R$ 9153,70</h2>
                            </div>
                            
                            <div class="informacao qtd_pecas">
                                <span class="sub_titulo">Qtd peças</span>
                                <h2 class="inf_titulo">3</h2>
                            </div>

                            <div class="informacao status_pedido">
                                <span class="sub_titulo">Status</span>
                                <h2 class="inf_titulo status_pedido">Ativo</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </section>
        </main>
    </div>
</body>
</html>