<?php
    require_once("conf/Conexao.php"); /* Caso "Quadrado.class.php" estivesse dentro de
                                        uma pasta, o diretório permaneceria o mesmo,
                                        pois o uso deste arquivo seria feito através do
                                        "index.php", o qual não está dentro de uma pasta.
                                        */

    class Quadrado{
        private $id;
        private $lado;
        private $cor;
        public function __construct($id, $lado, $cor){
            $this->setId($id);
            $this->setLado($lado);
            $this->setCor($cor);
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setLado($lado){
            if($lado > 0)
                $this->lado = $lado;
            else
                throw new Exception("Valor do lado inválido: $lado");
        }
        public function setCor($cor){
            if(strlen($cor) > 0)
                $this->cor = $cor;
            else
                throw new Exception("Cor inválida: $cor");
        }

        public function __toString(){
            return "<a href='index.php'>Voltar à página principal</a> | [Quadrado ".$this->getId()."] <br>".
                    "<br>".
                    "Lado: ".$this->getLado()." <br>".
                    "Cor: ".$this->getCor()." <br>".
                    "Área: ".$this->calcularArea()." <br>".
                    "Perímetro: ".$this->calcularPerimetro()." <br>".
                    "Diagonal: ".$this->calcularDiagonal()."<br>".
                    "<br>";
        }

        public function getId(){ return $this->id; }
        public function getLado(){ return $this->lado; }
        public function getCor(){ return $this->cor; }

        public function insere(){
            require_once("conf/Conexao.php");
            $query = "INSERT INTO quadrado VALUES(:id, :lado, :cor)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":lado", $this->lado);
            $stmt->bindParam(":cor", $this->cor);
            return $stmt->execute();
        }

        // Insere um quadrado no banco de dados
        public function insere2(){
            // Abrir conexão com o banco
            $conexao = Conexao::getInstance();
            // Montar SQL - Comando para inserir os dados
            $sql = "INSERT INTO quadrado (lado, cor) VALUES(:l, :c)";
            // Preparar o comando
            $comando = $conexao->prepare($sql);
            // Vincular os parâmetros
            $comando->bindParam(":l", $this->getLado(), PDO::PARAM_INT);
            $comando->bindParam(":c", $this->getCor(), PDO::PARAM_STR);
            // Executar e retornar o resultado
            if($comando->execute())
                return $conexao->lastInsertId();
            else{
                return 0;
                $comando->debugDumpParams();
            }
        }
        
        // Listagem - Relatório (Todos os dados)

        public function listar($tipo, $info){ /*$tipo = Tipo de pesquisa
                                                        $info = Texto da pesquisa*/
            // Abrir conexão com o banco
            $conexao = Conexao::getInstance();
            // Montar SQL (Comando para inserir os dados)
            $sql = "SELECT * FROM quadrado";
            //Adicionar parâmetros
            if($tipo > 0)
                switch($tipo){
                    case(1): $sql .= " WHERE id = :info"; break;
                    case(2): $sql .= " WHERE lado = :info"; break;
                    case(3): $sql .= " WHERE cor LIKE ':info%'"; break;
                }
            // Preparar o comando
            $comando = $conexao->prepare($sql);
            // Vincular os parâmetros
            $comando->bindParam(':info', $info, PDO::PARAM_STR);
            // Executar e retornar o resultado
            $comando->execute();
            return $comando->fetchAll();
        }

        // Consulta (ID) - buscaDados (Única linha de dados)


        
        public function buscar($id){
            require_once("conf/Conexao.php");
            $query = "SELECT * FROM quadrado";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            if($id != 0){
                $query .= " WHERE id = :id";
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(":id", $id);
            }
            if($stmt->execute())
                return $stmt->fetchAll();
            return false;
        }
        public function editar(){
            require_once("conf/Conexao.php");
            $query = "UPDATE quadrado
                    SET lado = :lado, cor = :cor
                    WHERE id = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":lado", $this->lado);
            $stmt->bindParam(":cor", $this->cor);
            $stmt->bindParam(":id", $this->id);
            return $stmt->execute();
        }
        public function excluir(){
            require_once("conf/Conexao.php");
            $query = "DELETE FROM quadrado WHERE id = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $this->id);
            return $stmt->execute();
        }

        public function calcularArea(){
            return pow($this->getLado(), 2);
        }
        public function calcularPerimetro(){
            return $this->getLado() * 4;
        }
        public function calcularDiagonal(){
            return number_format($this->getLado() * sqrt(2), 3, ",", ".");
        }
    }
?>