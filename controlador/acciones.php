<?php
// Verificar si se ha proporcionado un ID de evento válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Incluir el archivo del modelo de eventos
    include_once "../modelo/eventosModelo.php";

    // Crear una instancia del modelo de eventos
    $eventosModelo = new eventosModelo();

    // Obtener el ID del evento de la URL
    $idEvento = $_GET['id'];

    // Ejecutar la función eliminar() si se ha solicitado
    if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar') {
        // Ejecutar la función eliminar() con el ID del evento
        $eliminado = $eventosModelo->eliminar($idEvento);

        // Verificar si el evento fue eliminado correctamente
        if ($eliminado) {
            // Redirigir a misEventos.php después de la eliminación
            header("Location: http://localhost/Proyecto%20Registrador%20de%20eventos/Eventos1/vista/misEventos.php");
            exit(); // Asegurar que el script se detenga después de la redirección
        } else {
            // Si hubo un error en la eliminación, mostrar un mensaje de error
            echo "Hubo un error al intentar eliminar el evento.";
            exit(); // Terminar la ejecución del script
        }
    }

    // Ejecutar la función editar() si se ha solicitado
    if (isset($_GET['accion']) && $_GET['accion'] === 'editar') {
        header("Location: http://localhost/Proyecto%20Registrador%20de%20eventos/Eventos1/controlador/editarEvento.php?id=$idEvento");
        exit(); // Asegurar que el script se detenga después de la redirección
    }

} else {
    // Si no se proporcionó un ID de evento válido en la URL, mostrar un mensaje de error
    echo "ID de evento inválido.";
    exit(); // Terminar la ejecución del script
}
