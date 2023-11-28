<?php
$servername = "localhost";
$username = "animalre";
$password = "y367}A]y){K4Cg4";
$dbname = "animalre_database";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$idUsuario = $conn->real_escape_string($_COOKIE['usuario_id']); // Evitar SQL Injection

$sql = "SELECT v.producto, v.direccion, v.cantidad, v.fecha_venta, v.estado, v.precio_venta, m.decode 
        FROM Ventas_Tienda v
        JOIN ProductoTienda p ON v.producto = p.nombre_producto
        JOIN multimediaProductos m ON p.id = m.id_producto
        WHERE v.id_cliente = '$idUsuario'";

$result = $conn->query($sql);

$data = array(); // Arreglo para almacenar los datos

if ($result->num_rows > 0) {
    // Guardar los datos en el arreglo
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Cerrar conexión
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>