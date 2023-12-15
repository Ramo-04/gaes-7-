<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background: url('Fondo.jpg') no-repeat center center fixed;
            background-size: cover;
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
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #0056b3;
        }

        .btn-block {
            display: block;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $producto = $_POST['nombre_servicio'];
        $descripcionServicio = $_POST['descripcion_servicio'];
        $calidadServicio = $_POST['calidad_servicio'];
        $idEmpleado = $_POST['id_empleado'];
        $duracionServicio = $_POST['duracion_servicio'];

        include("conexion.php");

        $sql = "INSERT INTO SERVICIO (nombre_servicio, descripcion_servicio, calidad_servicio, id_empleado, duracion_servicio) VALUES ('$producto', '$descripcionServicio', '$calidadServicio', '$idEmpleado', '$duracionServicio')";

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
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label>Nombre del Servicio:</label>
                <input type="text" name="nombre_servicio" class="form-control">
                <label>Descripción:</label>
                <input type="text" name="descripcion_servicio" class="form-control">
                <label>Calidad:</label>
                <input type="text" name="calidad_servicio" class="form-control">
                <label>ID empleado:</label>
                <input type="text" name="id_empleado" class="form-control">
                <label>Duración del Servicio:</label>
                <input type="text" name="duracion_servicio" class="form-control">
                <input type="submit" name="enviar" value="AGREGAR" class="btn btn-primary btn-block">
                <a href="servicio.php" class="btn btn-secondary btn-block">Regresar</a>
            </form>
        </div>
    <?php
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>
