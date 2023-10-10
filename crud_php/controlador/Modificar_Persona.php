<?php
if (isset($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["cedula"]) and !empty($_POST["fecha"]) and !empty($_POST["correo"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula = $_POST["cedula"];
        $fecha_nac = $_POST["fecha"];
        $correo = $_POST["correo"];

       
        $sql = $conexion->query("UPDATE persona SET nombre='$nombre', apellido='$apellido', cedula=$cedula, fecha_nac='$fecha_nac', correo='$correo' WHERE id_persona=$id");

        if ($sql == 1) {
            header("location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar persona</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Campos vacíos</div>";
    }
}
