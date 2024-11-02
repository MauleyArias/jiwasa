<?php
class Cconexion {
    function ConexionBD() {
        $host = 'localhost';
        $dbname = 'jiwasa1'; // Cambia esto al nombre de tu base de datos
        $username = ''; // Deja vacío si usas autenticación de Windows
        $password = ''; // Deja vacío si usas autenticación de Windows

        try {
            $conn = new PDO("sqlsrv:Server=$host;Database=$dbname", $username, $password);
            return $conn;
        } catch (PDOException $exp) {
            echo "No se conectó a la base de datos: $dbname, error: " . $exp->getMessage();
            return null;
        }
    }
}

$conexion = new Cconexion();
$conn = $conexion->ConexionBD();
?>
