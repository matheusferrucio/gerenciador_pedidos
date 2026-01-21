<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nomeOficina    = filter_input(INPUT_POST, 'nomeOficina', FILTER_SANITIZE_SPECIAL_CHARS);
        $cnpjOficina    = filter_input(INPUT_POST, 'cnpjOficina', FILTER_SANITIZE_SPECIAL_CHARS);
        $ruaOficina     = filter_input(INPUT_POST, 'ruaOficina', FILTER_SANITIZE_SPECIAL_CHARS);
        $numOficina     = filter_input(INPUT_POST, 'numEndOficina', FILTER_SANITIZE_SPECIAL_CHARS);
        $bairroOficina  = filter_input(INPUT_POST, 'bairroOficina', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade         = filter_input(INPUT_POST, 'cidadeOficina', FILTER_SANITIZE_SPECIAL_CHARS);
        $cepOficina     = filter_input(INPUT_POST, 'cepOficina', FILTER_SANITIZE_SPECIAL_CHARS);

        try {
            require_once(__DIR__."/../../conexao/connection.php");

            require_once(__DIR__."/../config.php");

            $query = $conexao->prepare("INSERT INTO oficinas(
                                            cnpj,
                                            nome_oficina,
                                            rua,
                                            numero,
                                            bairro,
                                            cidade,
                                            cep
                                        ) VALUES (
                                            :cnpj,
                                            :nome_oficina,
                                            :rua,
                                            :numero,
                                            :bairro,
                                            :cidade,
                                            :cep
                                        )");

            $query->execute([
                ":cnpj"         => $cnpjOficina,
                ":nome_oficina" => $nomeOficina,
                ":rua"          => $ruaOficina,
                ":numero"       => $numOficina,
                ":bairro"       => $bairroOficina,
                ":cidade"       => $cidade,
                ":cep"          => $cepOficina
            ]);

            if ($query->rowCount() > 0) {
                header("location:".BASE_URL."pages/front/listas/lista_oficinas.php");
                exit();
            }
        } catch (PDOException $erro) {
            echo "Não foi possível cadastrar a oficina";
            exit();
        }
    } else {
        echo "Não foi possível recuperar os dados!";
        exit();
    }
?>