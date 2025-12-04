<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = filter_input(INPUT_POST, 'nomeSeguradora', FILTER_SANITIZE_SPECIAL_CHARS);
        $cnpj = filter_input(INPUT_POST, 'cnpjSeguradora', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty($_FILES['fotoSeguradora']['name'])) {
            // salva a foto na variável e adiciona um nome aleatório para evitar conflito
            $foto = uniqid(rand(), false)."-".basename($_FILES['fotoSeguradora']['name']);

            $pasta = "../../uploads/";
        } else {
            $foto = "sem_foto.jpg";
        }

        try {
            require_once("../conexao/connection.php");

            $query = $conexao->prepare(
                "INSERT INTO seguradoras(
                    nome_seguradora,
                    cnpj,
                    foto_seguradora
                )
                VALUES (
                    :nome,
                    :cnpj,
                    :foto
                )"
            );

            $query->execute(array(
                ":nome" => $nome,
                ":cnpj" => $cnpj,
                ":foto" => $foto
            ));

            if ($query->rowCount() > 0) {
                move_uploaded_file($_FILES['fotoSeguradora']['tmp_name'], $pasta.$foto);

                header("Location:../front/lista_seguradoras.php");
                exit();
            }
        } catch (PDOEexeption $erro) {
            echo("Erro no cadastro da seguradora");
            exit();
        }
    }
?>