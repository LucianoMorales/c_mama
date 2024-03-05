<?php
include('../conexionesbd/conexion.php');

// Obtén los datos JSON del cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

// Accede a la cédula del array asociativo
$paciente_modificar = $data['cedula'];

// Realiza la consulta SQL utilizando la cédula
$sql = "call datos_historial('$paciente_modificar')";
$result = $con->query($sql);

$response = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Agrega los datos al array de respuesta
        $response[] = $row;
    }
}

// Devuelve la respuesta en formato JSON
echo json_encode($response);

// Cierra la conexión u realiza otras acciones necesarias
$con->close();
?>
