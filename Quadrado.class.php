<?php
    class Quadrado{
        private $lado;
        private $cor;
        public function __construct($lado, $cor){
            $this->setLado($lado);
            $this->setCor($cor);
        }

        public function setLado($lado){
            if($lado > 0)
                $this->lado = $lado;
        }
        public function setCor($cor){
            if(strlen($cor) > 0)
                $this->cor = $cor;
        }

        public function __toString(){
            return "[Quadrado] <br>".
                    "Lado: ".$this->getLado()." <br>".
                    "Cor: ".$this->getCor()." <br>".
                    "Área: ".$this->calcularArea()." <br>".
                    "Perímetro: ".$this->calcularPerimetro()." <br>".
                    "Diagonal: ".$this->calcularDiagonal()."<br>";
        }

        public function getLado(){ return $this->lado; }
        public function getCor(){ return $this->cor; }

        public function calcularArea(){
            return $this->lado * $this->lado;
        }
        public function calcularPerimetro(){
            return $this->lado * 4;
        }
        public function calcularDiagonal(){
            return number_format($this->lado * sqrt(2), 3, ",", ".");
        }
    }
?>