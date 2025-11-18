<?php
    session_start();

    if (isset($_SESSION['usuario'])) {
        header("location:pages/front/home.php");
        exit();
    }

    if (isset($_COOKIE['lembrar_me'])) {
        list($selector, $validator) = explode(':', $_COOKIE['lembrar_me']);

        if ($selector && $validator) {
            $check_hashed_validator = hash('sha256', $validator);

            require_once('pages/conexao/connection.php');

            $check_token_query = $conexao->prepare(
                "SELECT u.cpf, t.hashed_validator
                 FROM usuarios u
                 JOIN tokens t ON t.cpf_usuario = u.cpf
                 WHERE t.selector = :selector AND t.expires > NOW()"
            );

            $check_token_query->execute(array(
                ':selector' => $selector
            ));

            $db_token_data = $check_token_query->fetch();

            if ($db_token_data && $check_hashed_validator === $db_token_data['hashed_validator']) {
                $_SESSION['usuario'] = $db_token_data['cpf'];

                header("location:pages/front/home.php");
                exit();
            } else {
                // limpa o cookie
                setcookie('lembrar_me', '', time() - 3600, '/');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar na conta</title>
    <link rel="shortcut icon" href="images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/forms.css">
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
                    <div class="row row_lembrar_me">
                        <input type="checkbox" name="lembrar_me" class="input_chekcbox">
                        <label for="lembrar_me">Lembrar-me</label>
                    </div>
                    <div class="row">
                        <button type="submit" class="btnLogin">Entrar</button>
                    </div>
                    <div class="row mensagemCadastrar">
                        <p>Ainda não possui cadastro? <a href="pages/front/cadastrar.php" class="realce">Cadastre-se</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>