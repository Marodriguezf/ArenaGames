<?php
if (isset($_POST["btnregistrar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["correo"]) && !empty($_POST["password"])) {
        $id = $_POST["id"];
        $usuario = $_POST["usuario"];
        $correo = $_POST["correo"];
        $password = $_POST["password"];

        // Manejo de la imagen de avatar
        $avatar = null; // Variable para almacenar la ruta del avatar

        if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] === UPLOAD_ERR_OK) {
            $uploadDir = "./imagenes/"; // Reemplaza con la ubicación deseada
            $uploadPath = $uploadDir . basename($_FILES["avatar"]["name"]);

            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $uploadPath)) {
                $avatar = $uploadPath;
            }
        } else {
            // Si no se cargó una nueva imagen, usa el valor existente
            $avatar = $_POST["avatar_existente"];
        }

        // Prepara la consulta SQL para actualizar la persona
        $sql = $conexion->prepare("UPDATE persona SET usuario=?, correo=?, password=?, avatar=? WHERE id_persona=?");
        $sql->bind_param("ssssi", $usuario, $correo, $password, $avatar, $id);

        if ($sql->execute()) {
            header("location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar persona: " . $conexion->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Campos vacíos</div>";
    }
}

