<?php 

$host = "localhost";
$bd = "sitio";
$usuario = "root";
$pws = "";

try {
    $conexion =  new PDO("mysql:host=$host; dbname=$bd",$usuario,$pws);

} catch (Exception $ex) {
    echo $ex->getMessage();
}



?>