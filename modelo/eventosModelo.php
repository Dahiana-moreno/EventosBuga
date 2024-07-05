
<?php

include_once '../controlador/conexion.php';

class eventosModelo {


    function mostrarTodos() {
        global $conexion;
        $consulta = "SELECT * FROM `eventos`";
        $query = mysqli_query($conexion, $consulta);
        return $query;
    }

    function mostrar($id) {
        global $conexion;
        $consulta = "SELECT * FROM `eventos` WHERE id = $id";
        $query = mysqli_query($conexion, $consulta);
        return $query;
    }   


    function ultimoId() {
        global $conexion;
        $consulta = "SELECT * FROM `eventos`";
        $query = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_array($query)) {

            if ($fila != NULL) {
                $id = $fila['id'];
            }
        }
        return $id;
    }

    function editar($idEvento, $nuevoNombre, $nuevaDescripcion, $nuevaFecha, $nuevaFoto){
        global $conexion;
        $consulta = "UPDATE `eventos` SET nombreEvento = ?, descripcionEvento = ?, fecha = ?, foto = ? WHERE id_eventos = ?";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "ssssi", $nuevoNombre, $nuevaDescripcion, $nuevaFecha, $nuevaFoto, $idEvento);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $resultado;
    }
    
    
    function eliminar($idEvento){
        global $conexion;
        $consulta = "DELETE FROM `eventos` WHERE id_eventos = $idEvento";

        $query = mysqli_query($conexion, $consulta);
        if($query) {
            return true; // Devuelve true si la eliminación fue exitosa
        } else {
            return false; // Devuelve false si hubo un error en la eliminación
        }

    }


   
    function obtenerEventoporId($idEvento) {
        global $conexion;
        $consulta = "SELECT * FROM `eventos` WHERE id_eventos = $idEvento";
        $query = mysqli_query($conexion, $consulta);
        if($query && mysqli_num_rows($query) > 0) {
            $evento = mysqli_fetch_assoc($query);
            return $evento;
        } else {
            return null;
        }
    }   

}

?>

