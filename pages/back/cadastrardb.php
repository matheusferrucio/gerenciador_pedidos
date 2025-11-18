<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cpf_usuario   = filter_input(INPUT_POST, 'cpfUsuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_usuario  = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $email_usuario = filter_input(INPUT_POST, 'emailUsuario', FILTER_SANITIZE_EMAIL);
        $senha_usuario = filter_input(INPUT_POST, 'senhaUsuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        try {
            require_once("../conexao/connection.php");

            $query = $conexao->prepare(
                "INSERT INTO usuarios (
                    cpf,
                    nome_usuario,
                    email,
                    senha
                )
                VALUES (
                    :cpf,
                    :nome_usuario,
                    :email,
                    :senha
                )"
            );

            $query->execute(array(
                ":cpf"          => $cpf_usuario,
                "nome_usuario"  => $nome_usuario,
                ":email"        => $email_usuario,
                ":senha"        => password_hash($senha_usuario, PASSWORD_DEFAULT)
            ));

            if($query->rowCount() > 0){
                session_start();

                $_SESSION['usuario'] = $linha["cpf"];

                header("location:../front/home.php");
                exit();
            }
            else {
                echo("Não foi possível inserir os dados no banco!");
            }
        } catch (PDOException $erro) {
            echo("Erro na gravação dos dados!");
        }
    } 
    else {
        echo("Erro na recuperação dos dados!");
    }
?>