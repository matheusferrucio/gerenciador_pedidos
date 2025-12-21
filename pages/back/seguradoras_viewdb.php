<?php
    require_once(__DIR__."/../conexao/connection.php");

    try {
        $query = "SELECT * FROM seguradoras";

        $dadosSelecionados = $conexao->query($query);

        $dados = $dadosSelecionados->fetchAll();

        $qtdTotalRegistros = $dadosSelecionados->rowCount();
    } catch (PDOException $erro) {
        echo("Não foi possível recuperar as seguradoras cadastradas");
        exit();
    }
?>