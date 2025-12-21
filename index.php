<?php
    session_start();

    require_once(__DIR__.'/pages/back/config.php');

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
    <title>Entrar na conta</title>
    <link rel="shortcut icon" href="images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/reset.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/forms.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="row">
                <h1>Entre na sua conta</h1>
            </div>
            <div class="row">
                <form action="pages/back/logindb.php" method="POST">
                    <div class="row">
                        <label for="cpfUsuario">CPF</label>
                        <input type="text" name="cpfUsuario" required>
                    </div>
                    <div class="row">
                        <label for="senhaUsuario">Senha</label>
                        <input type="password" name="senhaUsuario" required>
                    </div>
                    <div class="row">
                        <button type="submit" class="btnLogin">Entrar</button>
                    </div>
                    <div class="row mensagemCadastrar">
                        <p>Ainda não possui cadastro? <a href="<?= BASE_URL; ?>pages/front/cadastros/cadastrar.php" class="realce">Cadastre-se</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>