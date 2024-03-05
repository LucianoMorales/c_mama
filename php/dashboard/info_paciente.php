<?php

include('../conexionesbd/conexion.php');  

$dato = json_decode(file_get_contents('php://input'), true);
// if($_SERVER['REQUEST_METHOD']=='POST'){
$cedula=$dato['valor'];

$resultadosArray = array();
$resultado = mysqli_query($con, "SELECT * from paciente inner join contacto_emergencia on paciente.id_paciente = contacto_emergencia.id_paciente where paciente.id_paciente = '$cedula'");
  // Mostrar los resultados de la búsqueda en una tabla
  if (mysqli_num_rows($resultado) > 0) {
    // Mostrar los resultados de la búsqueda en una tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $resultadosArray[] = $fila;
    }
} else {
    // Mostrar el mensaje de "El paciente no existe"
    $resultadosArray['mensaje'] = 'El paciente no existe';

}

// Cierre de la conexión a la base de datos
$con->close();
echo json_encode($resultadosArray); 

?>