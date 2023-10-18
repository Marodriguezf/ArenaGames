<?php
if (isset($_POST["btnregistrar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["correo"]) && !empty($_POST["password"])) {
        $id = $_POST["id"];
        $usuario = $_POST["usuario"];
        $correo = $_POST["correo"];
        $password = $_POST["password"];
        $avatar = null;

        // Verificar si se cargó una nueva imagen
        $avatar = $_POST["avatar_actual"]; // Usar el avatar actual como valor predeterminado

        if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] === UPLOAD_ERR_OK) {
            $uploadDir = "../imagenes/";
            $avatarName = basename($_FILES["avatar"]["name"]);
            $uploadPath = $uploadDir . $avatarName;
        
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $uploadPath)) {
                $avatar = $avatarName; // Usar la nueva imagen si se cargó
            }
                
        } else {
            // Usar la imagen existente si no se cargó una nueva
            $avatar = $_POST["avatar_actual"];
        }

        // Preparar la consulta SQL
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

