<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        require_once(__DIR__.'/../config.php');
        
        $id             = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome           = filter_input(INPUT_POST, 'nomeSeguradora', FILTER_SANITIZE_SPECIAL_CHARS);
        $cnpj           = filter_input(INPUT_POST, 'cnpjSeguradora', FILTER_SANITIZE_SPECIAL_CHARS);
        $foto_anterior  = filter_input(INPUT_POST, 'fotoAnterior', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        echo $foto_anterior;
        
        if (!empty($_FILES['fotoSeguradora']['name'])) {
            $foto = uniqid(rand(), false)."-".basename($_FILES['fotoSeguradora']['name']);
            
            $pasta = __DIR__."/../../../uploads/";

            $flag = true;
        } else {
            $foto = $foto_anterior;

            $flag = false;
        }

        try {
            require_once(__DIR__."/../../conexao/connection.php");

            $query = $conexao->prepare("UPDATE seguradoras SET 
                                            nome_seguradora = :nome,
                                            cnpj            = :cnpj,
                                            foto_seguradora = :foto
                                        WHERE 
                                            seguradoras.id_seguradora = :id");

            $query->execute(array(
                ":id"   => $id,
                ":nome" => $nome,
                ":cnpj" => $cnpj,
                ":foto" => $foto
            ));

            if ($query->rowCount() > 0) {

                if ($flag) {
                    unlink($pasta.$foto_anterior)
                    
                    move_uploaded_file($_FILES["fotoSeguradora"]["tmp_name"], $pasta.$foto)
                }

                header("Location:".BASE_URL."pages/front/listas/lista_seguradoras.php");
                exit();
            }
        } catch (PDOEexeption $erro) {
            echo("Erro no cadastro da seguradora");
            exit();
        }
    }
?>