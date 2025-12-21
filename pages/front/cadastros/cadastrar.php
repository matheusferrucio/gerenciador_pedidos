<?php
    session_start();

    require_once(__DIR__.'/../../back/config.php');

    if (isset($_SESSION['usuario'])) {
        header("location:".BASE_URL."pages/front/home.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="shortcut icon" href="<?= BASE_URL; ?>/images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/reset.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/forms.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="row">
                <h1>Cadastre sua conta</h1>
            </div>
            <div class="row">
                <form action="../../back/cadastrardb.php" method="POST">
                    <div class="row particao">
                        <div>
                            <label for="cpfUsuario">Digite seu CPF</label>
                            <input type="text" name="cpfUsuario">
                        </div>
                        <div>
                            <label for="nomeUsuario">Digite seu nome</label>
                            <input type="text" name="nomeUsuario">
                        </div>
                    </div>
                    <div class="row">
                        <label for="emailUsuario">E-mail</label>
                        <input type="email" name="emailUsuario" required>
                    </div>
                    <div class="row">
                        <label for="senhaUsuario">Senha</label>
                        <input type="password" name="senhaUsuario" required>
                    </div>
                    <div class="row">
                        <button type="submit" class="btnLogin">Cadastrar</button>
                    </div>
                    <div class="row mensagemCadastrar">
                        <p>Já possui cadastro? <a href="<?= BASE_URL; ?>index.php" class="realce">Entre na sua conta.</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>