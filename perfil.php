<?php
require 'conexion.php';

$idUsuario = $_COOKIE['usuario_id'];

$consulta = "SELECT nombre, email, celular, documento FROM Usuarios WHERE id = $idUsuario";

$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $nombre = $fila["nombre"];
    $email = $fila["email"];
    $telefono = $fila["celular"];
    $documento = $fila["documento"];
} else {
    die("Usuario no encontrado");
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        .banner {
            text-align: center;
        }

        body {
            background-color: #9dcd55;
        }

        .info-div {
            background-color: white; 
            border-radius: 10px; 
            padding: 20px; 
            text-align: center; 
        }

        .info-div ul {
            list-style: none;
            padding: 0;
        }

        .info-div li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="banner">
                    <img src="logoAnimalR.png">
                </div>
                <div class="info-div">
                    <ul>
                        <li> <?php echo $nombre; ?></li>
                        <li> <?php echo $email; ?></li>
                        <li><strong>Teléfono:</strong> <?php echo $telefono; ?></li>
                        <li><strong>Documento:</strong> <?php echo $documento; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>