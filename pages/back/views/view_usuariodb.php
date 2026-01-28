<?php
    require_once(__DIR__."/../../conexao/connection.php");

    $cpf = $_SESSION['usuario'];

    try {
        // $query = $conexao->prepare("SELECT * FROM usuarios WHERE usuarios.cpf = :cpf");
        $query = $conexao->prepare("SELECT 
                                        U.cpf,
                                        U.nome_usuario,
                                        U.email,
                                        C.nome_cargo
                                    FROM usuarios U
                                    LEFT JOIN cargos C
                                    ON U.id_cargo = C.id_cargo
                                    WHERE U.cpf = :cpf");
        
        $query->execute([
            ":cpf" => $cpf
        ]);
        
        $dados = $query->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            return $dados;
        }
    } catch (PDOException $erro) {
        echo "Não foi possível recuperar os dados";
        exit();
    }
?>