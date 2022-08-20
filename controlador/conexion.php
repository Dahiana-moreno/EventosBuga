<?php
    //Conexión a la base de datos php con el usuario  y contraseña 

    $conexion = mysqli_connect('localhost','root','','eventos');
    if(mysqli_connect_error()){
        die('No se puede conectar a la base de datos'.mysqli_connect_error());
    }

?>

<?php
class Conexion
{

    public static function conectar()
    {

        $link = new PDO("mysql:host=localhost;dbname=eventos",
            "root",
            "");

        $link->exec("set names utf8");

        return $link;

    }

}
?>
