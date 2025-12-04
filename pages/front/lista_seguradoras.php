<?php
    require_once("../back/_session.php");

    if(!isset($_SESSION['usuario'])){
        header("location:../../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Seguradoras</title>
    <link rel="shortcut icon" href="../../images/icon_box.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../../images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/sidebar.css">
    <link rel="stylesheet" href="../../css/lista_seguradoras.css">
    <script src="../../js/sidebar.js" defer></script>
    <script src="../../js/script.js" defer></script>
    <script src="../../js/regex.js" defer></script>
</head>
<body>
    <div class="container">
        <?php require_once("sidebar.php"); ?>

        <main class="conteudo_principal">
            <header>
                <a href="./cadastrar_seguradora.php" class="btn_cadastrar_seguradora">
                    <i class='bx bx-plus'></i>
                    Cadastrar Seguradora
                </a>
            </header>
            <section class="lista_seguradoras">
                <div class="row">
                    <h1 class="titulo_sessao">Lista de pedidos</h1>
                </div>
                <div class="row frame_seguradoras">
                    <?php
                        require_once("../back/seguradoras_viewdb.php");

                        if($qtdTotalRegistros > 0) {
                            foreach($dados as $linha) {
                        
                    ?>

                    <div class="card_seguradora">
                        <img src="../../uploads/<?= $linha['foto_seguradora']; ?>" alt="">
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