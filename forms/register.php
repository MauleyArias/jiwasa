<?php
session_start(); 

include '../includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['email'];
    $contrasena = $_POST['password'];
    $estado = "activo";

    
    $query = "SELECT * FROM usuario WHERE correo = ?";
    $ejecucion = $conn->prepare($query);
    $ejecucion->execute([$correo]);

    if ($ejecucion->rowCount() > 0) {
        echo "El usuario ya está registrado";
        exit;
    }

    try {
        $contrasenaEncrip = password_hash($contrasena, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuario (correo, contrasena, estado) VALUES (?, ?, ?)";
        $ejecucion = $conn->prepare($query);
        if ($ejecucion->execute([$correo, $contrasenaEncrip, $estado])) {
            echo "Usuario insertado correctamente.<br>";

            
            $usuario_id = $conn->lastInsertId();  
            

            
            $query_rol = "INSERT INTO rol (id_usuario, rol) VALUES (?, ?)";
            $ejecucion_rol = $conn->prepare($query_rol);
            $ejecucion_rol->execute([$usuario_id, 'cliente']);


            $_SESSION['usuario_id'] = $usuario_id;

            // Redirigir a la página de complemento de datos
            header("Location: ../pages/login-register-2.php");
            exit;
        } else {
            echo "Error al insertar el usuario.";
        }
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
        exit;
    }
    }


?>
