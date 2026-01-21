<?php
    try {
        require_once(__DIR__."/../../conexao/connection.php");

        $query = "SELECT * FROM oficinas ORDER BY nome_oficina ASC";

        $dadosSelecionados = $conexao->query($query);

        $dados = $dadosSelecionados->fetchAll(PDO::FETCH_ASSOC);

        $qtdDadosSelecionados = $dadosSelecionados->rowCount();
    } catch (PDOException $erro) {
        echo "Não foi possível recuperar os dados";
        exit();
    }
?>