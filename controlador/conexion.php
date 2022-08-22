<?php
    //Conexión a la base de datos php con el usuario  y contraseña 

    $conexion = mysqli_connect('localhost','root','','eventos');
    if(mysqli_connect_error()){
        die('No se puede conectar a la base de datos'.mysqli_connect_error());
    }

?>

<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "eventos");
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
?>
