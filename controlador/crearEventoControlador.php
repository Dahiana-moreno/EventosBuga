<?php


@session_start();
if (isset($_SESSION["usuario"])) {
    $usuario=$_SESSION["usuario"];
}

$nombre_evento = !empty($_POST['c1']) ? $_POST['c1'] : '';
$descripcion_evento = !empty($_POST['c2']) ? $_POST['c2'] : '';
$fecha = !empty($_POST['c3']) ? $_POST['c3'] : '';

$destino = '';
$url_imagen = '';

include('conexion.php'); // Asegúrate de que esta línea está en la parte superior del script

// Procesar la imagen según lo que haya enviado el usuario
if (!empty($_FILES['foto']['name'])) {
    // El usuario ha subido una imagen desde su PC
    $foto = $_FILES["foto"]["name"];
    $archivo = $_FILES["foto"]["tmp_name"];
    
  $buckName = $_ENV['BUCKET_NAME'];
  $urlStorage = $_ENV['URL_FIRESTORE'];
  $dirStorage = $_ENV['CARPETA_STORAGE'];


    $bucket = $storage->getBucket();


    $firebaseStoragePath = $dirStorage . $foto;

 $bucket->upload(
        fopen($archivo, 'r'),
        [
            'name' => $firebaseStoragePath,
            
        ]
    );

// Obtiene el objeto del archivo
$storageObject = $bucket->object($firebaseStoragePath);
$bucketName = $buckName;

// Ahora puedes usar el token para construir la URL completa
$imageUrl = $urlStorage . $bucketName . '/o/' . urlencode($firebaseStoragePath) . '?alt=media';


    $destino = $imageUrl;

    if (!$destino) {
        $codigo = $_FILES['foto']['error'];
        echo 'codigo error: ' . $codigo;
        echo 'la imagen no pudo ser subida a Firebase';
        exit;
    }
} else if (!empty($_POST['c4'])) {
    $url_imagen = $_POST['c4'];
}

if ($nombre_evento && $descripcion_evento && $fecha && ($destino || $url_imagen)) {

    $imagen_para_insertar = !empty($destino) ? $destino : $url_imagen;

    $consulta = <<<FIN
    insert into eventos
    (nombreEvento, descripcionEvento, fecha, foto, id_usuario)
    values
    ('$nombre_evento', '$descripcion_evento', '$fecha', '$imagen_para_insertar', '$usuario')
    FIN;

    if (!mysqli_query($conexion, $consulta)) {
        die('No se pudo agregar el registro: ' . mysqli_error($conexion));
    }
}

header("Location: ../seguridad/vista2.php");
ob_end_flush(); // Terminar la captura de salida
