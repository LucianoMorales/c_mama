<?php
include('../conexionesbd/conexion.php');
session_start();
if (!isset($_SESSION['nombre_apellido'])) {
echo'valor no iniciado';
  }
  else{

$fecha_actual = date("Y-m-d");

$datos = json_decode(file_get_contents('php://input'), true);
//  $medico_= $_SESSION['nombre_apellido'] ;

$cedula=$datos['cedula'];
$agg_peso=$datos['agg_peso'];
$agg_talla=$datos['agg_talla'];
$agg_pa=$datos['agg_pa'];
$agg_pulso=$datos['agg_pulso'];
// $add_motivo=$datos['add_motivo'];
$agg_fre_cardiaca=$datos['agg_fre_cardiaca'];
$agg_temperatura=$datos['agg_temperatura'];
$add_hallazgo=$datos['add_hallazgo'];
$add_tratamiento=$datos['add_tratamiento'];
$add_recomendacion=$datos['add_recomendacion'];

$stmt = $con->prepare(" call guardar_evolucion_paciente(?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssssss",
$cedula,
$fecha_actual,
$_SESSION['nombre_apellido'],
$agg_peso,
$agg_talla,
$agg_pa,
$agg_temperatura,
$agg_pulso,
$agg_fre_cardiaca,
$add_hallazgo,
$add_tratamiento,
$add_recomendacion
// $add_motivo,
);
$stmt->execute();
if ($stmt->error) {
  echo json_encode(array("error" => "Error en la consulta: " . $stmt->error));
} else {
  echo ("1");
}

}
$stmt->close();
$con->close();
?>
