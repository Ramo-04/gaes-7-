<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Servicio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #c4bdbc;
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
            margin-top: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            color: #111a45;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-primary,
        .btn-secondary {
            border-radius: 50px;
            background-color: #ff0000;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #ff3333;
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
                            location.assign('servicio.php')</script>";
                        } else {
                            echo "<script language='JavaScript'>
                            alert('ERROR: Los datos NO fueron ingresados correctamente a la BD');
                            location.assign('servicio.php')</script>";
                        }
                        mysqli_close($conn);
                    } else {
                    ?>

                        <form class="form-agregar" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <label>ID del Servicio: </label>
                            <input type="text" name="id_servicio" class="form-control"> <br>
                            <label>Nombre del Servicio: </label>
                            <input type="text" name="nombre_servicio" class="form-control"> <br>
                            <label>Descripción: </label>
                            <input type="text" name="descripcion_servicio" class="form-control"> <br>
                            <label>Calidad: </label>
                            <input type="text" name="calidad_servicio" class="form-control"> <br>
                            <label>ID empleado: </label>
                            <input type="text" name="id_empleado" class="form-control"> <br>
                            <label>Duracion del Servicio: </label>
                            <input type="text" name="duracion_servicio" class="form-control"> <br>
                            <input type="submit" name="enviar" value="AGREGAR" class="btn btn-primary">
                            <a href="servicio.php" class="btn btn-secondary btn-block">Regresar</a>
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
