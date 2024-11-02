<?php
include '../includes/conexion.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];


$query= "DELETE FROM usuario WHERE id_usuario= ?";
$sentencia=$conn->prepare($query);

if($sentencia->execute([$id])){
    echo "<script>
                alert('Usuario eliminado correctamente.');
                window.location.href = '../pages/dashbord.html';  // Redirigir después de la alerta
        </script>";
    
}
else{
    echo "error";
}
}
else{
    echo "id no recibido";
}



?>