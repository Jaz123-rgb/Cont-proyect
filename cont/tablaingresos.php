<?php include('../cont/template/header.php')?>


<?php  include('../cont/template/loh_tablesin.php')  ?>



<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Adicionar Egresos
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="txtDatein">fecha:</label>
                    <input type="date" class="form-control" id="txtDatein" name="txtDatein" placeholder="Ingreso">
                </div>
                <div class="form-group">
                    <label for="txtConceptoin">Concepto</label>
                    <input type="text" class="form-control" id="txtConceptoin" name="txtConceptoin" placeholder="Concepto">
                </div>

                <div class="form-group">
                    <label for="txtImportein">Importe</label>
                    <input type="number" class="form-control" id="txtImportein" name="txtImportein" placeholder="Importe">
                </div>
                <div class="form-group">
                    <label for="txtIvain">IVA:</label>
                    <input type="number" class="form-control" id="txtIvain" name="txtIvain" placeholder="IVA">
                </div>
                <div class="form-group">

                       <label for="txtmonTotalsend"><h3>Monto total </h3></label>
                    <label for="txtmonTotal"><h3> $<?php echo $txtMonTotalin;  ?> </h3></label>
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregarin" class="btn btn-success">Agregar</button>
                    
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
<a name="" id="" class="btn btn-primary" href="../cont/Show_tables.php" role="button">Ver tabla con ingreso y egresos</a>
</div>







<?php include('../cont/template/footer.php')  ?>
