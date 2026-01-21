<?php
    require_once(__DIR__."/../../conexao/connection.php");

    try {
        $query = "SELECT * FROM seguradoras ORDER BY nome_seguradora ASC";

        $dadosSelecionados = $conexao->query($query);

        $dados = $dadosSelecionados->fetchAll(PDO::FETCH_ASSOC);

        $qtdTotalRegistros = $dadosSelecionados->rowCount();
    } catch (PDOException $erro) {
        echo("Não foi possível recuperar as seguradoras cadastradas");
        exit();
    }
?>