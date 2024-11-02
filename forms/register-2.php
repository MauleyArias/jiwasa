<?php
session_start(); 

include '../includes/conexion.php';

// Verificar si el ID del usuario está en la sesión
if (!isset($_SESSION['usuario_id'])) {
    echo "No se ha encontrado un usuario al que complementar datos.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['usuario_id'];
    $nombre = $_POST['nombre'];
    $ApellidoP = $_POST['Ap'];
    $ApellidoM = $_POST['Am'];
    $nacionalidad = $_POST['nacionalidad'];
    $edad = $_POST['edad'];

    try {
        $query = "INSERT INTO datos_usuario (id_usuario, nombres, apellido_paterno, apellido_materno, nacionalidad, edad) VALUES (?, ?, ?, ?, ?, ?)";
        $ejecucion = $conn->prepare($query);
        $ejecucion->execute([$usuario_id, $nombre, $ApellidoP, $ApellidoM, $nacionalidad, $edad]);

        include '../includes/act-usuario.php';
        registrarActividad($conn, $_SESSION['usuario_id'], 'registro');

        echo "Detalles registrados correctamente";

        // Limpiar la sesión después de completar el registro
        unset($_SESSION['usuario_id']);
        header("Location: ../pages/login-register.php");
        exit;
    } catch (PDOException $e) {
        echo "Error al registrar los detalles: " . $e->getMessage();
        exit;
    }
}

?>







