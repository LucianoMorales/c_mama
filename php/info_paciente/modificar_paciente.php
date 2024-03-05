<?php

session_start();
include('../conexionesbd/conexion.php');  

$datos = json_decode(file_get_contents('php://input'), true);
// if($_SERVER['REQUEST_METHOD']=='POST'){


$id_paciente=$datos['paciente_modificar'];
$cedula=$datos['cedula'];
$nombre=$datos['nombre'];
$apellido=$datos['apellido'];
$seguro = $datos['seguro'];
$sexo = $datos['sexo'];
$estado_civil = $datos['estado_civil'];
$telefono = $datos['telefono'];
$edad = $datos['edad'];
$fecha_nac =$datos['fecha_nac'];
$ocupacion  = $datos['ocupacion'];
$area_referencia = $datos['area_referencia'];
$hospedaje = $datos['hospedaje'];
$navegacion = $datos['navegacion'];
$correo = $datos['correo'];
$nombre_contacto = $datos['nombre_contacto'];
$telefono_contacto = $datos['telefono_contacto'];
$alergia = $datos['alergia'];
$ahf = $datos['ahf'];
$app = $datos['app'];
$aqt =$datos['aqt'];
$medicamentos_alergicos = $datos['medicamentos_alergicos'];
// $fecha_ingreso =$datos['fecha_ingreso'];


// Realizar la consulta para verificar si la cédula ya existe en la base de datos

$sql = "CALL update_paciente_mama(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

 // Vincular los parámetros de entrada al procedimiento almacenado
 $stmt = mysqli_prepare($con, $sql);

 mysqli_stmt_bind_param($stmt, "issssissssssssssssssss", $id_paciente,$cedula , $nombre, $apellido, $fecha_nac, $edad,$sexo,$telefono,$seguro,$ocupacion,$estado_civil,$area_referencia,$alergia,$medicamentos_alergicos,$ahf,$app,$aqt,$hospedaje,$navegacion,$correo,$nombre_contacto,$telefono_contacto);
 
 // Ejecutar el procedimiento almacenado
 if (mysqli_stmt_execute($stmt)) {
     // Si la consulta se ejecuta correctamente, mostrar un mensaje de éxito
     echo "0";
 } else {
     // Si se produce un error al ejecutar la consulta, mostrar un mensaje de error
     echo "1 - " . mysqli_error($con);
 }

 // Cerrar la conexión
 mysqli_close($con);

?>
