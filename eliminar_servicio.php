<?php
$idServicio = $_GET['id_servicio'];
include("conexion.php");

$sql = "DELETE FROM SERVICIO WHERE id_servicio = '$idServicio'";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo "<script language='JavaScript'>
    alert('Los datos se eliminaron correctamente de la BD');
    location.assign('Index(Administrador).html');
    </script>";
} else {
    echo "<script language='JavaScript'>
    alert('Los datos NO se eliminaron correctamente de la BD');
    location.assign('Index(Administrador).html');
    </script>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Servicio</title>
</head>

<body>

</body>

</html>