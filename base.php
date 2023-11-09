<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta base de datos</title>
</head>
<body>
    <h2>Datos de Empleado solicitado</h2>

    <?php
    // Código de empleado, como solo hay 4 he puesto el primero
    $codigo_empleado = 1;

    // conexión a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'empresa');

    // Verifica la conexión
    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }

    // Consultar la base de datos para obtener los datos del empleado
    $consulta = "SELECT * FROM empleados WHERE CodEmple = $codigo_empleado";
    $resultado = $conexion->query($consulta);

    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Muesta los  siguientes datos del empleado
        $empleado = $resultado->fetch_assoc();
        echo '<p>Nombre: ' . $empleado['Nombre'] . '</p>';
        echo '<p>Apellido1: ' . $empleado['Apellido1'] . '</p>';
        echo '<p>Apellido2: ' . $empleado['Apellido2'] . '</p>';
        echo '<p>Departamento: ' . $empleado['Departamento'] . '</p>';
    } else { // Si no encuentra resultados muestra el siguiente mensaje
        echo '<p>No se encontraron datos para el código de empleado ' . $codigo_empleado . '</p>';
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
    ?>
</body>
</html>
