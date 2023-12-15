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

// Consulta para verificar el usuario
$sql = "SELECT * FROM USUARIO 
        LEFT JOIN ROLES ON USUARIO.id_rol = ROLES.id_rol
        LEFT JOIN EMPLEADO ON ROLES.id_empleado = EMPLEADO.id_empleado
        LEFT JOIN CLIENTE ON ROLES.id_cliente = CLIENTE.id_cliente
        WHERE USUARIO.usuario = '$usuario' AND USUARIO.contraseña = '$contrasena'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    

    if (!empty($row['id_empleado'])) {

        header("Location: Index(Administrador).html");
        exit();
    } elseif (!empty($row['id_cliente'])) {

        header("Location: Index(Usuario).html");
        exit();
    } else {

        echo "Acceso denegado. No eres empleado ni cliente.";
    }
} else {

    echo "Acceso denegado. Usuario o contraseña incorrectos.";
}


$conn->close();
?>