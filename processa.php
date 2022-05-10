<?php
    require_once("Quadrado.class.php");

    if(isset($_POST["lado"])){
        $lado = isset($_POST["lado"]) ? $_POST["lado"] : 0;
        $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
        $quad = new Quadrado($lado, $cor);
        $quad->insere();
        echo $quad.
        "<div class='quadrado'>".
        "</div>";
    }

    function conversaoArray(){
        $quad = new Quadrado(1, 1);
        $lista = $quad->buscar();
        foreach($lista as $vetor)
            return $vetor;
    }
?>
<style>
    .quadrado{
        width: <?php echo $lado; ?>em;
        height: <?php echo $lado; ?>em;
        background: <?php echo $cor; ?>;
    }
</style>