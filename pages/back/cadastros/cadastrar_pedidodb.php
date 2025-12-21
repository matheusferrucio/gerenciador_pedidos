<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $seguradora      = $_POST['selectSeguradora'];
        $numPedido       = filter_input(INPUT_POST, 'numPedido', FILTER_SANITIZE_SPECIAL_CHARS);
        $numSinistro     = filter_input(INPUT_POST, 'numSinistro', FILTER_SANITIZE_SPECIAL_CHARS);
        $dataPedido      = $_POST['dataPedido'];
        $valorPedido     = filter_input(INPUT_POST, 'valorPedido', FILTER_SANITIZE_SPECIAL_CHARS);
        $modeloVeiculo   = filter_input(INPUT_POST, 'modeloVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $anoVeiculo      = filter_input(INPUT_POST, 'anoVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $placaVeiculo    = filter_input(INPUT_POST, 'placaVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $chassiVeiculo   = filter_input(INPUT_POST, 'chassiVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $cnpjOficina     = filter_input(INPUT_POST, 'cnpjOficina', FILTER_SANITIZE_SPECIAL_CHARS);

        try {
            require_once("../conexao/connection.php");

            
        } catch (PDOException $erro) {
            echo("Não foi possível cadastrar pedido!");
            exit();
        }
    }
?>