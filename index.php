<!DOCTYPE html>

<?php
    require_once("Quadrado.class.php");
    $title = "Formulário de criação do quadrado";
    $lado = isset($_POST["lado"]) ? $_POST["lado"] : 0;
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <form action="" method="post">
        <?php echo $title; ?> <br>
        <br>
        Lado: <input type="text" name="lado"><br>
        <br>
        Cor: <input type="color" name="cor"><br>
        <br>
        <button type="submit">Criar</button>
    </form>
    <br>
    <?php 
        if(isset($_POST["lado"])){
            $quad = new Quadrado($lado, $cor);
            echo $quad;
        }
    ?>
</body>
</html>