<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventario - Pro Mec</title>
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
      padding: 20px;
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
?>


  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="tabla-inventario">
          <h2 class="text-center mb-4">Inventario</h2>
          <form method="GET" action="">
            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="producto">Producto:</label>
                <input type="text" name="producto" class="form-control" value="<?php echo $filtro_producto; ?>">
              </div>
              <div class="col-md-4 form-group">
                <label for="entrada">Entrada Inventario:</label>
                <input type="number" name="entrada" class="form-control" value="<?php echo $filtro_entrada; ?>">
              </div>
              <div class="col-md-4 form-group">
                <label for="salida">Salida Inventario:</label>
                <input type="number" name="salida" class="form-control" value="<?php echo $filtro_salida; ?>">
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
          </form><br>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Producto</th>
                <th>Entrada Inventario</th>
                <th>Salida Inventario</th>
                <th>Precio Entrada</th>
                <th>Precio Salida</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                while($filas = mysqli_fetch_assoc($resultado)){
              ?>
              <tr>
                <td><?php echo $filas['id_inventario']?></td>
                <td><?php echo $filas['producto']?></td>
                <td><?php echo $filas['entrada_inventario']?></td>
                <td><?php echo $filas['salida_inventario']?></td>
                <td><?php echo $filas['precio_entrada']?></td>
                <td><?php echo $filas['precio_salida']?></td>
                <td>
<?php echo "<a href='actualizar_inventario.php?id_inventario=".$filas['id_inventario']."'>ACTUALIZAR</a>";?>
                  -
<?php echo "<a href='eliminar_inventario.php?id_inventario=".$filas['id_inventario']."'onclick='return confirmar()'>ELIMINAR</a>";?>
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
          <a href="agregar_inventario.php" class="btn btn-eliminar btn-block">Agregar Inventario</a>
          <a href="Index(Administrador).html" class="btn btn-volver btn-block mt-3">Volver al Inicio</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
