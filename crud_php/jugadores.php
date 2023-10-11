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
    <!-- Link Css -->
    <link rel="stylesheet" href="./Estilos/estilosCrud.css">
    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/1c7ea47b2b.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="./Imagenes/Logo Arena 2.png" alt="Logo" width="66" height="80" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Registro de Jugadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jugadores.php">Jugadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registrar Torneo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Torneos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        function eliminar() {
            var respuesta = confirm("Estas seguro que deseas eliminar");
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

    <!-- footer -->
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#"></a>
                    <img src="./imagenes/Logo Arena 2.png" alt="Logo arena">
                </figure>
            </div>

            <div class="box">
                <h2>Sobre Nosotros</h2>
                <p>Somos una plataforma que organiza torneos y eventos relacionados con el mundo gamer</p>
            </div>

            <div class="box">
                <h2> Siguenos</h2>
                <div class="red-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-whatsapp"></a>
                </div>

            </div>
        </div>
        <div class="grupo-2">
            <small>&copy;2023 <b>Arena Gaming Pro</b> Todos los derechos reservados</small>


    </footer>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>