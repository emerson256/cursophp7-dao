<?php

require_once("config.php");

/*$usuario = new Usuario();
$usuario->loadById(1);

echo $usuario;
*/

// $usuarios = Usuario::getList();
// echo json_encode($usuarios);

$search = Usuario::search("ama");
echo json_encode($search);
?>