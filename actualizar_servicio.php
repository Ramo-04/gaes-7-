<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Servicio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #c4bdbc;
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
            margin-top: 50px;
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

        .form-actualizar {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
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
                    <h2 class="text-center mb-4">Actualizar Servicio</h2>

                    <?php
                    include("conexion.php");

                    if (isset($_POST['enviar'])) {
                        $idServicio = $_POST['id_servicio'];
                        $nombreServicio = $_POST['nombre_servicio'];
                        $descripcionServicio = $_POST['descripcion_servicio'];
                        $calidadServicio = $_POST['calidad_servicio'];
                        $idEmpleado = $_POST['id_empleado'];
                        $duracionServicio = $_POST['duracion_servicio'];

                        $sql = "UPDATE SERVICIO SET 
                            nombre_servicio = '$nombreServicio',
                            descripcion_servicio = '$descripcionServicio',
                            calidad_servicio = '$calidadServicio',
                            id_empleado = '$idEmpleado',
                            duracion_servicio = '$duracionServicio'
                            WHERE id_servicio = '$idServicio'";

                        $resultado = mysqli_query($conn, $sql);

                        if ($resultado) {
                            echo "<script language='JavaScript'>
                            alert('Los datos fueron actualizados correctamente en la BD');
                            location.assign('servicio.php')</script>";
                        } else {
                            echo "<script language='JavaScript'>
                            alert('ERROR: Los datos NO fueron actualizados correctamente en la BD');
                            location.assign('servicio.php')</script>";
                        }
                        mysqli_close($conn);
                    } else {
                        $idServicio = $_GET['id_servicio'];

                        $sql = "SELECT * FROM SERVICIO WHERE id_servicio = '$idServicio'";

                        $resultado = mysqli_query($conn, $sql);

                        $fila = mysqli_fetch_assoc($resultado);

                        $idServicio = $fila['id_servicio'];
                        $nombreServicio = $fila['nombre_servicio'];
                        $descripcionServicio = $fila['descripcion_servicio'];
                        $calidadServicio = $fila['calidad_servicio'];
                        $idEmpleado = $fila['id_empleado'];
                        $duracionServicio = $fila['duracion_servicio'];
                        mysqli_close($conn);
                    ?>

                    <form class="form-actualizar" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <label>ID del Servicio: </label>
                        <input type="text" name="id_servicio" value="<?php echo $idServicio ?>" readonly> <br>
                        <label>Nombre del Servicio: </label>
                        <input type="text" name="nombre_servicio" value="<?php echo $nombreServicio ?>"> <br>
                        <label>Descripción: </label>
                        <input type="text" name="descripcion_servicio" value="<?php echo $descripcionServicio; ?>"> <br>
                        <label>Calidad: </label>
                        <input type="text" name="calidad_servicio" value="<?php echo $calidadServicio; ?>"> <br>
                        <label>ID empleado: </label>
                        <input type="text" name="id_empleado" value="<?php echo $idEmpleado; ?>"> <br>
                        <label>Duracion del Servicio: </label>
                        <input type="text" name="duracion_servicio" value="<?php echo $duracionServicio; ?>"> <br>
                        <input type="hidden" name="id_servicio" value="<?php echo $idServicio; ?>">
                        <input type="submit" name="enviar" value="ACTUALIZAR" class="btn btn-primary">
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
