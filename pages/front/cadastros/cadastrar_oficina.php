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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="<?= BASE_URL; ?>images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/reset.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/forms_cadastros.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/lista_oficinas.css">
    <script src="<?= BASE_URL; ?>js/sidebar.js" defer></script>
    <script src="<?= BASE_URL; ?>js/script.js" defer></script>
</head>
<body>
    <div class="container">
        <?php require_once(__DIR__."/../sidebar.php"); ?>

        <main class="conteudo_principal">
            <form action="<?= BASE_URL; ?>pages/back/cadastros/cadastrar_oficinadb.php" class="form_cadastro_pedido" method="POST">
                <div class="row">
                    <h1 class="titulo_sessao">Cadastro de oficina</h1>
                </div>

                <div class="row">
                    <div class="particao">
                        <label for="nomeOficina">Nome da oficina</label>
                        <input type="text" name="nomeOficina" id="nomeOficina" placeholder="Ex: oficina dois irmãos" required>
                    </div>

                    <div class="particao">
                        <label for="cnpjOficina">CNPJ da oficina</label>
                        <input 
                            type="text" 
                            name="cnpjOficina" 
                            id="cnpjOficina" 
                            placeholder="Ex: 00.000.000/0001-00" 
                            inputmode="numeric" 
                            maxlength="14"
                            required
                        >
                    </div>
                </div>

                <div class="row subtitulo_content">
                    <h2 class="subtitulo bold">Endereço da oficina</h2>
                </div>

                <div class="row">
                    <div class="particao">
                        <label for="cidadeOficina">Cidade</label>
                        <input type="text" name="cidadeOficina" id="cidadeOficina" placeholder="Ex: Araçatuba" required>
                    </div>

                    <div class="particao part2">
                        <label for="ruaOficina">Rua</label>
                        <input type="text" name="ruaOficina" id="ruaOficina" placeholder="Ex: Av Saudade" required>
                    </div>
                </div>

                <div class="row">
                    <div class="particao">
                        <label for="numEndOficina">Número</label>
                        <input type="text" name="numEndOficina" id="numEndOficina" placeholder="Ex: 1789" required>
                    </div>
                    
                    <div class="particao part2">
                        <label for="bairroOficina">Bairro</label>
                        <input type="text" name="bairroOficina" id="bairroOficina" placeholder="Ex: Saudade" required>
                    </div>

                    <div class="particao">
                        <label for="cepOficina">CEP</label>
                        <input type="text" name="cepOficina" id="cepOficina" placeholder="Ex: 16052-20" maxlength="8" required>
                    </div>
                </div>

                <div class="row">
                    <a class="btnVoltar" href="<?= BASE_URL; ?>pages/front/listas/lista_oficinas.php">Voltar</a>
                    <button type="submit" class="btnCadastrar">Cadastrar</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>