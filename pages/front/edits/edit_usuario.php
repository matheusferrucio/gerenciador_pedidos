<?php
    require_once(__DIR__."/../../back/_session.php");

    require_once(__DIR__."/../../back/config.php");

    require_once(__DIR__."/../../back/views/view_usuariodb.php");

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
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/perfilUsuario.css">
    <script src="<?= BASE_URL; ?>js/sidebar.js" defer></script>
    <script src="<?= BASE_URL; ?>js/script.js" defer></script>
    <script src="<?= BASE_URL; ?>js/regex.js" defer></script>
</head>
<body>
    <div class="container">
        <?php require_once(__DIR__."/../sidebar.php"); ?>

        <main class="conteudo_principal">
            <form action="<?= BASE_URL; ?>pages/back/edits/edit_usuariodb.php" class="form_cadastro_pedido" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="particao fotoPerfil">
                        <div class="moldura_foto">
                            <img src="<?= BASE_URL; ?>images/img_perfil.jpeg" alt="">
                        </div>
                    </div>

                    <div class="particao infoUsuario">
                        <div class="row column">
                            <div class="particao nome_usuario">
                                <label for="nomeUsuario">Nome</label>
                                <input 
                                    type="text" 
                                    name="nomeUsuario" 
                                    id="nomeUsuario" 
                                    value="<?= $dados['nome_usuario']; ?>">
                            </div>

                            <div class="particao">
                                <label for="cargoUsuario">Cargo</label>
                                <input 
                                    type="text" 
                                    name="cargoUsuario" 
                                    id="cargoUsuario" 
                                    value="<?= $dados['nome_cargo']; ?>"
                                    disabled>
                            </div>
                        </div>

                        <div class="row column">
                            <div class="particao">
                                <label for="emailUsuario">Email</label>
                                <input 
                                    type="text" 
                                    name="emailUsuario" 
                                    id="emailUsuario" 
                                    value="<?= $dados['email']; ?>">
                            </div>

                            <div class="particao">
                                <label for="cpfUsuario">CPF</label>
                                <input 
                                    type="text" 
                                    name="cpfUsuario" 
                                    id="cpfUsuario" 
                                    value="<?= $dados['cpf']; ?>"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    
                    <div class="particao botoes">
                        <button type="submit" class="btnCadastrar">Confirmar</button>
                        <a href="<?= BASE_URL; ?>pages/front/perfil_usuario.php" class="btnVoltar">Voltar</a>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>
</html>