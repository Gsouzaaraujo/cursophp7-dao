<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}


	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtCadastro(){
		return $this->dtcadastro;
	}

	public function setDtCadastro($value){
		$this->dtcadastro = $value;
	}




public function loadById($id){

	$sql = new Sql();

	$results = $sql->select("SELECT *FROM tb_usuarios WHERE idusuario = :ID ", array(":ID"=>$id
	));

	if(count($results) > 0){

		$row = $results[0];

// preenchendo os atributos com as informações que vieram do Banco
		$this->setIdusuario($row['idusuario']);
		$this->setDeslogin($row['deslogin']);
		$this->setDessenha($row['dessenha']);
		// DateTime já coloca no formato de horas
		$this->setDtCadastro(new DateTime($row['dtcadastro']));
	}
}



// lista toda a tabela
public static function getList(){

	$sql = new Sql();

	return $sql->select("SELECT *FROM tb_usuarios ORDER BY deslogin");
}

// lista somente o que foi buscado
public static function search($login){

	$sql = new Sql();

// LIKE serve para buscar expressões dentro de uma palavra
// Combinado com %palavrabuscada% ou %palavrabuscada ou palavrabuscada%
	return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(':SEARCH'=>"%".$login."%"
	));
}


// função para validar usuario e senha
public function login($login, $password){

	$sql = new Sql();

	$results = $sql->select("SELECT *FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(":LOGIN"=>$login, ":PASSWORD"=>$password
	));

	if(count($results) > 0){

		$row = $results[0];

// preenchendo os atributos com as informações que vieram do Banco
		$this->setIdusuario($row['idusuario']);
		$this->setDeslogin($row['deslogin']);
		$this->setDessenha($row['dessenha']);
		// DateTime já coloca no formato de horas
		$this->setDtCadastro(new DateTime($row['dtcadastro']));
	} else {
		 throw new Exception("Login e/ou senha inválidos.");
		 
	}
}


// devolve um array com os dados do banco
public function __toString(){

	return json_encode(array(
		"idusuario"=>$this->getIdusuario(),
		"deslogin"=>$this->getDeslogin(),
		"dessenha"=>$this->getDessenha(),
		"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
	));
}

}

?>