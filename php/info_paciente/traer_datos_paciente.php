<?php

session_start();
include('../conexionesbd/conexion.php');
$data = json_decode(file_get_contents("php://input"), true);
$paciente_modificar = $data['paciente_modificar'];
$sql = "call datos_paciente(". $paciente_modificar . ")";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datos_paciente[] = array(
            'cedula' => $row['cedula'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'fecha_nacimiento' => $row['fecha_nacimiento'],
            'edad' => $row['edad'],
            'sexo' => $row['sexo'],
            'telefono' => $row['telefono'],
            'seguro' => $row['seguro'],
            'provincia' => $row['provincia'],
            'distrito' => $row['distrito'],
            'ocupacion' => $row['ocupacion'],
            'estado_civil' => $row['estado_civil'],
            'referente' => $row['referente'],
            'hospedaje' => $row['hospedaje'],
            'navegacion' => $row['navegacion'],
            'correo_electronico' => $row['correoelectronico'],
            'nombre_contacto' => $row['nombre_contacto'],
            'telefono_contacto' => $row['telefono_contacto'],
            'alergico' => $row['alergico'],
            'medicamento' => $row['medicamento'],
            'ahf' => $row['ahf'],
            'app' => $row['app'],
            'aqt' => $row['aqt']
        );
    }


    // Convertir el array asociativo a formato JSON
    $json_resultado = json_encode($datos_paciente);
    header('Content-Type: application/json');
    // Enviar la respuesta JSON al cliente
    echo $json_resultado;
    
} else {
    echo "No se encontraron resultados.";
}
?>