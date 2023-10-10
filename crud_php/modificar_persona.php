<?php
include "modelo/conexion.php";

// Verificar si 'id' está definido en $_GET
if (isset($_GET["id"])) {
    // Obtener el valor de 'id' 
    $id = mysqli_real_escape_string($conexion, $_GET["id"]);

    // Consulta SQL para obtener los datos de la persona con el ID especificado
    $sql = $conexion->query("SELECT * FROM persona WHERE id_persona = '$id'");

    if (!$sql) {
        die("Error en la consulta SQL: " . $conexion->error);
    }
} else {
    // Manejar el caso en el que 'id' no está definido
    echo "El parámetro 'id' no está definido en la URL.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar perfil</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text-secondary">Modificar perfil</h3>
        <input type= "hidden" name="id" value="<?= $_GET["id"]?>">
        <?php
        include "controlador/Modificar_Persona.php";
        if ($sql && $datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cedula</label>
                <input type="text" class="form-control" name="cedula" value="<?= $datos->cedula ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha_nac ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" value="<?= $datos->correo ?>">
            </div>
        <?php } else {
            echo "No se encontraron datos para modificar.";
        }
        ?>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Guardar Cambios</button>
    </form>
</body>

</html>
