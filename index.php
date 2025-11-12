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
                    <div class="row mensagemCadastrar">
                        <p>Ainda não possui cadastro? <a href="pages/front/cadastrar.php" class="realce">Cadastre-se</a></p>
                    </div>
                    <div class="row">
                        <button type="submit" class="btnLogin">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>