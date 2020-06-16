<?php

class Sql extends PDO {
    private $conn;

    public function __construct(){
        // realiza a conexao com banco automaticamento quando a classe e instanciada
        $this->conn = new PDO("mysql:host=localhost;dbname=lanchonete", "root", "abc123");
    }


    private function setParams($statment, $parameters = array()){
        foreach ($parameters as $key => $value) {
            $this->setParam($statment, $key, $value);
        }
    }

    //$key   é chave  Exp (:ID)
    //$value é valor  Exp ($id)
    //$statment recebe conn->prepare($rawQuery)
    //bindParam faz conexao com banco
    private function setParam($statment, $key, $value){
        $statment->bindParam($key, $value); 
    }

    //rawQuery = query bruta ou comando em sql Exp: SELECT * FROM cliente;
    //params = PARAMETROS QUE SERAO PASSADOS
    //stmt 
    // prepare recebe o comando sql mas nao executa obs:existe uma funcao q executa o comando sql que é execute()
    public function query($rawQuery, $params = array()) {

        $stmt = $this->conn->prepare($rawQuery);  

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;

    }

    public function select($rawQuery, $params = array()):array {
        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>