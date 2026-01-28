<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once(__DIR__."/../../conexao/connection.php");

        require_once(__DIR__."/../config.php");

        $nomeUsuario  = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $cargoUsuario = filter_input(INPUT_POST, 'cargoUsuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $emailUsuario = filter_input(INPUT_POST, 'emailUsuario', FILTER_SANITIZE_EMAIL);
        $cpfUsuario   = filter_input(INPUT_POST, 'cpfUsuario', FILTER_SANITIZE_SPECIAL_CHARS);

        try {
            $query = $conexao->prepare("UPDATE usuarios
                                        SET
                                            nome_usuario   = :nome,
                                            email          = :email
                                        WHERE usuarios.cpf = :cpf");

            $query->execute([
                ":nome"  => $nomeUsuario,
                ":email" => $emailUsuario,
                ":cpf"   => $cpfUsuario
            ]);

            if($query) {
                session_start();

                $_SESSION['nome'] = $nomeUsuario;
                
                header("location:".BASE_URL."pages/front/perfil_usuario.php");
                exit();
            }
        } catch (PDOException $erro) {
            echo "Não foi possível editar os dados do usuário";
            exit();
        }
    }
?>