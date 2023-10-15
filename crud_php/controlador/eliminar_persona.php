<?php
if (!empty($_GET["id"])) {
    // Obtén el ID de forma segura
    $id = $_GET["id"];

    // Prepara la consulta SQL para eliminar la persona
    $sql = $conexion->prepare("DELETE FROM persona WHERE id_persona=$id");
    if ($sql==1) {
        echo '<div class="alert alert-success">Persona eliminada correctamente</div>';
        // Redirigir a la página de jugadores después de eliminar
        header("Location: jugadores.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo '<div class="alert alert-danger">Error al eliminar persona: ' . $sql->error . '</div>';
    }
}    

?>
