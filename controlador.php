<?php
if (!empty($_POST["btn"])) {
    if (empty($_POST["email"])) {
        echo '<div class="alert alert-danger">Ingresa una direccion de correo</div>';
    } else {
        $usuario = $_POST["email"];

        $sql = $conexion->query("select * from Usuarios where email='$usuario'");

        if ($datos = $sql->fetch_object()) {
            header("location:inicio.html");
        } else {
            echo '<div class="alert alert-danger">Usuario no encontrado</div>';
        }
    }
}
?>