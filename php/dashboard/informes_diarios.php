<?php
session_start();
include('../conexionesbd/conexion.php');
date_default_timezone_set("America/Panama");
$fechaDiaria = date("Y-m-d");

$query = "SELECT COUNT(*) AS total FROM informe_medico WHERE fecha_informe = '$fechaDiaria'";
$resultado = mysqli_query($con, $query);

$query2 = "SELECT COUNT(*) as total from paciente WHERE fecha_ingreso = '$fechaDiaria'";
$resultado2 = mysqli_query($con, $query2);


$respuesta = array();
// Verifica si la consulta fue exitosa
if ($resultado) {
    // Obtiene el total de registros
    $fila = mysqli_fetch_assoc($resultado);
    $totalRegistros = $fila['total'];
    $respuesta['informe']=$totalRegistros;
}
if ($resultado2) {
    // Obtiene el total de registros
    $fila = mysqli_fetch_assoc($resultado2);
    $totalRegistros2 = $fila['total'];
    $respuesta['paciente']=$totalRegistros2;
}
echo json_encode( $respuesta);

// Cierra la conexión a la base de datos
mysqli_close($con);


?>


<!-- archivo php que se encuentra en una carpera dashboard y dentro de php que esta dentro ccancer de piel para entrar en  -->