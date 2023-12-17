<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Inventario</title>
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
    include("conexion.php");

    if (isset($_GET['id_inventario'])) {
        $id_inventario = $_GET['id_inventario'];
        $sql = "SELECT * FROM INVENTARIO WHERE id_inventario = $id_inventario";
        $resultado = mysqli_query($conn, $sql);
        $inventario = mysqli_fetch_assoc($resultado);
    }

    if (isset($_POST['enviar'])) {
        $id_inventario = $_POST['id_inventario'];
        $cantidad_stock = $_POST['cantidad_stock'];
        $entrada_inventario = $_POST['entrada_inventario'];
        $precio_entrada = $_POST['precio_entrada'];
        $salida_inventario = $_POST['salida_inventario'];
        $precio_salida = $_POST['precio_salida'];
        $producto = $_POST['producto'];

        $sql = "UPDATE INVENTARIO SET cantidad_inventario_stock='$cantidad_stock', entrada_inventario='$entrada_inventario', precio_entrada='$precio_entrada', salida_inventario='$salida_inventario', precio_salida='$precio_salida', producto='$producto' WHERE id_inventario=$id_inventario";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            echo "<script language='JavaScript'>
            alert('Los datos fueron actualizados correctamente en la BD');
            location.assign('inventario.php')</script>";
        } else {
            echo "<script language='JavaScript'>
            alert('ERROR: Los datos NO fueron actualizados correctamente en la BD');
            location.assign('inventario.php')</script>";
        }

        mysqli_close($conn);
    } else {
    ?>
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="id_inventario" value="<?php echo $inventario['id_inventario']; ?>">
                <label>Cantidad en Stock:</label>
                <input type="text" name="cantidad_stock" class="form-control" value="<?php echo $inventario['cantidad_inventario_stock']; ?>">
                <label>Entrada Inventario:</label>
                <input type="text" name="entrada_inventario" class="form-control" value="<?php echo $inventario['entrada_inventario']; ?>">
                <label>Precio Entrada:</label>
                <input type="text" name="precio_entrada" class="form-control" value="<?php echo $inventario['precio_entrada']; ?>">
                <label>Salida Inventario:</label>
                <input type="text" name="salida_inventario" class="form-control" value="<?php echo $inventario['salida_inventario']; ?>">
                <label>Precio Salida:</label>
                <input type="text" name="precio_salida" class="form-control" value="<?php echo $inventario['precio_salida']; ?>">
                <label>Producto:</label>
                <input type="text" name="producto" class="form-control" value="<?php echo $inventario['producto']; ?>">
                <input type="submit" name="enviar" value="ACTUALIZAR" class="btn btn-primary btn-block">
                <a href="inventario.php" class="btn btn-secondary btn-block">Regresar</a>
            </form>
        </div>
    <?php
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>
