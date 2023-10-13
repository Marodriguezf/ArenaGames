<?php
if (!empty($_GET["id"])) {
    // Obtén el ID de forma segura
    $id = intval($_GET["id"]);

    // Prepara la consulta SQL para eliminar la persona
    $sql = $conexion->prepare("DELETE FROM persona WHERE id_persona = ?");
    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        echo '<div class="alert alert-success">Persona eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar persona: ' . $conexion->error . '</div>';
    }
} else {
    echo '<div class="alert alert-warning">ID de persona no proporcionado</div>';
}

?>
