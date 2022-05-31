<!DOCTYPE html>
<?php
    require_once("processa.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 0;
    $info = isset($_POST["info"]) ? $_POST["info"] : "";

    $lista = lista($tipo, $info);
    // Com o método "listar" ao invés do "buscar", $vetor não funciona.
    $vetor = lista(1, $id);
    //var_dump($vetor);

    $title = "Formulário de criação do quadrado";
    //echo count($lista);
    //var_dump($lista);
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
        Lado: <input type="text" name="lado" value="<?php if($acao == "editar") echo $vetor[0][1]; ?>"><br>
        <br>
        Cor: <input type="color" name="cor" value="<?php if($acao == "editar") echo $vetor[0][2]; ?>"><br>
        <br>
        <button type="submit" name="acao" value="salvar">Criar</button>
    </form>
    <br><br>
    <form method="post">
        Pesquisar por: <br>
        <input type="radio" name="tipo" value="1" <?php if($tipo == 1) echo "checked"; ?>> ID<br>
        <input type="radio" name="tipo" value="2" <?php if($tipo == 2) echo "checked"; ?>> Lado<br>
        <input type="radio" name="tipo" value="3" <?php if($tipo == 3) echo "checked"; ?>> Cor<br>
        <br>
        <input type="search" name="info" placeholder="Pesquisa" value="<?php echo $info; ?>"><br>
        <br>
        <button type="submit">Pesquisar</button>
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
        /*
        ?>
            <td><a href="show.php?id=<?php echo $lista[$x][0]; ?>"><?php echo $lista[$x][0]; ?></a></td>
        <?php
                for($y = 1; $y < 3; $y ++){
        */
                for($y = 0; $y < 3; $y ++){
        ?>
            <td><?php echo $lista[$x][$y]; ?></td>
        <?php
                }
        ?>
            <td><a href="show.php?id=<?php echo $lista[$x]["id"]; ?>">Visualizar quadrado</a></td>
            <td><a href="index.php?acao=editar&id=<?php echo $lista[$x]["id"]; ?>">Editar</a></td>
            <td><a href="javascript:excluirRegistro('processa.php?acao=excluir&id=<?php echo $lista[$x]["id"]; ?>')">Excluir</a></td>
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