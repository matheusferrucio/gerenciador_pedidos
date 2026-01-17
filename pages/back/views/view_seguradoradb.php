<?php
    require_once(__DIR__."/../../conexao/connection.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $query = $conexao->prepare("SELECT * FROM seguradoras WHERE seguradoras.id_seguradora = :id");

        $query->execute([
            ":id" => $id
        ]);

        $dados = $query->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            return $dados;
        }
    } catch (PDOException $erro) {
        echo "Algo deu errado!";
        exit();
    }
?>