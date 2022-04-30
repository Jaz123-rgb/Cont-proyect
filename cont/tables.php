<?php include('../cont/template/header.php')?>


<?php   include('../cont/template/log-_tables.php') ?>



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
                    <input type="text" class="form-control" id="txtConcepto" name="txtConcepto" placeholder="Concepto">
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

                       <label for="txtmonTotalsend"><h3>Monto total </h3></label>
                    <label for="txtmonTotal"><h3> $<?php echo $txtMonTotal;   ?> </h3></label>
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
<a name="" id="" class="btn btn-primary" href="../cont/tablaingresos.php" role="button">Agrega Egresos</a>
<a name="" id="" class="btn btn-primary" href="../cont/tablaingresos.php" role="button">Convierte a Excel</a>


</div>





<?php include('../cont/template/footer.php')  ?>
