<?php
session_start();
include '../includes/conexion.php';

$id_usuario=$_SESSION['usuario_id'];

$query= "SELECT u.*, d.*FROM usuario u INNER JOIN datos_usuario d ON u.id_usuario=d.id_usuario WHERE u.id_usuario=?";
$ejecucion= $conn->prepare($query);
$ejecucion->execute([$id_usuario]);

$resultados = $ejecucion->fetchall(PDO::FETCH_ASSOC);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mi-cuenta.css">


    <link rel="stylesheet" href="../css/fonts.css">
  <?php include '../includes/fonts.php'; ?>
</head>
<body>
    <section class="mi-cuenta">
        <div class="mi-cuenta__container">
            <header class="mi-cuenta__header">
                <div class="mi-cuenta__logo-container">
                    <img src="../assets/image/jiwasa-logo.png" alt="">
                </div>
                <nav class="mi-cuenta__navbar">
                    <ul>
                        <li><a href="">Mi cuenta</a></li>
                        <li><a href="">Historial de reservas</a></li>
                        <li><a href="">Volver</a></li>
                    </ul>
                </nav>
            </header>
            <div class="mi-cuenta__data-container">
                <div class="mi-cuenta__info-container">
                    <h2>Datos personales</h2>
                    <p><strong>Nombre:</strong>&nbsp;<?php echo $resultados[0]['nombres'] ?></p>
                    <p><strong>Apellidos:</strong>&nbsp;<?php echo $resultados[0]['apellido_paterno'] ?>&nbsp;<?php echo $resultados[0]['apellido_materno'] ?></p>
                    <p><strong>Nacionalidad:</strong>&nbsp;<?php echo $resultados[0]['nacionalidad'] ?></p>
                    <p><strong>Edad:</strong>&nbsp;<?php echo $resultados[0]['edad'] ?></p>
                    <p><strong>Correo:</strong>&nbsp;<?php echo $resultados[0]['correo'] ?></p>
                    <button>Cambiar datos personales</button>
                </div>
                <div class="mi-cuenta__aditional">

                </div>
            </div>

        </div>
        
    </section>
</body>
</html>