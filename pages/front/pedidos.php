<?php
    require_once("../back/_session.php");

    if(!isset($_SESSION['usuario'])){
        header("location:../../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="shortcut icon" href="../../images/icon_box.png" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/forms.css">
    <script src="../../js/script.js" defer></script>
</head>
<body>
    <div class="container">
        <?php require_once("sidebar.php"); ?>

        <main class="conteudo_principal">
            
        </main>
    </div>
</body>
</html>