<?php
// Función global para registrar actividad
function registrarActividad($conn, $id_usuario, $tipoActividad) {
    // Función interna para detectar el tipo de dispositivo
    function getDeviceType() {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('/mobile/i', $userAgent)) {
            return 'Móvil';
        } elseif (preg_match('/tablet/i', $userAgent)) {
            return 'Tablet';
        } else {
            return 'Ordenador';
        }
    }

    
    $fechaActual = date('Y-m-d H:i:s');
    
    
    $dispositivo = getDeviceType();

    
    $query_actividad = "INSERT INTO actividad_usuario (id_usuario, tipo_actividad, fecha, dispositivo) VALUES (?, ?, ?, ?)";
    $ejecucion_actividad = $conn->prepare($query_actividad);
    $ejecucion_actividad->execute([$id_usuario, $tipoActividad, $fechaActual, $dispositivo]);
}



// Para un registro
//                      registrarActividad($conn, $usuario_id, 'registro');

// Para un logeo
//                     registrarActividad($conn, $usuario_id, 'logeo');

// Para un cambio de contraseña
//                     registrarActividad($conn, $usuario_id, 'cambio_contrasena');
?>