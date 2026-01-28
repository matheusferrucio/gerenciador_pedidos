<?php
    require_once(__DIR__."/../../conexao/connection.php");

    $cnpj = $_GET['cnpj'];

    try {
        $query = $conexao->prepare("SELECT * FROM oficinas O WHERE O.cnpj = :cnpj");

        $query->execute([
            ":cnpj" => $cnpj 
        ]);

        $dados = $query->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            return $dados;
        }
    } catch (PDOException $erro) {
        echo "Não foi possível recuperar os dados da oficina";
        exit();
    }
?>