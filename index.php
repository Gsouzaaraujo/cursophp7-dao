<?php

// chama arquivo config que chama classe
require_once("config.php");


// cria instancia da classe Sql
//$sql = new Sql();


// seleciona o método select
//$usuarios = $sql->select("SELECT *FROM tb_usuarios");


//echo json_encode($usuarios);

$root = new Usuario();

$root->loadbyId(3);

echo $root;

?>