<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #c4bdbc;
            font-family: Arial, sans-serif;
        }

        .agregar-insumo {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .agregar-insumo h3 {
            color: #ff0000;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-redondeado {
            border-radius: 50px;
            background-color: #ff0000;
            color: #ffffff;
        }

        .btn-redondeado:hover {
            background-color: #ff3333;
        }

        a {
            border-radius: 50px;
            background-color: #ff0000;
            color: #ffffff;
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 10px;
        }

        a:hover {
            background-color: #ff3333;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $producto = $_POST['producto'];
        $entradaInventario = $_POST['entrada'];
        $salidaInventario = $_POST['salida'];
        $precioEntrada = $_POST['precioEntrada'];
        $precioSalida = $_POST['precioSalida'];

        include("conexion.php");

        $sql = "INSERT INTO inventario (producto, entrada_inventario, salida_inventario, precio_entrada, precio_salida) VALUES ('$producto', '$entradaInventario', '$salidaInventario', '$precioEntrada', '$precioSalida')";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            echo "<script language='JavaScript'>
            alert('Los datos fueron ingresados correctamente a la BD');
            location.assign('inventario.php');
            </script>";
        } else {
            echo "<script language='JavaScript'>
            alert('ERROR: Los datos NO fueron ingresados correctamente a la BD');
            location.assign('inventario.php');
            </script>";
        }

        mysqli_close($conn);
    } else {
    ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="agregar-insumo container">
                <h3 class="text-center mb-4">Agregar Insumo</h3>
                <div class="form-group">
                    <label for="producto">Producto:</label>
                    <input type="text" class="form-control" id="producto" name="producto" required>
                </div>
                <div class="form-group">
                    <label for="entrada">Entrada Inventario:</label>
                    <input type="number" class="form-control" id="entrada" name="entrada" required>
                </div>
                <div class="form-group">
                    <label for="salida">Salida Inventario:</label>
                    <input type="number" class="form-control" id="salida" name="salida" required>
                </div>
                <div class="form-group">
                    <label for="precioEntrada">Precio Entrada:</label>
                    <input type="number" step="0.01" class="form-control" id="precioEntrada" name="precioEntrada" required>
                </div>
                <div class="form-group">
                    <label for="precioSalida">Precio Salida:</label>
                    <input type="number" step="0.01" class="form-control" id="precioSalida" name="precioSalida" required>
                </div>
                <button type="submit" name="enviar" class="btn btn-redondeado btn-block">Agregar</button>
                <a href="inventario.php" class="btn btn-redondeado btn-block">Volver</a>
            </div>
        </form>
    <?php
    }
    ?>
</body>

</html>
