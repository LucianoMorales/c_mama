<?php

session_start();
include('../conexionesbd/conexion.php');
$data = json_decode(file_get_contents("php://input"), true);
$paciente_modificar = $data['cedula'];

$stmt = $con->prepare(" call datos_examenes(?)");
$stmt->bind_param("s", $paciente_modificar, );
$stmt->execute();
$datos_paciente = array();
if ($stmt->error) {
    echo "Error en la ejecución del procedimiento almacenado: " . $stmt->error;
  
} else {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $datos_paciente [] = $row;
             
            
        }
    
    
        // Convertir el array asociativo a formato JSON
        $json_resultado = json_encode($datos_paciente);
        
        // Enviar la respuesta JSON al cliente
        echo $json_resultado;
        
    } else {
        echo json_encode(array('error' => 'No se encontraron resultados.'));
    }
}
$stmt->close();
$con->close();
?>