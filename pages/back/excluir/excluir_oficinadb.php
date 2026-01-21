<?php
    require_once(__DIR__."/../../conexao/connection.php");

    require_once(__DIR__."/../config.php");

    $cnpj = filter_input(INPUT_GET, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);

    try {
        $query = $conexao->prepare("DELETE FROM oficinas 
                                    WHERE oficinas.cnpj = :cnpj");

        $query->execute([
            ":cnpj" => $cnpj
        ]);

        if ($query) {
            header("location:".BASE_URL."pages/front/listas/lista_oficinas.php");
            exit();
        }
    } catch (PDOException $erro) {
        echo "Não foi possível excluir o dados";
        exit();
    }
?>