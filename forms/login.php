<?php
session_start();
include '../includes/conexion.php';

    $correo = $_POST['email']; // Capturar el correo del formulario
    $contrasena = $_POST['password']; // Capturar la contraseña del formulario

    // Preparar la consulta para verificar el correo
    $query = "SELECT * FROM usuario WHERE correo = ?";
    $ejecucion = $conn->prepare($query);
    $ejecucion->execute([$correo]);

    // Llamar a la función para verificar las credenciales
    




    $usuario=$ejecucion->fetch(PDO::FETCH_ASSOC);

    if (!$usuario || !password_verify($contrasena, $usuario['contrasena'])) {
    echo "Correo o contraseña incorrectos";
    return;
    }
    
    $_SESSION['usuario_id'] = $usuario['id_usuario']; 
    
    $queryRol = "SELECT rol FROM rol WHERE id_usuario = ?";
    $ejecucionRol = $conn->prepare($queryRol);
    $ejecucionRol->execute([$usuario['id_usuario']]);
    $rol = $ejecucionRol->fetch(PDO::FETCH_ASSOC);


    include '../includes/act-usuario.php';
    registrarActividad($conn, $usuario['id_usuario'], 'logeo');
    



    if ($rol) {
        switch ($rol['rol']) {
            case 'admin':
                header("Location: ../pages/dashbord.html");
                break;
            case 'recepcionista':
                header("Location: ../pages/recepcionista.php");
                break;
            case 'cliente':
                header("Location: ../pages/index.php");
                break;
            default:
                echo "Rol no reconocido.";
        }
    } else {
        echo "No se encontró el rol del usuario.";
    }

    


?>
