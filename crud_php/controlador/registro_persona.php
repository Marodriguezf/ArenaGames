<?php
if (isset($_POST["btnregistrar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["correo"]) && !empty($_POST["password"]) && !empty($_POST["avatar"])) {
        $usuario = $_POST["usuario"];
        $correo = $_POST["correo"];
        $password = $_POST["password"];
        $avatar = $_POST["avatar"];

        // Corrige la consulta y la declaración bind_param
        $sql = $conexion->prepare("INSERT INTO persona (usuario, correo, password, avatar) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $usuario, $correo, $password, $avatar);

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
