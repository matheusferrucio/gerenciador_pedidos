<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cpf_usuario = filter_input(INPUT_POST, 'cpfUsuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha_usuario = filter_input(INPUT_POST, 'senhaUsuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        try {
            require_once("../conexao/connection.php");

            $query = "SELECT * FROM usuarios WHERE cpf = :cpf";

            $query = $conexao->prepare($query);

            $query->execute(array(
                ":cpf" => $cpf_usuario
            ));

            if ($query->rowCount() > 0) {
                $linha = $query->fetch(); // cria um array com os dados recuperados

                if ($senha_usuario == $linha['senha']) {
                    header("location:../front/home.php");
                    exit();
                }
                else {
                    header("location:../../index.php");
                    exit();
                }
            }
            else {
                echo("Usuário não encontrado");
            }
        } catch (PDOException $erro) {
            echo("Erro ao inserir os dados no banco!");
            exit();
        }
    }
    else {
        echo ("Erro ao recuperar os dados!");
        exit();
    }
?>