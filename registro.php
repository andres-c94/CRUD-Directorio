<?php

require_once('conexion.php');

//TOMANDO VARIABLES DEL FORMULARIO 

$nombres= $_POST['nombres'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];

//Primera letra en mayuscula
$nombres = ucwords($nombres);
$direccion = ucwords($direccion);

//REGISTRANDO EN BASE DE DATOS 

//Consulta y preparacion
$agregar = $pdo->prepare("INSERT INTO registros(nombre,telefono,direccion) VALUES(:nombre,:telefono,:direccion) ");

$agregar->bindParam(':nombre',$nombres);
$agregar->bindParam(':telefono',$telefono);
$agregar->bindParam(':direccion',$direccion);

//EJECUCION DE CONSULTA
$agregar->execute();

//ALERTA DE SECION
$_SESSION['mensaje']='Registro agregado';

//REDIRECCIONAR A PAGINA INDEX
header("location:index.php");




?>