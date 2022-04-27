<?php include('../cont/template/header.php')?>


<?php

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtIngres = (isset($_POST['txtIngres']))?$_POST['txtIngres']:""; 
$txtImag = (isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";

include("../cont/config/db.php");



switch ($accion) {
    case "Agregar":
        // INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, 'libros de php', 'imagen.jpg');
        $sentenciaSQL = $conexion->prepare("INSERT INTO libros (nombre, imagen) VALUES (:nombre, :imagen);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':imagen',$txtImag);
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

?>



<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Adicionar ingresos
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" class="form-control" id="txtID" name="txtID" placeholder="ingreso">
                </div>

                <div class="form-group">
                    <label for="txtIngres">fecha:</label>
                    <input type="date" class="form-control" id="txtIngres" name="txtIngres"
                        placeholder="Ingreso">
                </div>
                <div class="form-group">
                    <label for="txtImagen">Concepto</label>
                    <input type="text" class="form-control" id="txtImagen" name="txtImagen" placeholder="ID">
                </div>

                <div class="form-group">
                    <label for="txtImagen">Importe</label>
                    <input type="text" class="form-control" id="txtImagen" name="txtImagen" placeholder="ID">
                </div>
                <div class="form-group">
                    <label for="txtImagen">Monot Total</label>
                    <input type="text" class="form-control" id="txtImagen" name="txtImagen" placeholder="ID">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
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
                <th>ingreso</th>
                <th>seccion-3</th>
                <th>seccion-3</th>
                <th>seccion-3</th>
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>
        <?php  foreach ($listaLibros as $libro) { ?>
            <tr>
                <td ><?php echo $libro['id']; ?></td>
                <td><?php echo $libro['nombre'] ?></td>
                <td><?php echo $libro['imagen'] ?></td>

                <td>
                    seleccionar|Borrar
                    <form method="POST">
                  <input type="hidden " name="txtID" value="<?php echo $libro['id']; ?>"/>
                  <input type="submit" name="accion" value="selleccionar" class="btn btn-primary"/>
                  <input type="submit" name="accion" value="borrar" class="btn btn-warning" />
                  </form>
                </td>
            </tr>
        <?php   } ?>
        </tbody>
    </table>



</div>




<?php include('../cont/template/footer.php')  ?>