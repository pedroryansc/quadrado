<?php
  include_once "conf.inc.php";

  class Conexao{  
    private static $pdo;
    private function __construct(){}
    /*
    No caso desta classe, o método construtor é privado. Em seu lugar, é utilizado o método
    getInstance, o qual é "static", ou seja, que pode ser executada sem a criação de um objeto
    através do método construtor.
    */
    public static function getInstance() {  
      if(!isset(self::$pdo)){ //!isset = empty
        try{  
          $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', 
                          PDO::ATTR_PERSISTENT => TRUE,
                          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
          self::$pdo = new PDO(DRIVER.":host=".HOST.";".
                                      "dbname=".DBNAME.";".
                                      "charset=".CHARSET.";", USER, PASSWORD, $opcoes);
          }catch (PDOException $e){
            print "Erro: ".$e->getMessage();  
          }
      }
      return self::$pdo;  
    }
  }
?>