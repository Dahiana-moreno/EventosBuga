<?php
$nombre_usuario = !empty($_POST['c1']) ? $_POST['c1'] : '';
$email = !empty($_POST['c2']) ? $_POST['c2'] : '';
$telefono = !empty($_POST['c3']) ? $_POST['c3'] : '';
$password = !empty($_POST['c4']) ? $_POST['c4'] : '';

$foto = $_FILES["foto"]["name"];
$archivo = $_FILES["foto"]["tmp_name"];
$destino = "";
$url_imagen = '';

include('conexion.php'); // Asegúrate de que esta línea está en la parte superior del script


if(!empty($_FILES["foto"]["name"])) {
   

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

if(!$archivo){
    $destino = "../img/default.png";
}else {
    $move = move_uploaded_file($archivo, $destino);

if (!$move) {
    $codigo = $_FILES['foto']['error'];
    echo 'codigo error: ' . $codigo;
    echo 'la imagen  no pudo ser movida';
} 
}
}

if($nombre_usuario&&$email&&$telefono&&$password&&$destino){
    $pass = md5($password);
    include('conexion.php');
    $consulta=<<<FIN
    insert into usuarios
    (user,email,telefono,password,foto)
    values
    ('$nombre_usuario','$email','$telefono','$pass','$destino')
FIN;
    if(!mysqli_query($conexion,$consulta)){
        die('No se pudo agregar el registro');
    }
}
header('Location: ../index.php');