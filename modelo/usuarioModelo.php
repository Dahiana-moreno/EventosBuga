
<?php

include_once '../controlador/conexion.php';

class usuarioModelo {

    function mostrarTodos() {
        global $conexion;
        $consulta = "SELECT * FROM `usuarios`";
        $query = mysqli_query($conexion, $consulta);
        return $query;
    }

    function mostrar($id) {
        global $conexion;
        $consulta = "SELECT * FROM `usuarios` WHERE id = $id";
        $query = mysqli_query($conexion, $consulta);
        return $query;
    }   


    function ultimoId() {
        global $conexion;
        $consulta = "SELECT * FROM `usuarios`";
        $query = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_array($query)) {

            if ($fila != NULL) {
                $id = $fila['id'];
            }
        }
        return $id;
    }

}

?>
