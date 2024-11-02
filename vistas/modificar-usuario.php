<?php
// Conexión a la base de datos
require '../includes/conexion.php';

// Obtener el id del usuario desde la URL
$id_usuario = $_GET['id'];

// Consulta para obtener los datos del usuario actual
$query = $conn->prepare("SELECT u.id_usuario, u.correo,  
        du.nombres, du.apellido_paterno, du.apellido_materno, du.nacionalidad, du.edad, 
        r.rol 
        FROM usuario u 
        INNER JOIN datos_usuario du ON u.id_usuario = du.id_usuario
        INNER JOIN rol r ON u.id_usuario = r.id_usuario
        WHERE u.id_usuario = :id");
$query->bindParam(':id', $id_usuario);
$query->execute();
$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Solo actualizar los campos que han cambiado
    $correo = $_POST['correo'] ?? $usuario['correo'];
    $nombres = $_POST['nombres'] ?? $usuario['nombres'];
    $apellido_paterno = $_POST['apellido_paterno'] ?? $usuario['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'] ?? $usuario['apellido_materno'];
    $nacionalidad = $_POST['nacionalidad'] ?? $usuario['nacionalidad'];
    $edad = $_POST['edad'] ?? $usuario['edad'];
    $rol = $_POST['rol'] ?? $usuario['rol'];

    // Actualizar solo si el campo ha cambiado
    $updateQueryUsuario = $conn->prepare("UPDATE usuario 
                                          SET correo = :correo
                                          WHERE id_usuario = :id");

    $updateQueryDatosUsuario = $conn->prepare("UPDATE datos_usuario 
                                               SET nombres = :nombres, 
                                                   apellido_paterno = :apellido_paterno, 
                                                   apellido_materno = :apellido_materno, 
                                                   nacionalidad = :nacionalidad, 
                                                   edad = :edad
                                               WHERE id_usuario = :id");

    $updateQueryRol = $conn->prepare("UPDATE rol 
                                      SET rol = :rol 
                                      WHERE id_usuario = :id");

    // Binding de parámetros
    $updateQueryUsuario->bindParam(':correo', $correo);
    $updateQueryUsuario->bindParam(':id', $id_usuario);

    $updateQueryDatosUsuario->bindParam(':nombres', $nombres);
    $updateQueryDatosUsuario->bindParam(':apellido_paterno', $apellido_paterno);
    $updateQueryDatosUsuario->bindParam(':apellido_materno', $apellido_materno);
    $updateQueryDatosUsuario->bindParam(':nacionalidad', $nacionalidad);
    $updateQueryDatosUsuario->bindParam(':edad', $edad);
    $updateQueryDatosUsuario->bindParam(':id', $id_usuario);

    $updateQueryRol->bindParam(':rol', $rol);
    $updateQueryRol->bindParam(':id', $id_usuario);

    // Ejecutar las consultas de actualización
    try {
        $conn->beginTransaction(); // Empezar la transacción
        $updateQueryUsuario->execute();
        $updateQueryDatosUsuario->execute();
        $updateQueryRol->execute();
        $conn->commit(); // Hacer commit si todo sale bien
        echo "Usuario actualizado exitosamente.";
        header('Location: ../pages/dashbord.html'); // Redirigir a la lista de usuarios
        exit;
    } catch (PDOException $e) {
        $conn->rollBack(); // Revertir si hay un error
        echo "Error al actualizar el usuario: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="../css/modificar-user.css">

    <link rel="stylesheet" href="../css/fonts.css">
  <?php include '../includes/fonts.php'; ?>
</head>

<body>
    <div class="container">
        <h1>Modificar Usuario</h1>
        <form method="post" class="form">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required><br>

            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" value="<?php echo htmlspecialchars($usuario['nombres']); ?>" required><br>

            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" name="apellido_paterno" value="<?php echo htmlspecialchars($usuario['apellido_paterno']); ?>" required><br>

            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" name="apellido_materno" value="<?php echo htmlspecialchars($usuario['apellido_materno']); ?>" required><br>

            <label for="nacionalidad">Nacionalidad:</label>
            <input type="text" name="nacionalidad" value="<?php echo htmlspecialchars($usuario['nacionalidad']); ?>" required><br>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required><br>

            <label for="rol">Rol:</label>
            <input type="text" name="rol" value="<?php echo htmlspecialchars($usuario['rol']); ?>" required><br>

            <button type="submit" class="btn-submit">Guardar cambios</button>
        </form>
    </div>
</body>

</html>