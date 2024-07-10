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
     
        <title>EVENTOS BUGA</title>

        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../recursos/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../recursos/estilos.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../index.php">EVENTOS BUGA</a>
             
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
                <div class="row gx-4 gx-lg-5 h-10 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h3 class="text-white font-weight-bold">Eventos</h3>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">

                       

                        <table class="table table-bordered table-hover table-fixed" >

                            <thead>
                                <tr style="width: 680px">
                                    <th style="width: 150px">Imagen</th>                                              
                                    <th style="width: 150px" >Evento</th>
                                    <th style="width: 380px" >Descripción</th>


                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                include_once "../modelo/eventosModelo.php";
                                $eventosModelo = new eventosModelo();
                                $result = $eventosModelo->mostrarTodos();
                                $contador = 0;
                                while ($fila = mysqli_fetch_array($result)) {

                                    if ($fila != NULL) {
                                        $contador++;


                                        echo '<tr style="width: 680px">
                                            <td style="width: 150px"> <img src="' . $fila['foto'] . '" class="rounded float-left" width="80" height="80" ></td>
                                            <td style="width: 150px" >' . $fila['nombreEvento'] . '</td>
                                            <td style="width: 363px" >' . $fila['descripcionEvento'] . '</td>                                  
                                             
                </tr>';
                                    }
                                }
                                ?>
                            </tbody>

                        </table>
                       
                    </div>
                </div>
            </div>
        </header>

        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - DayCode Todos los derechos reservados</div></div>
        </footer>
    
        <script src="../recursos/js/scripts.js"></script>
    </body>
</html>


