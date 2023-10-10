<?php
// Variable para controlar si se debe mostrar la tabla
$mostrarTabla = true;

// Verifica si se envió una solicitud de eliminación
if (isset($_GET['eliminar']) && is_numeric($_GET['eliminar'])) {
    $idPersonaEliminar = $_GET['eliminar'];
    // Incluye el controlador para eliminar la persona
    include "controlador/eliminar_persona.php";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/1c7ea47b2b.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <script>
        function eliminar(){
            var respuesta=confirm("Estas seguro que deseas eliminar");
            return respuesta

        }
    </script>
    <h1>Jugadores Registrados</h1>
    <?php
    include "modelo/conexion.php";
    ?>
    <div class="container-fluid">
        <?php if ($mostrarTabla) { ?>
            <div class="col-8 p-4 m-auto">
                <table class="table">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">APELLIDOS</th>
                            <th scope="col">CÉDULA</th>
                            <th scope="col">FECHA DE NACIMIENTO</th>
                            <th scope="col">CORREO</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $conexion->query('SELECT * FROM persona');
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <td><?= $datos->id_persona ?></td>
                                <td><?= $datos->nombre ?></td>
                                <td><?= $datos->apellido ?></td>
                                <td><?= $datos->cedula ?></td>
                                <td><?= $datos->fecha_nac ?></td>
                                <td><?= $datos->correo ?></td>
                                <td>
                                    <a href="modificar_persona.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-warning"><i class="fas fa-edit"></i></a>
                                    <a onclick="return eliminar()" href="jugadores.php? id=<?= $datos->id_persona ?>" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <p>No hay datos disponibles para mostrar en la tabla.</p>
        <?php } ?>
    </div>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
