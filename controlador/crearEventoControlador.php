<?php
@session_start();
if (isset($_SESSION["usuario"])) {
    $usuario=$_SESSION["usuario"];
}

$nuevoNombre = $_POST['nuevoNombre'];
$nuevaDescripcion = $_POST['nuevaDescripcion'];
$nuevaFecha = $_POST['nuevaFecha'];
$nuevaFoto = $_FILES['nuevaFoto']['name'];
$archivo = $_FILES['nuevaFoto']['tmp_name'];
$destino = "../img/" . $nuevaFoto;


if (!empty($_FILES['foto']['name'])) {
    // El usuario ha subido una imagen desde su PC
    $foto = $_FILES["foto"]["name"];
    $archivo = $_FILES["foto"]["tmp_name"];
    $directorio_img = __DIR__ . '/../img';

      // Crear el directorio si no existe
      if (!is_dir($directorio_img)) {
        mkdir($directorio_img, 0755, true);
      }

    $destino = $directorio_img . '/' . $foto;
    $move = move_uploaded_file($archivo, $destino);

if (!$move) {
    $codigo = $_FILES['foto']['error'];
    echo 'codigo error: ' . $codigo;
    echo 'la imagen  no pudo ser movida';
    exit;
} 
}else if (!empty($_POST['c4'])) {
    $url_imagen = $_POST['c4'];
}

if ($nombre_evento && $descripcion_evento && $fecha && ($destino || $url_imagen)) {
    include('conexion.php');    

    $imagen_para_insertar = !empty($destino) ? $destino : $url_imagen;

    $consulta = <<<FIN
    insert into eventos
    (nombreEvento,descripcionEvento,fecha,foto,id_usuario)
    values
    ('$nombre_evento','$descripcion_evento','$fecha','$imagen_para_insertar','$usuario')
FIN;
    if (!mysqli_query($conexion, $consulta)) {
        die('No se pudo agregar el registro');
       
    }
}
header("Location: ../seguridad/vista2.php");
ob_end_flush(); // Terminar la captura de salida

