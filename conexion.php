<?php

//sesion
session_start();

$usuario="root";
$password="";

try{
    $pdo= new PDO('mysql:host=localhost;dbname=libreta',$usuario,$password);
}catch(PDOException $e){
echo'Error en la conexion puede que no exista la base de datos solicitada' .$e->getMessage();
}

?>