<?php

include("../cont/config/db.php");


$txtDatein = (isset($_POST['txtDatein']))?$_POST['txtDatein']:"";
$txtConceptin = (isset($_POST['txtConceptoin']))?$_POST['txtConceptoin']:"";
$txtImportein = (isset($_POST['txtImportein']))?$_POST['txtImportein']:"";
$txtIvain = (isset($_POST['txtIvain']))?$_POST['txtIvain']:"";
$accionin = (isset($_POST['accion']))?$_POST['accion']:"";
$importe = $_POST['txtImportein'];
$iva =  $_POST['txtIvain'];
$txtMonTotalin = $importe + $iva;

switch ($accionin) {
    case "Agregarin":
        // INSERT INTO `contabilidadin`(`id`, `fecha`, `concept`, `importe`, `iva`, `monTotal`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
        $sentenciaSQL = $conexion->prepare("INSERT INTO contabilidadin(fecha, concept, importe, iva, monTotal ) VALUES (:fechain, :conceptin, :importein, :ivain, :monTotalin);");
        $sentenciaSQL->bindParam(':conceptin',$txtConceptin);
        $sentenciaSQL->bindParam(':fechain',$txtDatein);
        $sentenciaSQL->bindParam(':importein',$txtImportein);
        $sentenciaSQL->bindParam(':ivain',$txtIvain);
        $sentenciaSQL->bindParam(':monTotalin',$txtMonTotalin);
        $sentenciaSQL->execute();

        break;

    case "Modificar":
        echo "Presiono el boton Modificar";
        break;
    
     case "Cancelar":
        echo "Presiono el boton Cancelar";
        break;

}


$sentenciaSQL = $conexion->prepare("SELECT * FROM contabilidadin");
$sentenciaSQL->execute();
$listaIn=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$res1 = $conexion->prepare('SELECT SUM(importe) AS sum FROM contabilidadin');
$res1->execute();
$sum_miles = 0;
while($row1 = $res1->fetch(PDO::FETCH_ASSOC)) {
$sum_miles += $row1['sum'];
}

$res2 = $conexion->prepare('SELECT SUM(iva) AS sum FROM contabilidadin');
$res2->execute();
$sum_miles2= 0;
while($row2 = $res2->fetch(PDO::FETCH_ASSOC)) {
$sum_miles2 += $row2['sum'];
}


$res3 = $conexion->prepare('SELECT SUM(monTotal) AS sum FROM contabilidadin');
$res3->execute();
$sum_miles3= 0;
while($row3 = $res3->fetch(PDO::FETCH_ASSOC)) {
$sum_miles3 += $row3['sum'];
} 

?>