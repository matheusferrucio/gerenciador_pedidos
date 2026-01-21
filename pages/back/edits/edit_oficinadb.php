<?php
    require_once(__DIR__."/../../conexao/connection.php");

    require_once(__DIR__."/../config.php");

    $nomeOficina    = filter_input(INPUT_POST, 'nomeOficina', FILTER_SANITIZE_SPECIAL_CHARS);
    $cnpj           = filter_input(INPUT_POST, 'cnpjOficina', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade         = filter_input(INPUT_POST, 'cidadeOficina', FILTER_SANITIZE_SPECIAL_CHARS);
    $rua            = filter_input(INPUT_POST, 'ruaOficina', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero         = filter_input(INPUT_POST, 'numEndOficina', FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro         = filter_input(INPUT_POST, 'bairroOficina', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep            = filter_input(INPUT_POST, 'cepOficina', FILTER_SANITIZE_SPECIAL_CHARS);

    try {
        $query = $conexao->prepare("UPDATE oficinas SET
                                        cnpj            = :cnpj,
                                        nome_oficina    = :nome,
                                        rua             = :rua,
                                        numero          = :numero,
                                        bairro          = :bairro,
                                        cidade          = :cidade,
                                        cep             = :cep
                                    ");

        $query->execute([
            ":cnpj"     => $cnpj,
            ":nome"     => $nomeOficina,
            ":rua"      => $rua,
            ":numero"   => $numero,
            ":bairro"   => $bairro,
            ":cidade"   => $cidade,
            ":cep"      => $cep
        ]);

        if ($query) {
            header("location:".BASE_URL."pages/front/listas/lista_oficinas.php");
            exit();
        }
    } catch (PDOException $erro) {
        echo "Não foi possível atualizar os dados";
        exit();
    }
?>