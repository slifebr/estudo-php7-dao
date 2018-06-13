<?php

class Dao extends PDO {

    private $conn;

    //-----------------------------------------------------
    //  Construtor da classe
    //-----------------------------------------------------
    public function __construct() {

        $this->conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "");
        

    }

    //-----------------------------------------------------
    //  setar parametros do statement
    //-----------------------------------------------------
    private function setParams($statement, $parameters = array()) {

        foreach ($parameters as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }

    //-----------------------------------------------------
    //  setar parametro do statement com chave e valor
    //-----------------------------------------------------
    private function setParam($statement, $key, $value) {
        $statement->bindParam($key, $value);
    }

    //-----------------------------------------------------
    //  prepara a query e executa
    //-----------------------------------------------------
    public function query($rawQuery, $params = array()) {
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params );
        $stmt->execute();
        return $stmt;
    }

    //-----------------------------------------------------
    //  comando select 
    //-----------------------------------------------------
    public function select($rawQuery, $params = array()): array {
        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>