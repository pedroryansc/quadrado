<?php
    require_once("processa.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $lista = lista(1, $id);

    $quad = new Quadrado($lista[0][0], $lista[0][1], $lista[0][2]);
    echo $quad.
        "<div class='quadrado'></div>";
?>
<style>
    .quadrado{
        width: <?php echo $lista[0][1]; ?>em;
        height: <?php echo $lista[0][1]; ?>em;
        background: <?php echo $lista[0][2]; ?>;
    }
</style>