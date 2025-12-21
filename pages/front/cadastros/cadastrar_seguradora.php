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
    <title>Cadastrar pedido</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="<?= BASE_URL; ?>images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/reset.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/forms_cadastros.css">
    <script src="<?= BASE_URL; ?>js/sidebar.js" defer></script>
    <script src="<?= BASE_URL; ?>js/script.js" defer></script>
    <script src="<?= BASE_URL; ?>js/regex.js" defer></script>
</head>
<body>
    <div class="container">
        <?php require_once(__DIR__."/../sidebar.php"); ?>

        <main class="conteudo_principal">
            <form action="<?= BASE_URL; ?>pages/back/cadastros/cadastrar_seguradoradb.php" class="form_cadastro_pedido" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <h1 class="titulo_sessao">Cadastro de seguradora</h1>
                </div>

                <div class="row">
                    <div class="particao">
                        <label for="nomeSeguradora">Nome da seguradora</label>
                        <input type="text" name="nomeSeguradora" id="nomeSeguradora" placeholder="">
                    </div>

                    <div class="particao">
                        <label for="cnpjSeguradora">CNPJ da seguradora</label>
                        <input 
                            type="text" 
                            name="cnpjSeguradora" 
                            id="cnpjSeguradora" 
                            placeholder="Ex: 00.000.000/0001-00" 
                            inputmode="numeric" 
                            maxlength="14"
                        >
                    </div>

                    <div class="particao">
                        <label for="fotoSeguradora">Foto seguradora</label>
                        <label for="fotoSeguradora" class="label_input_file">
                            <i class='bx bx-image-add'></i>
                            Escolher foto
                        </label>
                        <input type="file" name="fotoSeguradora" id="fotoSeguradora" placeholder="">
                    </div>
                </div>

                <div class="row">
                    <a class="btnVoltar" href="<?= BASE_URL; ?>pages/front/listas/lista_seguradoras.php">Voltar</a>
                    <button type="submit" class="btnCadastrar">Cadastrar</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>