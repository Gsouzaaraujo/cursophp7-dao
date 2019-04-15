<?php

// chama arquivo config que chama classe
require_once("config.php");


// cria instancia da classe Sql
//$sql = new Sql();


// seleciona o método select
//$usuarios = $sql->select("SELECT *FROM tb_usuarios");


//echo json_encode($usuarios);

//$root = new Usuario();
//$root->loadbyId(3);
//echo $root;

// Carrega uma lista de usuarios
//$lista = Usuario::getList();
//echo json_encode($lista);

// Carrega uma lista de usuarios buscando pelo login
//$search = Usuario::search("jo");
//echo json_encode($search);

// carrega um usuário usando login e senha
$usuario = new Usuario();
$usuario->login("user", "12345");

echo $usuario;


?>