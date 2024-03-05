<?php

include('../conexionesbd/conexion.php'); 
 session_start();
 if (!isset($_SESSION['nombre_apellido'])) {
    echo'valor no iniciado';
      }
      else{
$datos = json_decode(file_get_contents('php://input'), true);
$fecha_actual = date("Y-m-d");

$cedula = $datos['cedula'];
$antecedentes_cancer = $datos['antecedentes_cancer'];
$tipo_cancer = $datos['tipo_cancer'];
$enfcronica_familiar = $datos['enfcronica_familiar'];
$diabetes_familiar = $datos['diabetes'];
$hipertension_familiar = $datos['hipertension'];
$enf_renal_familiar = $datos['f_renal'];
$cardiopatias_familiar = $datos['cardiopatias'];
$otro_familiar = $datos['otro'];
$madre = $datos['madre'];
$hermana = $datos['hermana'];
$abuela = $datos['abuela'];
$prima = $datos['prima'];
$antecedentes_pat = $datos['antecedentes_patologicos'];
$tipo_cancer_pat = $datos['tipo_cancer_pat'];
$enf_cronica_pat = $datos['enf_cronica'];
$diabetes_pat = $datos['diabetes_pat'];
$hipertension_pat = $datos['hipertension_pat'];
$enf_renal_pat = $datos['f_renal_pat'];
$cardiopatias_pat = $datos['cardiopatias_pat'];
$obesidad_pat = $datos['obesidad_pat'];
$otro_pat = $datos['otro_pat'];
$embarazos = $datos['embarazos'];
$partos = $datos['partos'];
$abortos = $datos['abortos'];
$cesareas = $datos['cesareas'];
$menarquia = $datos['menarquia'];
$ivsa = $datos['ivsa'];
$ultimopap = $datos['ultimopap'];
$vph = $datos['vph'];
$ultimoparto = $datos['ultimoparto'];
$pecho = $datos['pecho'];
$ultima_menstruacion = $datos['fechamenstruacion'];
$menopausia = $datos['menopausia'];
$tabaquismo = $datos['tabaquismo'];
$anticonceptivos = $datos['anticonceptivos'];
$estrogenos = $datos['estrogenos'];
// $provera = $datos['provera'];
$biopsia_previa = $datos['biopsiaprevia'];
$quistes = $datos['quistes'];
$fibroadenoma = $datos['fifroadenoma'];
$cancer_mama = $datos['cancermama'];
$fecha_biopsia=$datos['fecha_biopsia'];
$resultado_biopsia=$datos['resultado_biopsia'];
$add_motivo=$datos['add_motivo'];
// echo(json_encode($datos));



$consulta_select = "SELECT id_paciente FROM paciente WHERE cedula = ?";
$stmt_select = mysqli_prepare($con, $consulta_select);
mysqli_stmt_bind_param($stmt_select, "s", $cedula);

// Ejecutar la consulta SELECT
mysqli_stmt_execute($stmt_select);

// Enlazar el resultado
mysqli_stmt_bind_result($stmt_select, $id_paciente);

// Obtener el resultado
mysqli_stmt_fetch($stmt_select);
mysqli_stmt_close($stmt_select);
if ($id_paciente!=null) {

// Llamar al procedimiento almacenado utilizando una sentencia SQL
$sql = "CALL guardar_historia_clinica(?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)";

// Preparar la sentencia
$stmt = mysqli_prepare($con, $sql);

// Verificar si hubo un error en la preparación de la sentencia


// Enlazar las variables a los parámetros del procedimiento almacenado
mysqli_stmt_bind_param($stmt, "isssssiiiissssssssiiiiisiiiiissssssssiisssssss",
    $id_paciente,$fecha_actual,$_SESSION['nombre_apellido'], $antecedentes_cancer, $tipo_cancer, $enfcronica_familiar, $diabetes_familiar, $hipertension_familiar, $enf_renal_familiar, $cardiopatias_familiar, $otro_familiar,
    $madre, $abuela, $prima, $hermana, $antecedentes_pat, $tipo_cancer_pat, $enf_cronica_pat, $diabetes_pat, $hipertension_pat, $enf_renal_pat, $cardiopatias_pat, $obesidad_pat, $otro_pat, $embarazos, $partos, $abortos, $cesareas, $menarquia, $ivsa, $ultimopap, $vph, $ultimoparto, $pecho, $ultima_menstruacion, $menopausia, $tabaquismo, $anticonceptivos, $estrogenos, 
    $biopsia_previa, $quistes, $fibroadenoma, $cancer_mama,$fecha_biopsia,$resultado_biopsia,$add_motivo);

    

// Ejecutar la sentencia
if (mysqli_stmt_execute($stmt)) {
    echo ("1");
} 
else {
    echo "Error al ingresar los datos: " . mysqli_error($con);
}

}
else {
    echo " Error ";
}

// Cerrar el statement
mysqli_close($con);

      }
?>