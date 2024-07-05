<?php  
    class loguinModelo {

        function consultarUsuario($email,$password){
             include'../controlador/conexion.php';            
            $pass = md5($password);
            $consulta = "SELECT * FROM `usuarios` WHERE email='$email' AND password = '$pass'";
            $query = mysqli_query($conexion,$consulta);
            return $query;

        }
    }