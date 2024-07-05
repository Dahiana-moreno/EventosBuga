<?php
// Verificar si se ha proporcionado un ID de evento válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Incluir el archivo del modelo de eventos
    include_once "../modelo/eventosModelo.php";

    // Crear una instancia del modelo de eventos
    $eventosModelo = new eventosModelo();

    // Obtener el ID del evento de la URL
    $idEvento = $_GET['id'];

    // Obtener los detalles del evento a editar
    $evento = $eventosModelo->obtenerEventoPorId($idEvento);

    // Verificar si el evento existe
    if ($evento) {
        // Procesar el formulario de edición si se ha enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nuevoNombre = $_POST['nuevoNombre'];
            $nuevaDescripcion = $_POST['nuevaDescripcion'];
            $nuevaFecha = $_POST['nuevaFecha'];
            $nuevaFoto = $_FILES['nuevaFoto']['name'];
            $archivo = $_FILES['nuevaFoto']['tmp_name'];
            $destino = "../img/" . $nuevaFoto;

            // Verificar si se cargó una nueva imagen
            if (!empty($nuevaFoto)) {
                // Mover la imagen al directorio de destino
                $move = move_uploaded_file($archivo, $destino);
                if (!$move) {
                    $codigo = $_FILES['nuevaFoto']['error'];
                    echo 'Código de error: ' . $codigo;
                    echo 'La imagen no pudo ser movida';
                }
            } else {
                // Si no se cargó una nueva imagen, conservar la imagen existente
                $destino = $evento['foto'];
            }

            // Llamar a la función editar() con los nuevos datos
            $editar = $eventosModelo->editar($idEvento, $nuevoNombre, $nuevaDescripcion, $nuevaFecha, $destino);

            // Verificar si la edición fue exitosa
            if ($editar) {
                // Redirigir a la página de misEventos.php después de la edición
                header("Location: http://localhost/Proyecto%20Registrador%20de%20eventos/Eventos1/vista/misEventos.php");
                exit(); // Asegurar que el script se detenga después de la redirección
            } else {
                // Si hubo un error en la edición, mostrar un mensaje de error
                echo "Hubo un error al intentar editar el evento.";
            }
        }
        ?>

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Evento</title>
             <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="recursos/assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../recursos/css/styles.css" rel="stylesheet" />

        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        </head>
        <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../seguridad/vista2.php">EVENTOS BUGA</a>
                
                <!-- MOSTRAR CUANDO INICIE SESION-->
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">                      
                        <li class="nav-item"><a class="nav-link" href="../vista/misEventos.php">Mis Eventos</a></li>
                        <li class="nav-item"><a class="nav-link" href="../seguridad/vista2.php">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link" href="../controlador/cerrarSesion.php">Cerrar Sesión</a></li>
                                                
                    </ul>                     
                </div>                
            </div>
       
        </nav>

        <header class="masthead">

             <div class="row gx-4 gx-lg-5 justify-content-center">
             <div class="col-lg-8 col-xl-6 text-center">
            <h1 class="text-white font-weight-bold">Editar Evento</h1>
            <hr class="divider" />
             </div>
             </div>
             <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
             <div class="col-lg-6">
            <form method="post" action="" enctype="multipart/form-data">
                <!-- Campos de edición -->
               
                <label for="nuevoNombre">Nuevo Nombre:</label>
                <input class="form-control" type="text" name="nuevoNombre" value="<?php echo $evento['nombreEvento']; ?>"><br>
                
                <label for="nuevaDescripcion">Nueva Descripción:</label>
                <textarea class="form-control" name="nuevaDescripcion"><?php echo $evento['descripcionEvento']; ?></textarea><br>

                <label for="nuevaFecha">Nueva Fecha:</label>
                <input class="form-control" type="date" name="nuevaFecha" value="<?php echo $evento['fecha']; ?>"><br>
                <label for="nuevaFoto">Nueva Foto:</label>
                <input type="file" name="nuevaFoto"><br>
                
                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                <!-- Botón de enviar -->
                <div class="d-grid">
                <button class="btn btn-primary btn-xl" type="submit" value="Guardar Cambios">Guardar Cambios</button>
                </div>
            </form>
             </div>
        </div>
            </header>
            <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - JDE - Juntos Desarrollando la Experiencia </div></div>
    </footer>
        </body>
        </html>

        <?php
    } else {
        echo "El evento que intentas editar no existe.";
    }
} else {
    echo "ID de evento inválido.";
}
?>
