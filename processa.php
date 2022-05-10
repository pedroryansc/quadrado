<?php
    require_once("Quadrado.class.php");
    
    $lado = isset($_POST["lado"]) ? $_POST["lado"] : 0;
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";

    if(isset($_POST["lado"])){
        $quad = new Quadrado($lado, $cor);
        echo $quad.
        "<div class='quadrado'>".
        "</div>";
    }
?>
<style>
    .quadrado{
        width: <?php echo $lado; ?>em;
        height: <?php echo $lado; ?>em;
        background: <?php echo $cor; ?>;
    }
</style>