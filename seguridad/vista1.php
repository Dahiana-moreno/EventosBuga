<?php
@session_start();
if (isset($_SESSION['usuario'])) {   
    header("Location: vista2.php");
} 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>EVENTOS BUGA</title>
        
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../recursos/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../index.php">EVENTOS BUGA</a>
                <!-- LO NECESITO PARA MOSTRAR EL NOMBRE DEL USUARIO CUANDO INICIE SESION-->
<!--                 Bienvenido: <a  href="logueo/perfil.php?id=<?= $_SESSION['usuario_id'] ?>"><strong><?= $_SESSION['usuario_nombre'] ?></strong></a><br />-->
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../vista/loguin.php">Iniciar Sesión</a></li>
                        <li class="nav-item"><a class="nav-link" href="../vista/crearCuenta.php">Crear Cuenta</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">PRUEBA</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">

                        <!-- PRUEBA DE COMO SE VEN LOS EVENTOS-->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>                                              
                                            <th>Imagen</th>


                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>                                              
                                            <th>Imagen</th>

                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        include_once "docenteModelo.php";
                                        $docenteModelo = new docenteModelo();
                                        $result = $docenteModelo->mostrarTodos();
                                        $contador = 0;
                                        while ($fila = mysqli_fetch_array($result)) {

                                            if ($fila != NULL) {
                                                $contador++;


                                                echo '<tr>
                                            <td> <img src="' . $fila['foto'] . '" class="rounded float-left" width="80" height="80" ></td>
                                            <td>' . $fila['nombre'] . '</td>
                                            <td>' . $fila['carrera'] . '</td>
                                            <td>' . $fila['telefono'] . '</td>
                
                <td>
               <a href="#" onclick="eliminarModal(' . $fila['id'] . ')" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                <i class="fas fa-trash"></i>
                </a>
                <a href="docenteModificarVista.php?id=' . $fila['id'] . '" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Modificar">
                <i class="fas fa-edit"></i>
                </a>
                <a href="#" onclick="asignarMateria(' . $fila['id'] . ')" class="btn btn-success  btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Asignar materia">
                <i class="fas fa-list-alt"></i>
                </a>
                <a href="#" onclick="asignarDisponibilidad(' . $fila['id'] . ')" class="btn btn-warning  btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Asignar disponibilidad">
                <i class="fas fa-clock"></i>
                </a>
                <a href="docentePDF.php?id=' . $fila['id'] . '" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Generar PDF">
                <i class="fas fa-edit"></i>
                </a>
                </td>
                </tr>';
                                            }
                                        }
                                        ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>


                    </div> 
                    }
                    <!-- ESTE BOTON ES PARA LLEVAR A LA PARTE DE ABOUT -->
                    <!--                        <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>-->
                </div>
            </div>
        </div>
    </header>

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2022 - Hi school musical Company </div></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="../recursos/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>


//<?php
@session_start();
//include '../controlador/conexion.php';
//if (isset($_SESSION['id_usuario'])) {
//    header("Location: vista2.php");
//    exit();
//}
//?>