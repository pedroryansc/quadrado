<!DOCTYPE html>
<?php
    require_once("processa.php");
    
    $lista = lista();
    
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
    <br>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Lado</th>
            <th>Cor</th>
        </tr>
        <?php
            for($x = 0; $x < count($lista); $x ++){
                echo "<tr>";
                for($y = 0; $y < 3; $y ++){
        ?>
            <td><?php echo $lista[$x][$y]; ?></td>
        <?php
                }
                echo "<td><a href='show.php?id={$lista[$x][0]}'>Visualizar quadrado</a></td>
                </tr>";
            }
        ?>
    </table>
</body>
</html>