<?php

date_default_timezone_set("America/Caracas");
$hora = date("Y-m-d H:i:s");   

include ("../conexion/conexion.php");
@$id_alumno = $_GET['id'];
$consulta="SELECT * FROM alumnos WHERE id_alumno='$id_alumno'";
$ejecutar=mysqli_query($conexion, $consulta);

while ($row=mysqli_fetch_array($ejecutar)){
  
  $id = $row[0];
  $fecha = $row[1];
  $nombre = $row[2];
  $apellidos = $row[3];
  $edad = $row[4];
  $grado = $row[5];
  $turno = $row[6];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP MYSQL</title>
    <Script src="../librerias/materialize/jquery-3.5.0.min.js"></Script>
    <Script src="../librerias/materialize/js/materialize.min.js"></Script>
    <link rel="stylesheet" href="../librerias/materialize/css/materialize.min.css">

    <script>  
      $(document).ready(function(){
        id = $("#id_alumnos").val();

        if (id > 0) {
          $("#frm_registrar").hide();
        }

        if (id=="") {
          $('#frm_actualizar').hide();
        }

      });
    </script>
</head>
<body>
    
    <input type="hidden" name="id_alumnos" id="id_alumnos" value="<?php echo $id_alumno; ?>">
    <div class="row">

        <!-- formulario registro-->
        <div class="col l4"  style="position: absolute; top:10%;" id="frm_registrar">
            <h5 class="green-text" style="margin: 8%;">Registro de Alumnos</h5>
            <form action="control.php" method="POST">

              <div class="input-field col l5">
                <input type="text" name="fecha" value="<?php echo $hora ?>" placeholder="">
                <label for="fecha">Fecha</label>
              </div>

              <div class="input-field col l12">
                <input type="text" name="nombre" value="" placeholder="">
                <label for="nombre">Nombre</label>
              </div>

              <div class="input-field col l12">
                <input type="text" name="apellidos" value="" placeholder="">
                <label for="apellidos">Apellidos</label>
              </div>

              <div class="input-field col l4">
                <input type="text" name="edad" value="" placeholder="">
                <label for="edad">Edad</label>
              </div>

              <div class="input-field col l4">
                <input type="text" name="grado" value="" placeholder="">
                <label for="grado">Grado</label>
              </div>

              <div class="input-field col l4">
                <input type="text" name="turno" value="" placeholder="">
                <label for="turno">Turno</label>
              </div>

              <div class="input-field col l2">
              <button class="btn waves-effect waves-light" type="submit" name="btn_guardar">
                  <i class="material-icons center">Guardar</i>
              </button>
              </div>

            </form>
        </div>

        <!-- tabla -->
        <div class="col l7 offset-l5"  style="position: absolute; top: 10%;">

        <table>
        <h5 class="green-text" style="top: 15%;">Lista</h5><br>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha registro</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Grado</th>
                    <th>Turno</th>
                    <th></th>
                </tr>
            </thead>

            <?php
                include("../conexion/conexion.php");
                $sql="SELECT * FROM alumnos";
                $ejecutar=mysqli_query($conexion, $sql);
                while ($fila=mysqli_fetch_array($ejecutar)) {
                    # code...
            ?>

            <tbody>
                <tr>
                    <td><?php echo $fila[0]; ?></td>
                    <td><?php echo $fila[1]; ?></td>
                    <td><?php echo $fila[2]; ?></td>
                    <td><?php echo $fila[3]; ?></td>
                    <td><?php echo $fila[4]; ?></td>
                    <td><?php echo $fila[5]; ?></td>
                    <td><?php echo $fila[6]; ?></td>
                    <td>
                  <a class="btn-small center white-text" href="index.php?id=<?php echo $fila[0]; ?>">Editar</a>
              </td>
                </tr>
            </tbody>

            <?php
            }
            ?>

        </table>
        </div>
      </div>
        
      <div class="row">
        <!-- formulario actualizar-->
        <div class="col l4"  style="position: absolute; top:10%;" id="frm_actualizar">
            <h5 class="green-text" style="margin: 8%;">Editar información</h5><br>
            <form action="control.php" method="POST">

              <div class="input-field col l5">
                <input type="text" name="fecha" value="<?php echo $fecha;?>" placeholder="">
                <label for="fecha">Fecha</label>
              </div>

              <div class="input-field col l4">
                <input type="text" name="id" value="<?php echo $id ?>" placeholder="">
                <label for="id">Id</label>
              </div>

              <div class="input-field col l12">
                <input type="text" name="nombre" value="<?php echo $nombre ?>" placeholder="">
                <label for="nombre">Nombre</label>
              </div>

              <div class="input-field col l12">
                <input type="text" name="apellidos" value="<?php echo $apellidos ?>" placeholder="">
                <label for="apellidos">Apellidos</label>
              </div>

              <div class="input-field col l4">
                <input type="text" name="edad" value="<?php echo $edad ?>" placeholder="">
                <label for="edad">Edad</label>
              </div>

              <div class="input-field col l4">
                <input type="text" name="grado" value="<?php echo $grado ?>" placeholder="">
                <label for="grado">Grado</label>
              </div>

              <div class="input-field col l4">
                <input type="text" name="turno" value="<?php echo $turno ?>" placeholder="">
                <label for="turno">Turno</label>
              </div>

              <div class="input-field col l4">
              <button class="btn-small teal accent-4" name="btn_actualizar">
                  <i class="center">Actualiza</i>
              </button>
              </div>

              <div class="input-field col l4">
              <button class="btn-small  teal darken-4" name="btn_eliminar">
                  <i class="center">Eliminar</i>
              </button>
              </div>

              <div class="input-field col l4">
              <a href="index.php" class="btn-small waves-light"  name="btn_guardar">
                  <i class="center">Regresar</i>
              </a>
              </div>

            </form>
        </div>
      </div>
</body>
</html>