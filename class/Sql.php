<?php

// tudo que o PDO faz essa classe já faz também
class Sql extends PDO {

	private $conn;

// método construtor para conexão
	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root","");
	}


// método para receber a declaração BD e os parametros
	private function setParams($statment,$parameters = array()){

		foreach ($parameters as $key => $value) {
			
			$this->setParam($statment, $key, $value);
		}

	}


// método para receber somente uma declaração BD e paramentros
	private function setParam($statment, $key, $value){

		$statment->bindParam($key,$value);
	}

// método para receber e executar uma query
	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;

		
	}


// método para devolver resultado da query
	public function select($rawQuery, $params = array()):array{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

}


?>