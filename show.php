<?php
    require_once("processa.php");

    $lista = lista();

    echo "<a href='index.php'>Voltar à página principal</a> | [Quadrado {$lista[0]}] <br>".
        "<br>".
        "<div class='quadrado'></div>";
?>
<style>
    .quadrado{
        width: <?php echo $lista[1]; ?>em;
        height: <?php echo $lista[1]; ?>em;
        background: <?php echo $lista[2]; ?>;
    }
</style>