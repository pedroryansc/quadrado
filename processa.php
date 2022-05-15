<?php
    require_once("Quadrado.class.php");

    if(isset($_POST["lado"])){
        $lado = isset($_POST["lado"]) ? $_POST["lado"] : 0;
        $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
        $quad = new Quadrado(0, $lado, $cor);
        $quad->insere();
        echo $quad.
        "<div class='quadrado'>".
        "</div>";
    }

    function lista(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $quad = new Quadrado(1, 1, 1);
        $lista = $quad->buscar($id);
        if($id != 0){
            foreach($lista as $vetor)
                return $vetor;
        } else
            return $lista;
    }
?>
<style>
    .quadrado{
        width: <?php echo $lado; ?>em;
        height: <?php echo $lado; ?>em;
        background: <?php echo $cor; ?>;
    }
</style>