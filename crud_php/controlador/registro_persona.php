<?php
if (isset($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["cedula"]) && !empty($_POST["fecha"]) && !empty($_POST["correo"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula = $_POST["cedula"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];

        $sql = $conexion->prepare("INSERT INTO persona (id_persona, nombre, apellido, cedula, fecha_nac, correo) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param("isssss", $id, $nombre, $apellido, $cedula, $fecha, $correo);

        if ($sql->execute()) {
            echo '<div class="alert alert-success">Persona registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar persona: ' . $conexion->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algunos campos están vacíos</div>';
    }
}
?>
