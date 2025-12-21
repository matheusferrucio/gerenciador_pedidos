<?php
    // Criei essa função para recuperar os nomes das seguradoras
    // e utilizar no meu select de cadastro
    function nomesSeguradorasView($conexao) {
        try {
            $query = "SELECT * FROM seguradoras";

            $dadosSelecionados = $conexao->query($query);

            $linha = $dadosSelecionados->fetchAll();
            
            if ($dadosSelecionados->rowCount() > 0) {
                return $linha;
            } else {
                echo("Nenhum dado foi encontrado!");
                exit();
            }
        } catch (PDOException $erro) {
            echo("Não foi possível recuperar os dados");
            exit();
        }
    }

    // Criei essa função para recuperar os nomes dos status de pedido,
    // assim consigo criar um select dinâmico com os valores do banco
    function statusPedidosView($conexao) {
        try {
            $query = "SELECT * FROM statuspedido";

            $dadosSelecionados = $conexao->query($query);

            $linha = $dadosSelecionados->fetchAll();

            if ($dadosSelecionados->rowCount() > 0) {
                return $linha;
            } else {
                echo("Nenhum dado foi encontrado!");
                exit();
            }       
        } catch (PDOException $erro) {
            echo("Não foi possível recuperar os dados");
            exit();
        }
    }
?>