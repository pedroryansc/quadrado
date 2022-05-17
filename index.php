<!DOCTYPE html>
<?php
    require_once("processa.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    $lista = lista(0);

    $vetor = lista($id);
    
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
    <form action="processa.php?id=<?php echo $id; ?>" method="post">
        <?php echo $title; ?> <br>
        <br>
        Lado: <input type="text" name="lado" value="<?php if($acao == "editar") echo $vetor[1]; ?>"><br>
        <br>
        Cor: <input type="color" name="cor" value="<?php if($acao == "editar") echo $vetor[2]; ?>"><br>
        <br>
        <button type="submit" name="acao" value="salvar">Criar</button>
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
        ?>
            <td><a href="show.php?id=<?php echo $lista[$x][0]; ?>">Visualizar quadrado</a></td>
            <td><a href="index.php?acao=editar&id=<?php echo $lista[$x][0]; ?>">Editar</a></td>
            <td><a href="javascript:excluirRegistro('processa.php?acao=excluir&id=<?php echo $lista[$x][0]; ?>')">Excluir</a></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
<script>
    function excluirRegistro(url){
        if(confirm("Este registro será excluído. Tem certeza?"))
            location.href = url;
    }
</script>