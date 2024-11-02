<?php
include '../includes/conexion.php';
$sql = "SELECT * FROM actividad_usuario";
$stmt = $conn->prepare($sql);
$stmt->execute();
$actividades = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados como un arreglo asociativo
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/tables.css">
</head>

<body>
    <h1>Registro de actividades de usuario</h1>

    <table border="2">
        <thead>
        <tr>
            <th>Id</th>
            <th>Id del usuario</th>
            <th>Tipo de la actividad</th>
            <th>Fecha</th>
            <th>Dispositivo</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($actividades as $actividad): ?>
            <tr>
                <td><?php echo ($actividad['id_actividad_usuario']); ?></td>
                <td><?php echo ($actividad['id_usuario']); ?></td>
                <td><?php echo ($actividad['tipo_actividad']); ?></td>
                <td><?php echo ($actividad['fecha']); ?></td>
                <td><?php echo ($actividad['dispositivo']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>