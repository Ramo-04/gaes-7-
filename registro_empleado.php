<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "promec_jr2";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];


// Obtener datos del formulario
$usuario = $_POST['usuario'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contrasena = $_POST['contrasena'];

// Insertar nuevo empleado en la tabla EMPLEADO
$sql_empleado = "INSERT INTO EMPLEADO (sueldo_bruto, cargo, nombre_completo_empleado) 
                 VALUES (0, 'Nuevo Empleado', 'Nuevo Empleado')";
$conn->query($sql_empleado);

// Obtener el ID del nuevo empleado
$id_empleado = $conn->insert_id;

// Insertar nuevo usuario en la tabla USUARIO con el rol correspondiente
$sql_usuario = "INSERT INTO USUARIO (usuario, direccion, correo, telefono, contraseña, id_empleado, id_rol) 
                VALUES ('$usuario', '$direccion', '$correo', '$telefono', '$contrasena', $id_empleado, 1)";

if ($conn->query($sql_usuario) === TRUE) {
    echo "Registro exitoso para el nuevo empleado.";
} else {
    echo "Error: " . $sql_usuario . "<br>" . $conn->error;
}
header("Location: Index(Administrador).html");
exit();
?>
// Cerrar la conexión a la base de datos
$conn->close();
?>
