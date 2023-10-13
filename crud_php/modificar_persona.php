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
                        <a class="nav-link" href="../torneos.html">Torneos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../crud_php/index.php">Registrate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jugadores.php">Jugadores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="form">
        <form class="content col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">Perfil de usuario</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            include "controlador/Modificar_Persona.php";
            if ($sql && $datos = $sql->fetch_object()) { ?>
                <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" value="<?= $datos->usuario ?>">
                </div>
                <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" value="<?= $datos->correo ?>">
                </div>
                <div class="mb-3">
                <label for="password" class="form-label">password</label>
                    <input type="text" class="form-control" name="password" value="<?= $datos->password ?>">
                </div>
                <div class="mb-3">
                <label for="avatar" class="form-label">avatar</label>
                    <input type="file" class="form-control" name="avatar" value="<?= $datos->avatar ?>">
                </div>

            <?php } else {
                echo "No se encontraron datos para modificar.";
            }
            ?>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Guardar Cambios</button>
        </form>
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