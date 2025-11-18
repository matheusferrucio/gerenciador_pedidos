<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $cpf_usuario    = filter_input(INPUT_POST, 'cpfUsuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha_usuario  = filter_input(INPUT_POST, 'senhaUsuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lembrar_me     = filter_input(INPUT_POST, "lembrar_me", FILTER_VALIDATE_BOOLEAN) ?? false; // verifica se o checkbox de lembrar-me foi marcado, senão false
        
        $_SESSION['cpf']    = $cpf_usuario;
        $_SESSION['senha']  = $senha_usuario;

        try {
            require_once("../conexao/connection.php");

            $query = "SELECT * FROM usuarios WHERE cpf = :cpf";

            $query = $conexao->prepare($query);

            $query->execute(array(
                ":cpf" => $cpf_usuario
            ));

            if ($query->rowCount() > 0) {
                $linha = $query->fetch(); // cria um array com os dados recuperados

                // descriptografa a senha e compara com a senha guardada no banco para liberar o acesso
                if (password_verify($senha_usuario, $linha["senha"])) {
                    session_start();

                    $_SESSION['usuario'] = $linha["cpf"];

                    // verifica se o botão de 'lembrar-me' foi setado para True('checkado')
                    if ($lembrar_me) {
                        // aqui definimos o seletor e validador para definir os cookies
                        $selector           = bin2hex(random_bytes(16));
                        $validator          = bin2hex(random_bytes(32));
                        $hashed_validator   = hash('sha256', $validator); // criptografa o validator
                        $expirity_time      = time() + (30 * 24 * 60 * 60); // tempo de 30 dias

                        // query para inserir as variáveis de validação na tabela tokens
                        $query_inserir_token = $conexao->prepare(
                            "INSERT INTO tokens (
                                cpf_usuario,
                                selector,
                                hashed_validator,
                                expires
                            )
                            VALUES (
                                :cpf,
                                :selector,
                                :hashed_validator,
                                :expires
                            )"
                        );

                        // executa a query e insere os validadores no banco
                        $query_inserir_token->execute(array(
                            ':cpf'              => $linha['cpf'],
                            ':selector'         => $selector,
                            ':hashed_validator' => $hashed_validator,
                            ':expires'          => date('Y-m-d H:i:s', $expirity_time)
                        ));

                        // 'seta'/define o cookie
                        setcookie(
                            'lembrar_me',
                            $selector.':'.$validator,
                            $expirity_time,
                            '/', // path
                            '', // domain
                            true,
                            true // httpOnly para segurança conta XSS
                        );
                    }

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