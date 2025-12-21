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
    <title>Lista Seguradoras</title>
    <link rel="shortcut icon" href="<?= BASE_URL; ?>images/icon_box.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="<?= BASE_URL; ?>images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/reset.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/lista_seguradoras.css">
    <script src="<?= BASE_URL; ?>js/sidebar.js" defer></script>
    <script src="<?= BASE_URL; ?>js/script.js" defer></script>
    <script src="<?= BASE_URL; ?>js/regex.js" defer></script>
</head>
<body>
    <div class="container">
        <?php require_once(__DIR__."/../sidebar.php"); ?>

        <main class="conteudo_principal">
            <header>
                <a href="<?= BASE_URL; ?>pages/front/cadastros/cadastrar_seguradora.php" class="btn_cadastrar_seguradora">
                    <i class='bx bx-plus'></i>
                    Cadastrar Seguradora
                </a>
            </header>
            <section class="lista_seguradoras">
                <div class="row">
                    <h1 class="titulo_sessao">Lista de seguradoras</h1>
                </div>
                <div class="row frame_seguradoras">
                    <?php
                        require_once(__DIR__."/../../back/listas/lista_seguradorasdb.php");

                        if($qtdTotalRegistros > 0) {
                            foreach($dados as $linha) {
                        
                    ?>

                    <div class="card_seguradora">
                        <img src="<?= BASE_URL; ?>uploads/<?= $linha['foto_seguradora']; ?>" alt="">
                        <h2 class="nomeSeguradora"><?= $linha['nome_seguradora']; ?></h2>
                        <span class="cnpjSeguradora"><span class="bold">CNPJ: </span> <span class="cnpj"><?= $linha['cnpj']; ?></span></span>
                    </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </section>
        </main>
    </div>
</body>
</html>