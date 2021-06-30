<?php
include_once("conexion.php");

$id=$_GET['id'];

$query = $pdo->prepare("DELETE FROM registros WHERE id = :id");

$query->bindParam(":id",$id);

$query->execute();

header("location: index.php");

?>