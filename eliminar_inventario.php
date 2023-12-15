<?php
$id_inventario = $_GET['id_inventario'];
include("conexion.php");

$sql = "DELETE FROM INVENTARIO WHERE id_inventario = '$id_inventario'";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo "<script language='JavaScript'>
    alert('Los datos se eliminaron correctamente de la BD');
    location.assign('inventario.php');
    </script>";
} else {
    echo "<script language='JavaScript'>
    alert('Los datos NO se eliminaron correctamente de la BD');
    location.assign('inventario.php');
    </script>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Inventario</title>
</head>

<body>

</body>

</html>
