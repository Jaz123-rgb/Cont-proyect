<?php
include("../cont/config/db.php");

// seccion de Ingresos
$txtDate = (isset($_POST['txtDate']))?$_POST['txtDate']:"";
$txtConcept = (isset($_POST['txtConcepto']))?$_POST['txtConcepto']:"";
$txtImporte = (isset($_POST['txtImporte']))?$_POST['txtImporte']:"";
$txtIva = (isset($_POST['txtIvaC']))?$_POST['txtIvaC']:"";

$accion = (isset($_POST['accion']))?$_POST['accion']:"";

$importe = $_POST['txtImporte'];
$iva =  $_POST['txtIvaC'];
$txtMonTotal = $importe + $iva;

switch ($accion) {
    case "Agregar":
        // INSERT INTO `contabilidad`(`id`, `fecha`, `concept`, `importe`, `iva`, `monTotal`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
        $sentenciaSQL = $conexion->prepare("INSERT INTO contabilidad(fecha, concept, importe, iva, monTotal ) VALUES (:fecha, :concept, :importe, :iva, :monTotal);");
        $sentenciaSQL->bindParam(':concept',$txtConcept);
        $sentenciaSQL->bindParam(':fecha',$txtDate);
        $sentenciaSQL->bindParam(':importe',$txtImporte);
        $sentenciaSQL->bindParam(':iva',$txtIva);
        $sentenciaSQL->bindParam(':monTotal',$txtMonTotal);
        $sentenciaSQL->execute();

        break;

    case "Modificar":
        echo "Presiono el boton Modificar";
        break;
    
     case "Cancelar":
        echo "Presiono el boton Cancelar";
        break;

}

$sentenciaSQL = $conexion->prepare("SELECT * FROM contabilidad");
$sentenciaSQL->execute();
$listaLibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


$res1 = $conexion->prepare('SELECT SUM(importe) AS sum FROM contabilidad');
$res1->execute();
$sum_miles = 0;
while($row1 = $res1->fetch(PDO::FETCH_ASSOC)) {
$sum_miles += $row1['sum'];
}

$res2 = $conexion->prepare('SELECT SUM(iva) AS sum FROM contabilidad');
$res2->execute();
$sum_miles2= 0;
while($row2 = $res2->fetch(PDO::FETCH_ASSOC)) {
$sum_miles2 += $row2['sum'];
}


$res3 = $conexion->prepare('SELECT SUM(monTotal) AS sum FROM contabilidad');
$res3->execute();
$sum_miles3= 0;
while($row3 = $res3->fetch(PDO::FETCH_ASSOC)) {
$sum_miles3 += $row3['sum'];
}

// Seccion de Egresos

?>