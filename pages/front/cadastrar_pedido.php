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
    <title>Cadastrar pedido</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../../images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/sidebar.css">
    <link rel="stylesheet" href="../../css/forms_cadastros.css">
    <script src="../../js/sidebar.js" defer></script>
    <script src="../../js/script.js" defer></script>
</head>
<body>
    <div class="container">
        <?php require_once("sidebar.php"); ?>

        <main class="conteudo_principal">
            <form action="../back/cadastrar_pedidodb.php" class="form_cadastro_pedido" method="POST">
                <div class="row">
                    <h1 class="titulo_sessao">Cadastro de pedido</h1>
                </div>

                <div class="row">
                    <div class="particao">
                        <label for="numPedido">Número do pedido</label>
                        <input type="number" name="numPedido" id="numPedido" placeholder="Ex: 111222333">
                    </div>

                    <div class="particao">
                        <label for="numSinistro">Número do sinistro</label>
                        <input type="number" name="numSinistro" id="numSinistro" placeholder="Ex: 123654678_9">
                    </div>
                </div>

                <div class="row">
                    <?php
                        $array = ['Allianz', 'Porto Seguros', 'Zurich', 'Bem protege'];
                    ?>
                
                    <div class="particao">
                        <label for="selectSeguradora">Seguradora</label>
                        <select name="selectSeguradora" id="selectSeguradora" class="selectSeguradora">
                            <?php foreach($array as $arr){ ?>
                                <option value="<?= $arr; ?>"><?= $arr; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="particao">
                        <label for="numPedidoFabrica">Número do pedido de fábrica</label>
                        <input type="number" name="numPedidoFabrica" id="numPedidoFabrica" placeholder="Ex: 113483108">
                    </div>

                    <div class="particao">
                        <label for="dataPedido">Data do pedido</label>
                        <input type="date" name="dataPedido" id="dataPedido" placeholder="Ex: 29/11/2025">
                    </div>

                    <div class="particao">
                        <label for="valorPedido">Valor do pedido</label>
                        <input type="number" format="currency" name="valorPedido" id="valorPedido" placeholder="">
                    </div>
                </div>

                <div class="row">
                    <a class="btnVoltar" href="./lista_pedidos.php">Voltar</a>
                    <button type="submit" class="btnCadastrar">Cadastrar</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>