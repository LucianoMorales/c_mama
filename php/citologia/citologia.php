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

$apellido_materno=$datos['apellido_materno'];
$apellido_materno=$datos['apellido_materno'];
$conyuge=$datos['conyuge'];
$primer_nombre=$datos['primer_nombre'];
$segundo_nombre=$datos['segundo_nombre'];
$direccion_dom=$datos['direccion_dom'];
$direccion_tra=$datos['direccion_tra'];
$menarquia=$datos['menarquia'];
$relacion_sexual=$datos['relacion_sexual'];
$s_s=$datos['s_s'];
$ced=$datos['ced'];
$telefono=$datos['telefono'];
$parto=$datos['parto'];
$menopausia=$datos['menopausia'];
// $fecha_toma_cita=$datos['fecha_toma_cita'];
$edad_cito=$datos['edad_cito'];
$ocupacion_cito=$datos['ocupacion_cito'];
$estado_civil_cito=$datos['estado_civil_cito'];
$fecha_ultima_menstruacion_cito=$datos['fecha_ultima_menstruacion_cito'];
$anticonceptivos_cito=$datos['anticonceptivos_cito'];
$grava_cito=$datos['grava_cito'];
$conyuges_cito=$datos['conyuges_cito'];
$examen_citolo=$datos['examen_citolo'];
// $atendida_por_cito=$datos['atendida_por_cito'];
// $fecha_proximo_examen_cito=$datos['fecha_proximo_examen_cito'];



$stmt = $con->prepare(" call guardar_citologia(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssssssssssssssssss",

$primer_nombre,
$segundo_nombre,
$apellido_materno,
$apellido_materno,
$conyuge,
$direccion_dom,
$direccion_tra,
$menarquia,
$relacion_sexual,
$s_s,
$ced,
$telefono,
$parto,
$menopausia,
$fecha_actual,
$edad_cito,
$ocupacion_cito,
$estado_civil_cito,
$fecha_ultima_menstruacion_cito,
$anticonceptivos_cito,
$grava_cito,
$conyuges_cito,
$examen_citolo,
$_SESSION['nombre_apellido']

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
