<?php
    $dsn = "mysql:host=localhost;dbname=concessionaria;charset=utf8";
    $user = "root";
    $password = "";

    try {
        $conexao = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    } catch (PDOException $erro) {
        echo("Erro ao conectar com o banco de dados");
        exit();
    }
?>