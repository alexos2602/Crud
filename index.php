<?php

date_default_timezone_set("America/Caracas");
$hora = date("Y-m-d H:i:s");

include("conexion/conexion.php");
@$id_alumno = $_GET['id'];
$consulta = "SELECT * FROM alumnos WHERE id_alumno='$id_alumno'";
$ejecutar = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($ejecutar)) {

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
  <Script src="librerias/materialize/jquery-3.5.0.min.js"></Script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script>
    $(document).ready(function() {
      id = $("#id_alumnos").val();

      if (id > 0) {
        $("#frm_registrar").hide();
      }

      if (id == "") {
        $('#frm_actualizar').hide();
      }

    });
  </script>

</head>

<body>

  <div class="container-lg">

    <input type="hidden" name="id_alumnos" id="id_alumnos" value="<?php echo $id_alumno; ?>">

    <div class="row">

      <!-- formulario registro-->
      <div class="col-md-5 py-5" id="frm_registrar">

        <h5 class="pb-4">Registro de Alumnos</h5>

        <form action="control.php" method="POST">

          <div class="form-row mb-2">
            <div class="col-md-6">
              <label for="fecha">Fecha</label>
              <input type="text" name="fecha" class="form-control form-control-sm" value="<?php echo $hora ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-sm-6">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" value="" class="form-control form-control-sm" placeholder="Ingrese Nombre">
            </div>

            <div class="form-group col-sm-6">
              <label for="apellidos">Apellidos</label>
              <input type="text" name="apellidos" value="" class="form-control form-control-sm" placeholder="Ingrese Apellidos">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-sm-6">
              <label for="edad">Edad</label>
              <input type="text" name="edad" value="" class="form-control form-control-sm" placeholder="Ingrese edad">
            </div>

            <div class="form-group col-sm-6">
              <label for="grado">Grado</label>
              <input type="text" name="grado" value="" class="form-control form-control-sm" placeholder="Ingrese grado">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6">
              <label for="turno">Turno</label>
              <input type="text" name="turno" value="" class="form-control form-control-sm" placeholder="Mañana o Tarde">
            </div>
          </div>

          <button class="btn btn-primary mt-3" type="submit" name="btn_guardar">Guardar</button>

        </form>
      </div>

      <!-- formulario actualizar-->
      <div class="col-md-5 py-5" id="frm_actualizar">
        <h5 class="pb-4">Editar información</h5><br>
        <form action="control.php" method="POST">

          <div class="form-row">
            <div class="form-group col-sm-6">
              <label for="fecha">Fecha</label>
              <input type="text" name="fecha" class="form-control form-control-sm" value="<?php echo $fecha; ?>" placeholder="Ingrese fecha">
            </div>

            <div class="form-group col-sm-6">
              <label for="id">Id</label>
              <input type="text" name="id" class="form-control form-control-sm" value="<?php echo $id ?>" placeholder="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-sm-6">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" class="form-control form-control-sm" value="<?php echo $nombre ?>" placeholder="">
            </div>

            <div class="form-group col-sm-6">
              <label for="apellidos">Apellidos</label>
              <input type="text" name="apellidos" class="form-control form-control-sm" value="<?php echo $apellidos ?>" placeholder="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-sm-6">
              <label for="edad">Edad</label>
              <input type="text" name="edad" class="form-control form-control-sm" value="<?php echo $edad ?>" placeholder="">
            </div>

            <div class="form-group col-sm-6">
              <label for="grado">Grado</label>
              <input type="text" name="grado" class="form-control form-control-sm" value="<?php echo $grado ?>" placeholder="">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6">
              <label for="turno">Turno</label>
              <input type="text" name="turno" class="form-control form-control-sm" value="<?php echo $turno ?>" placeholder="">
            </div>
          </div>


          <div class="row justify-content-center">
            <div class="col-auto">
              <button class="btn btn-primary mt-4" name="btn_actualizar">
                Actualizar
              </button>
            </div>

            <div class="col-auto">
              <button class="btn btn-danger mt-4" name="btn_eliminar">
                Eliminar
              </button>
            </div>

            <div class="col-auto">
              <a href="index.php" class="btn btn-secondary mt-4" name="btn_guardar">Regresar</a>
            </div>

          </div>

        </form>
      </div>

      <!-- tabla -->
      <div class="col-md-7 py-md-5">
        <h5>Lista</h5>
        <table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Fecha registro</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellidos</th>
              <th scope="col">Edad</th>
              <th scope="col">Grado</th>
              <th scope="col">Turno</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <?php
          include("conexion/conexion.php");
          $sql = "SELECT * FROM alumnos";
          $ejecutar = mysqli_query($conexion, $sql);
          while ($fila = mysqli_fetch_array($ejecutar)) {
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
                  <a class="btn btn-primary btn-sm" href="index.php?id=<?php echo $fila[0]; ?>">Editar</a>
                </td>
              </tr>
            </tbody>

          <?php
          }
          ?>

        </table>
      </div>


    </div>




</body>

</html>