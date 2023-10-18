<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Jugadores</title>
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
    
    <h1 class="text-center p-3">Registro de Jugadores</h1>
    <?php
    include "modelo/conexion.php";

    // Variable para controlar si se debe mostrar el formulario
    $mostrarFormulario = true;

    // Si se hace clic en el botón "Registrar", procesar el formulario aquí

    if (isset($_POST["btnregistrar"])) {
        // Incluye el controlador para registrar la persona
        include "controlador/registro_persona.php";
    }
    ?>
    <div class="form">
        <?php if ($mostrarFormulario) { ?>
            <form class="content col-4 p-3 m-auto" method="POST" enctype="multipart/form-data">
                <h1 id="title">Registrate</h1>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="correo">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">avatar</label>
                    <input type="file" class="form-control" name="avatar" accept="image/jpg, image/jpeg, image/png, image/webp"  onchange="actualizarimg()">
                </div>
                <div class="btn-field">
                    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
                </div>
            </form>
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