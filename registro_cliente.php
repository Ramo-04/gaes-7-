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

// Insertar nuevo cliente en la tabla CLIENTE
$sql_cliente = "INSERT INTO CLIENTE (solicitud_servicio, modificacion_servicio, nombre_completo_cliente) 
                VALUES (0, 0, 'Nuevo Cliente')";
$conn->query($sql_cliente);

// Obtener el ID del nuevo cliente
$id_cliente = $conn->insert_id;

// Insertar nuevo usuario en la tabla USUARIO con el rol correspondiente
$sql_usuario = "INSERT INTO USUARIO (usuario, direccion, correo, telefono, contraseña, id_cliente, id_rol) 
                VALUES ('$usuario', '$direccion', '$correo', '$telefono', '$contrasena', $id_cliente, 6)";

if ($conn->query($sql_usuario) === TRUE) {
    echo "Registro exitoso para el nuevo cliente.";
} else {
    echo "Error: " . $sql_usuario . "<br>" . $conn->error;
}
header("Location: Index(Usuario).html");
exit();
?>

// Cerrar la conexión a la base de datos
$conn->close();
?>
