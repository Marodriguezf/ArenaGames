<?php
if (isset($_POST["btnregistrar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["correo"]) && !empty($_POST["password"]) && isset($_FILES["avatar"])) {
        $usuario = $_POST["usuario"];
        $correo = $_POST["correo"];
        $password = $_POST["password"];
        $avatar = $_FILES["avatar"]["name"];
        $avatar_temp = $_FILES["avatar"]["tmp_name"];

        // Verifica si la imagen se ha cargado correctamente
        if (is_uploaded_file($avatar_temp)) {
            $uploadDir = "../imagenes";  
            $uploadPath = $uploadDir . basename($avatar);

            // Mueve la imagen cargada al directorio de destino
            if (move_uploaded_file($avatar_temp, $uploadPath)) {
                // Prepara la consulta SQL para insertar la persona con la ruta de la imagen
                $sql = $conexion->prepare("INSERT INTO persona (usuario, correo, password, avatar) VALUES (?, ?, ?, ?)");
                $sql->bind_param("ssss", $usuario, $correo, $password, $avatar);

                if ($sql->execute()) {
                    echo '<div class="alert alert-success">Persona registrada correctamente</div>';
                } else {
                    echo '<div class="alert alert-danger">Error al registrar persona: ' . $conexion->error . '</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Error al mover la imagen al servidor</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Error al cargar la imagen</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algunos campos están vacíos o la imagen no se ha cargado correctamente</div>';
    }
}


?>
