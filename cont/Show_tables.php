<?php include('../cont/template/header.php')?>


<?php  
include("../cont/config/db.php"); 

$sentenciaSQL = $conexion->prepare("SELECT * FROM contabilidadin");
$sentenciaSQL->execute();
$listaIn=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$res1 = $conexion->prepare('SELECT SUM(importe) AS sum FROM contabilidadin');
$res1->execute();
$sum_milesin = 0;
while($row1 = $res1->fetch(PDO::FETCH_ASSOC)) {
$sum_milesin += $row1['sum'];
}

$res2 = $conexion->prepare('SELECT SUM(iva) AS sum FROM contabilidadin');
$res2->execute();
$sum_milesin2= 0;
while($row2 = $res2->fetch(PDO::FETCH_ASSOC)) {
$sum_milesin2 += $row2['sum'];
}


$res3 = $conexion->prepare('SELECT SUM(monTotal) AS sum FROM contabilidadin');
$res3->execute();
$sum_milesin3= 0;
while($row3 = $res3->fetch(PDO::FETCH_ASSOC)) {
$sum_milesin3 += $row3['sum'];
} 

// 
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

<div class="col-md-6 table-bordered">
    <table class="table">
        <thead>
            <h1>Tabla de Ingresos</h1>
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
    <div class="col-md-6-6">
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


<div class="col-md-6 table-bordered">
    <table class="table">
        <thead>
            <h1>Tabla de Egresos</h1>
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
        <?php  foreach ($listaIn as $egreso) { ?>
            <tr>
                <td ><?php echo $egreso['id']; ?></td>
                <td><?php echo $egreso['fecha'] ?></td>
                <td><?php echo $egreso['concept'] ?></td>
                <td>$ <?php echo $egreso['importe']  ?></td>
                <td>$ <?php echo $egreso['iva']?></td>
                <td>$ <?php echo $egreso['monTotal'] ?></td>

            </tr>
        <?php   } ?>
        </tbody>
    </table>
    <div class="col-md-6-6">
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
                <td >$ <?php  echo $sum_milesin; ?></td></td>
                <td>$ <?php  echo $sum_milesin2; ?></td>
                <td>$ <?php  echo $sum_milesin3; ?></td>
            </tr>
        </tbody>
    </table>
    
</div>
</div>

<div class="col-md-6 table-bordered">
<table class="table">
        <thead>
            <h1>Impuestos</h1>
            <tr>
                <th>Concepto</th>
                <th>Tasa</th>
                <th>Cantidad</th>
                <th>Monto a pagar</th>
                 
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <strong>IVA</strong></td>
                <td>16 %</td>
                <td>0.16</td>
                <td><?php
                 $iva = $sum_milesin2 - $sum_miles2;
                 
                 echo $iva
                 ?></td>
            </tr>
            <tr>
                 <td> <strong>ISR</strong></td>
                 <td>3 %</td>
                <td>0.03</td>
                <td><?php 
                $isr = $sum_miles * 0.03 ;
                
                echo $isr
                ?></td>

            </tr>
            <tr>
                 <td> <strong>ISH</strong></td>
                 <td>4 %</td>
                <td>0.04</td>
                <td><?php 
                $ish = $sum_miles * 0.04;
                
                echo $ish
                 ?></td>
            </tr>
        </tbody>
    </table>

</div>

<div class="col-md-6 table-bordered">
<table class="table">
        <thead>
            <tr>
                <th>Pago de <br>impuestos totales</th>
                <th>Utilidad total</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong><h2>$ <?php echo $iva + $ish + $isr ?></h2></strong></td>
                <td><strong><h2>$ <?php echo $sum_miles3 + $sum_milesin3 ?> </h2></strong></td>
            </tr>
    </table>
    <a name="" id="" class="btn btn-primary" href="../cont/tablaingresos.php" role="button"><h3>Convierte a Excel</h3></a>
    <a name="" id="" class="btn btn-primary" href="../cont/tables.php" role="button"><h3>volver a ingresos</h3></a>
</div>



<?php include('../cont/template/footer.php')  ?> 