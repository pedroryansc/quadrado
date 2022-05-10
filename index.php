<!DOCTYPE html>
<?php
    $title = "Formulário de criação do quadrado";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <form action="processa.php" method="post">
        <?php echo $title; ?> <br>
        <br>
        Lado: <input type="text" name="lado"><br>
        <br>
        Cor: <input type="color" name="cor"><br>
        <br>
        <button type="submit">Criar</button>
    </form>
</body>
</html>