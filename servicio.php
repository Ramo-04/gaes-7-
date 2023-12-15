<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio - Pro Mec</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #c4bdbc;
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 0px;
        }

        .tabla-inventario {
            background-color: #fff;
            border-radius: 10px;
            padding: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .tabla-inventario h2 {
            color: #ff0000;
        }

        .agregar-insumo {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .btn-redondeado {
            border-radius: 50px;
            background-color: #ff0000;
            color: #ffffff;
        }

        .btn-redondeado:hover {
            background-color: #ff3333;
        }

        .eliminar-insumo {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .btn-eliminar {
            border-radius: 50px;
            background-color: #ff0000;
            color: #ffffff;
        }

        .btn-eliminar:hover {
            background-color: #ff3333;
        }

        .btn-volver {
            border-radius: 50px;
            background-color: #ff0000;
            color: #ffffff;
        }

        .btn-volver:hover {
            background-color: #ff3333;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás Seguro?, se eliminarán los datos');
        }
    </script>
</head>

<body>
    <?php
        include("conexion.php");

        $sql = "SELECT * FROM SERVICIO";

        $filtros = [];

        $calidad_filtro = isset($_POST["calidad_filtro"]) ? $_POST["calidad_filtro"] : "";
        $duracion_filtro = isset($_POST["duracion_filtro"]) ? $_POST["duracion_filtro"] : "";

        if (isset($_POST["calidad_filtro"]) != "") {
            $filtros[] = "calidad_servicio LIKE '%{$_POST["calidad_filtro"]}%'";
        }

        if (isset($_POST["duracion_filtro"]) != "") {
            $filtros[] = "duracion_servicio = {$_POST["duracion_filtro"]}";
        }

        if (!empty($filtros)) {
            $sql .= " WHERE " . implode(" AND ", $filtros);
        }

        $resultado = mysqli_query($conn, $sql);
    ?>

    <form action="" method="post">
        <form action="servicios.php" method="post">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="tabla-inventario">
                            <h2 class="text-center mb-4">Servicio</h2>
                            <form action="servicios.php" method="post">
                            <div class="form-group">
                             <label for="calidad_filtro">Calidad:</label>
                             <input type="text" class="form-control" name="calidad_filtro" placeholder="Calidad">
                            </div>
                            <div class="form-group">
                              <label for="duracion_filtro">Duración:</label>
                              <input type="number" class="form-control" name="duracion_filtro" placeholder="Duración">
                            </div>
                            <div class="form-group">
                             <input type="submit" class="btn btn-primary btn-block" value="Filtrar">
                            </div>
                            </form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID del Servicio</th>
                                        <th>Nombre del Servicio</th>
                                        <th>Descripción</th>
                                        <th>Calidad</th>
                                        <th>ID del Empleado</th>
                                        <th>Duración del Servicio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($filas = mysqli_fetch_assoc($resultado)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $filas['id_servicio'] ?></td>
                                            <td><?php echo $filas['nombre_servicio'] ?></td>
                                            <td><?php echo $filas['descripcion_servicio'] ?></td>
                                            <td><?php echo $filas['calidad_servicio'] ?></td>
                                            <td><?php echo $filas['id_empleado'] ?></td>
                                            <td><?php echo $filas['duracion_servicio'] ?></td>
                                            <td>
                                                <?php echo "<a href='actualizar_servicio.php?id_servicio=" . $filas['id_servicio'] . "'>Actualizar</a>"; ?>
                                                -
                                                <?php echo "<a href='eliminar_servicio.php?id_servicio=" . $filas['id_servicio'] . "' onclick='return confirmar()'> Eliminar</a>"; ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <?php
                            mysqli_close($conn);
                            ?>

                            <a href="agregar_servicio.php">
                                <h3 class="text-center mb-4 btn btn-volver btn-block mt-3">Agregar Servicio</h3>
                            </a>
                            <a href="Index(Administrador).html" class="btn btn-volver btn-block mt-3">Volver al Inicio</a>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
            </div>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </form>
    </form>
</body>
</html>