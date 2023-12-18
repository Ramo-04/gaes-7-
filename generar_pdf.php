<?php
// Incluye la biblioteca TCPDF
require_once('tcpdf/tcpdf.php');
include("conexion.php");

$filtro_producto = isset($_GET['producto']) ? $_GET['producto'] : '';
$filtro_entrada = isset($_GET['entrada']) ? $_GET['entrada'] : '';
$filtro_salida = isset($_GET['salida']) ? $_GET['salida'] : '';

$sql = "SELECT * FROM INVENTARIO WHERE 1";

if (!empty($filtro_producto)) {
    $sql .= " AND producto LIKE '%$filtro_producto%'";
}

if (!empty($filtro_entrada)) {
    $sql .= " AND entrada_inventario = $filtro_entrada";
}

if (!empty($filtro_salida)) {
    $sql .= " AND salida_inventario = $filtro_salida";
}

$resultado = mysqli_query($conn, $sql);

// Crear instancia de TCPDF
$pdf = new TCPDF();
$pdf->SetAutoPageBreak(true, 10);

// Agregar una página
$pdf->AddPage();

// Encabezado de la tabla
$html = '<table border="1">
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Entrada Inventario</th>
                <th>Salida Inventario</th>
                <th>Precio Entrada</th>
                <th>Precio Salida</th>
            </tr>';

// Contenido de la tabla
while ($filas = mysqli_fetch_assoc($resultado)) {
    $html .= "<tr>
                <td>{$filas['id_inventario']}</td>
                <td>{$filas['producto']}</td>
                <td>{$filas['entrada_inventario']}</td>
                <td>{$filas['salida_inventario']}</td>
                <td>{$filas['precio_entrada']}</td>
                <td>{$filas['precio_salida']}</td>
            </tr>";
}

$html .= '</table>';

// Agregar la tabla al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Nombre del archivo PDF
$nombre_archivo = 'reporte_inventario.pdf';

// Enviar el PDF como descarga
$pdf->Output($nombre_archivo, 'D');

// Cerrar la conexión
mysqli_close($conn);
?>
