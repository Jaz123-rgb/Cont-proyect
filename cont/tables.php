<?php include('../cont/template/header.php')?>


<?php

$txtDate = (isset($_POST['txtDate']))?$_POST['txtDate']:"";
$txtConcept = (isset($_POST['txtConcepto']))?$_POST['txtConcepto']:"";
$txtImporte = (isset($_POST['txtImporte']))?$_POST['txtImporte']:"";
$txtIva = (isset($_POST['txtIvaC']))?$_POST['txtIvaC']:"";
$txtmonTotal =  $txtImporte + ($txtImporte);
echo $txtmonTotal;

$accion = (isset($_POST['accion']))?$_POST['accion']:"";

include("../cont/config/db.php");



switch ($accion) {
    case "Agregar":
        // INSERT INTO `contabilidad`(`id`, `fecha`, `concept`, `importe`, `iva`, `monTotal`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
        $sentenciaSQL = $conexion->prepare("INSERT INTO contabilidad(fecha, concept, importe, iva) VALUES (:fecha, :concept, :importe, :iva);");
        $sentenciaSQL->bindParam(':concept',$txtConcept);
        $sentenciaSQL->bindParam(':fecha',$txtDate);
        $sentenciaSQL->bindParam(':importe',$txtImporte);
        $sentenciaSQL->bindParam(':iva',$txtIva);
        $sentenciaSQL->bindParam(':MonTotal', $txtmonTotal);
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


?>



<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Adicionar ingresos
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="txtDate">fecha:</label>
                    <input type="date" class="form-control" id="txtDate" name="txtDate" placeholder="Ingreso">
                </div>
                <div class="form-group">
                    <label for="txtConcepto">Concepto</label>
                    <input type="text" class="form-control" id="txtConcepto" name="txtConcepto" placeholder="Concepeto">
                </div>

                <div class="form-group">
                    <label for="txtImporte">Importe</label>
                    <input type="number" class="form-control" id="txtImporte" name="txtImporte" placeholder="Importe">
                </div>
                <div class="form-group">
                    <label for="txtIvaC">IVA:</label>
                    <input type="number" class="form-control" id="txtIvaC" name="txtIvaC" placeholder="IVA">
                </div>
                <div class="form-group">
                    <label for="txtmonTotal">Monto Total</label>
                    <input type="number" class="form-control" id="txtmonTotal" name="txtmonTotal" placeholder="Ingresa el monto total">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    
                </div>

            </form>


        </div>
    </div>




</div>

<div class="col-md-7 table-bordered">
    <table class="table">
        <thead>
            <tr>
                <th>iD</th>
                <th>Fecha</th>
                <th>Concepto</th>
                <th>Importe</th>
                <th>IVA</th>
                <th>Monto Total</th>
                
            </tr>
        </thead>
        <tbody>
        <?php  foreach ($listaLibros as $libro) { ?>
            <tr>
                <td ><?php echo $libro['id']; ?></td>
                <td><?php echo $libro['fecha'] ?></td>
                <td><?php echo $libro['concept'] ?></td>
                <td>$ <?php echo $libro['importe']  ?></td>
                <td>$ <?php echo $libro['iva']?></td>
                <td>$ <?php echo $libro['monTotal'] ?></td>

            </tr>
        <?php   } ?>
        </tbody>
    </table>
    <div class="col-md-7-7">
<table class="table">
        <thead>
            <tr>
                <th>Total del importe</th>
                <th>Total del importe con IVA</th>
                <th>Total Monto total</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td >$ <?php  echo $sum_miles; ?></td></td>
                <td>$ <?php  echo $sum_miles2; ?></td>
                <td>$ <?php  echo $sum_miles3; ?></td>
            </tr>
        </tbody>
    </table>
    
</div>
</div>






<?php include('../cont/template/footer.php')  ?>
