<?php

session_start();
include('../conexionesbd/conexion.php');
$data = json_decode(file_get_contents("php://input"), true);
$paciente_modificar = $data['paciente_modificar'];
$sql = "SELECT fecha_informe FROM informe_medico WHERE id_paciente_medico = $paciente_modificar";
$result = $con->query($sql);

// Almacenar las fechas en un array
$fechas = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fechas[] = $row['fecha_informe'];
    }
}
array_unshift($fechas, "Seleccione fecha");
echo json_encode($fechas);
// Cerrar la conexión a la base de datos
$con->close();

?>