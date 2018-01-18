<?php

require_once("config.php");

/*$usuario = new Usuario();
$usuario->loadById(1);

echo $usuario;
*/

// $usuarios = Usuario::getList();
// echo json_encode($usuarios);

// $search = Usuario::search("ama");
// echo json_encode($search);

// $usuario = new Usuario();
// $usuario->setNome("usuario");
// $usuario->setEmail("usuario@gmail.com");
// $usuario->setSenha("321654");

// $usuario->insert();

$usuario = new Usuario();
$usuario->loadById(1);
$usuario->update("Teste","teste@gmail.com","123456");

?>