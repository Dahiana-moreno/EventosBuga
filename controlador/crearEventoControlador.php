<?php
@session_start();
if (isset($_SESSION["usuario"])) {
    $usuario=$_SESSION["usuario"];
}

$nombre_evento = !empty($_POST['c1']) ? $_POST['c1'] : '';
$descripcion_evento = !empty($_POST['c2']) ? $_POST['c2'] : '';
$fecha = !empty($_POST['c3']) ? $_POST['c3'] : '';
$foto = !empty($_POST['c4']) ? $_POST['c4'] : '';



if ($nombre_evento && $descripcion_evento && $fecha) {
    include('conexion.php');    

    
    $consulta = <<<FIN
    insert into eventos
    (nombreEvento,descripcionEvento,fecha,id_usuario)
    values
    ('$nombre_evento','$descripcion_evento','$fecha','$usuario')
FIN;
    if (!mysqli_query($conexion, $consulta)) {
        die('No se pudo agregar el registro');
       
    }
}
header("Location: ../seguridad/vista2.php");

