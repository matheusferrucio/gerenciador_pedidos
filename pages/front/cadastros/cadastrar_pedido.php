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
</head>
<body>
    <div class="container">
        <?php 
            require_once(__DIR__."/../sidebar.php"); 

            require_once(__DIR__."/../../conexao/connection.php");
            
            require_once(__DIR__."/../../back/_dataViews.php");

            // recupera todos os nomes de seguradora existentes no banco
            $listaSeguradoras = nomesSeguradorasView($conexao);

            // recupera todos os status existentes no banco
            $listaStatus = statusPedidosView($conexao);
        ?>

        <main class="conteudo_principal">
            <form action="<?= BASE_URL; ?>pages/back/cadastrar_pedidodb.php" class="form_cadastro_pedido" method="POST">
                <div class="row">
                    <h1 class="titulo_sessao">Cadastro de pedido</h1>
                </div>

                <!-- ========== SESSÃO DAS INFORMAÇÕES DO PEDIDO DA SEGURADORA ========== -->
                <div class="row subtitulo_content">
                    <h2 class="subtitulo bold">Informações do pedido da Seguradora</h2>
                </div>

                <div class="row">
                    <div class="particao">
                        <label for="selectSeguradora">Seguradora<span class="obrigatorio">*</span></label>
                        <select name="selectSeguradora" id="selectSeguradora" class="selectSeguradora" required>
                            <?php
                                foreach($listaSeguradoras as $list) {
                            ?>

                            <option value="<?= $list["id_seguradora"]; ?>"><?= $list["nome_seguradora"]; ?></option>

                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="particao">
                        <label for="numPedido">Número do pedido<span class="obrigatorio">*</span></label>
                        <input type="text" name="numPedido" id="numPedido" placeholder="Ex: 111222333" required>
                    </div>

                    <div class="particao">
                        <label for="numSinistro">Número do sinistro<span class="obrigatorio">*</span></label>
                        <input type="text" name="numSinistro" id="numSinistro" placeholder="Ex: 123654678_9" required>
                    </div>

                    <div class="particao">
                        <label for="dataPedido">Data do pedido<span class="obrigatorio">*</span></label>
                        <input type="date" name="dataPedido" id="dataPedido" placeholder="Ex: 29/11/2025" required>
                    </div>

                    <div class="particao">
                        <label for="valorPedido">Valor do pedido<span class="obrigatorio">*</span></label>
                        <input type="text" name="valorPedido" id="valorPedido" placeholder="R$ 1000,00" required>
                    </div>
                </div>

                <!-- ========== SESSÃO DAS INFORMAÇÕES DO VEÍCULO ========== -->
                <div class="row subtitulo_content">
                    <h2 class="subtitulo bold">Informações do veículo</h2>
                </div>

                <div class="row">
                    <div class="particao">
                        <label for="modeloVeiculo">Modelo do veículo<span class="obrigatorio">*</span></label>
                        <input type="text" name="modeloVeiculo" id="modeloVeiculo" placeholder="Ex: HR-V Touring">
                    </div>

                    <div class="particao">
                        <label for="anoVeiculo">Ano do veículo</label>
                        <input type="text" name="anoVeiculo" id="anoVeiculo" placeholder="Ex: 2025">
                    </div>

                    <div class="particao">
                        <label for="placaVeiculo">Placa do veículo</label>
                        <input type="text" name="placaVeiculo" id="placaVeiculo" placeholder="Ex: ABC-0Y12">
                    </div>

                    <div class="particao">
                        <label for="chassiVeiculo">Chassi do veículo</label>
                        <input type="text" name="chassiVeiculo" id="chassiVeiculo" placeholder="Ex: 93HRV2870LK101202">
                    </div>
                </div>

                <!-- ========== SESSÃO DAS INFORMAÇÕES DA OFICINA ========== -->
                <div class="row subtitulo_content">
                    <h2 class="subtitulo bold">Informações da oficina</h2>
                </div>

                <div class="row">
                    <div class="particao">
                        <label for="cnpjOficina">CNPJ da oficina<span class="obrigatorio">*</span></label>
                        <input type="text" name="cnpjOficina" id="cnpjOficina" placeholder="Ex: 00.000.000/0001-00">
                    </div>
                </div>
                
                <!-- ========== SESSÃO FINAL DOS BOTÕES DE VOLTAR E CADASTRAR ========== -->
                <div class="row">
                    <a class="btnVoltar" href="<?= BASE_URL; ?>pages/front/listas/lista_pedidos.php">Voltar</a>
                    <button type="submit" class="btnCadastrar">Cadastrar</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>