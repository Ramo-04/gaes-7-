<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar - Panel de Administrador Promec</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    body {
        background-color: #c4bdbc;
        font-family: Arial, sans-serif;
    }

    .container {
        padding: 20px;
    }

    .panel-administrador {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    .panel-administrador h2 {
        color: #ff0000;
    }

    .form-agregar {
        margin-top: 20px;
    }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="panel-administrador">
                    <h2 class="text-center mb-4">Agregar Nuevo Servicio</h2>

                    <?php
                    if (isset($_POST['enviar'])) {
                        $idServicio = $_POST['id_servicio'];
                        $nombreServicio = $_POST['nombre_servicio'];
                        $descripcionServicio = $_POST['descripcion_servicio'];
                        $calidadServicio = $_POST['calidad_servicio'];
                        $idEmpleado = $_POST['id_empleado'];
                        $duracionServicio = $_POST['duracion_servicio'];

                        include("conexion.php");

                        $sql = "INSERT INTO SERVICIO (id_servicio, nombre_servicio, descripcion_servicio, calidad_servicio, id_empleado, duracion_servicio) VALUES ('$idServicio', '$nombreServicio', '$descripcionServicio', '$calidadServicio', '$idEmpleado', '$duracionServicio')";

                        $resultado = mysqli_query($conn, $sql);

                        if ($resultado) {
                            echo "<script language='JavaScript'>
                            alert('Los datos fueron ingresados correctamente a la BD');
                            location.assign('Index.html')</script>";
                        } else {
                            echo "<script language='JavaScript'>
                            alert('ERROR: Los datos NO fueron ingresados correctamente a la BD');
                            location.assign('Index.html')</script>";
                        }
                        mysqli_close($conn);
                    } else {
                    ?>

                    <form class="form-agregar" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <label>ID del Servicio: </label>
                        <input type="text" name="id_servicio"> <br>
                        <label>Nombre del Servicio: </label>
                        <input type="text" name="nombre_servicio"> <br>
                        <label>Descripción: </label>
                        <input type="text" name="descripcion_servicio"> <br>
                        <label>Calidad: </label>
                        <input type="text" name="calidad_servicio"> <br>
                        <label>ID empleado: </label>
                        <input type="text" name="id_empleado"> <br>
                        <label>Duracion del Servicio: </label>
                        <input type="text" name="duracion_servicio"> <br>
                        <input type="submit" name="enviar" value="AGREGAR" class="btn btn-primary">
                        <a href="servicio.php" class="btn btn-secondary">Regresar</a>
                    </form>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>