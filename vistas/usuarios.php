<?php
// Conexión ya creada anteriormente
include '../includes/conexion.php';


$sql = "SELECT u.id_usuario, u.correo,  
        du.nombres, du.apellido_paterno, du.apellido_materno, du.nacionalidad, du.edad, 
        r.rol 
        FROM usuario u 
        INNER JOIN datos_usuario du ON u.id_usuario = du.id_usuario
        INNER JOIN rol r ON u.id_usuario = r.id_usuario";

$stmt = $conn->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);





?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
    <link rel="stylesheet" href="../css/tables.css">
    
</head>
<body>
    <h1>Lista de Usuarios</h1>
    
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Correo</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nacionalidad</th>
                <th>Edad</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['id_usuario']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['correo']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['nombres']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['apellido_paterno']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['apellido_materno']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['nacionalidad']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['edad']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['rol']); ?></td>
                    <td>
                    <a href="../vistas/modificar-usuario.php?id=<?php echo $usuario['id_usuario']; ?>">Modificar</a>
                        <a href="../includes/eliminar-user.php?id=<?php echo $usuario['id_usuario']; ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

