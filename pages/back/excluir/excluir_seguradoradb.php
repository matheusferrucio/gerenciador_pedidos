<?php
    $id_seguradora = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        require_once(__DIR__."/../../conexao/connection.php");

        require_once(__DIR__."/../config.php");

        $query = $conexao->prepare("DELETE FROM seguradoras 
                                    WHERE seguradoras.id_seguradora = :id");

        // o PHP executa a query no if e já verifica se foi executado ou não
        if($query->execute([":id" => $id_seguradora])) {
            header("location:".BASE_URL."pages/front/listas/lista_seguradoras.php");
            exit();
        } 
    } catch(PDOException $erro) {
        echo "Não foi possível excluir o item";
        exit();
    }
?>