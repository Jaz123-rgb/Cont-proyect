<?php

$host = "localhost";
$bd = "cont";
$usuario = "root";
$pws = "";

try {
    $conexion = new PDO("mysql:host=$host; dbname=$bd", $usuario,$pws);
} catch (Exception $e) {
   echo $e->getMessage();
}




?>