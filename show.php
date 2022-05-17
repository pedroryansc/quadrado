<?php
    require_once("processa.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $lista = lista($id);

    $quad = new Quadrado($lista[0], $lista[1], $lista[2]);
    echo $quad.
        "<div class='quadrado'></div>";
?>
<style>
    .quadrado{
        width: <?php echo $lista[1]; ?>em;
        height: <?php echo $lista[1]; ?>em;
        background: <?php echo $lista[2]; ?>;
    }
</style>