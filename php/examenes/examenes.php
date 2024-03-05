<?php
include('../conexionesbd/conexion.php');
session_start();
if (!isset($_SESSION['nombre_apellido'])) {
echo'valor no iniciado';
  }
  else{

    $datos = json_decode(file_get_contents('php://input'), true);
    // $medico_= $_SESSION['nombre_apellido'] ;
    
    $cedula=$datos['cedula'];
    $add_peso=$datos['add_peso'];
    $add_talla=$datos['add_talla'];
    $add_pa=$datos['add_pa'];
    $add_cintura=$datos['add_cintura'];
    // $add_motivo=$datos['add_motivo'];
    $add_tamaño_mama_derecho=$datos['add_tamaño_mama_derecho'];
    $add_tamaño_mama_izquierdo=$datos['add_tamaño_mama_izquierdo'];
    $add_consistencia_derecho=$datos['add_consistencia_derecho'];
    $add_consistencia_izquierdo=$datos['add_consistencia_izquierdo'];
    $add_pezon_derecho=$datos['add_pezon_derecho'];
    $add_pezon_izquierdo=$datos['add_pezon_izquierdo'];
    $add_piel_derecho=$datos['add_piel_derecho'];
    $add_piel_izquierdo=$datos['add_piel_izquierdo'];
    $add_axila_derecho=$datos['add_axila_derecho'];
    $add_axila_izquierdo=$datos['add_axila_izquierdo'];
    $add_protesis_derecho=$datos['add_protesis_derecho'];
    $add_protesis_izquierdo=$datos['add_protesis_izquierdo'];
    $contiene_nodulo=$datos['contiene_nodulo'];
    $add_cuadrante=$datos['add_cuadrante'];
    $add_radio=$datos['add_radio'];
    $add_tamaño=$datos['add_tamaño'];
    $add_consitencia_nodulo=$datos['add_consitencia_nodulo'];
    $add_cicatriz_nodulo=$datos['add_cicatriz_nodulo'];// $examen_lab=$datos['examen_lab']; //todavia no
    $ultrasonido_gabinete=$datos['ultrasonido_gabinete'];
    $add_fecha_u=$datos['add_fecha_u'];
    $add_freporte_u=$datos['add_freporte_u'];
    $mamografia_gabinete=$datos['mamografia_gabinete'];
    $add_fecha_m=$datos['add_fecha_m'];
    $add_freporte_m=$datos['add_freporte_m'];
    $biopsia_gabinete=$datos['biopsia_gabinete'];
    $add_fecha_b=$datos['add_fecha_b'];
    $add_reporte_b=$datos['add_reporte_b'];
    $mamas_normales=$datos['mamas_normales'];
    $add_absceso=$datos['add_absceso'];
    $add_inflamatorio=$datos['add_inflamatorio'];
    $add_nodulo_benigno=$datos['add_nodulo_benigno'];
    $add_nodulo_sospechoso=$datos['add_nodulo_sospechoso'];
    $quera_seba=$datos['quera_seba'];
    $quera_act=$datos['quera_act'];
    $carci_baso=$datos['carci_baso'];
    $carci_esca=$datos['carci_esca'];
    $lunar_disp=$datos['lunar_disp'];
    $lunar_conge=$datos['lunar_conge'];
    $Pterigion=$datos['Pterigion'];
    $melanoma=$datos['melanoma'];
    $recomendacion=$datos['recomendacion'];
    $referir_a=$datos['referir_a'];
    $data = $datos['img_senos'];
    $add_neu=$datos['add_neu'];
    $add_lin=$datos['add_lin'];
    $add_mono=$datos['add_mono'];
    $add_eosi=$datos['add_eosi'];
    $add_baso=$datos['add_baso'];
    $add_hemo=$datos['add_hemo'];
    $add_glob=$datos['add_glob'];
    $add_glu=$datos['add_glu'];
    $add_cre=$datos['add_cre'];
    $add_nitro=$datos['add_nitro'];
    $add_urico=$datos['add_urico'];
    $add_sodio=$datos['add_sodio'];
    $add_potasio=$datos['add_potasio'];
    $add_coles=$datos['add_coles'];
    $add_ph=$datos['add_ph'];
    $add_prote=$datos['add_prote'];
    $add_glucosa=$datos['add_glucosa'];
    $add_leuco=$datos['add_leuco'];
    $add_oculta=$datos['add_oculta'];
    $add_creat=$datos['add_creat'];
    $add_vih=$datos['add_vih'];
    $add_ductal_insito=$datos['add_ductal_insito'];
    $add_ductal_invasivo=$datos['add_ductal_invasivo'];
    $add_mama_medular=$datos['add_mama_medular'];
    $add_mama_coloide=$datos['add_mama_coloide'];
    $add_mama_tubular=$datos['add_mama_tubular'];
    $add_mama_papilar=$datos['add_mama_papilar'];
    $add_labulillar_insito=$datos['add_labulillar_insito'];
    $add_lobulillar_invasivo=$datos['add_lobulillar_invasivo'];
    $add_mama_inflamatorio=$datos['add_mama_inflamatorio'];
    $add_cancer_recurrente =$datos['add_cancer_recurrente'];
    $add_piaget=$datos['add_piaget'];
    $add_mama_masculino=$datos['add_mama_masculino'];
    $add_metastasico =$datos['add_metastasico'];
    $add_diag_gin=$datos['add_diag_gin'];
    $add_otros_pap=$datos['add_otros_pap'];
    $add_pulso=$datos['add_pulso'];
    $add_frecuencia=$datos['add_frecuencia'];
    $vulva=$datos['vulva'];
    $vagina=$datos['vagina'];
    $cuerpo=$datos['cuerpo'];
    $anexo=$datos['anexo'];
    $img_trompa=$datos['img_trompa'];
    $img_vulva=$datos['img_vulva'];
    $resultado_frotis=$datos['resultado_frotis'];
    $resultado_pap=$datos['resultado_pap'];
    $resultado_shiller=$datos['resultado_shiller'];
    $resultado_biopsia=$datos['resultado_biopsia'];
    $resultado_colposcopia=$datos['resultado_colposcopia'];
    $resultado_ivaa=$datos['resultado_ivaa'];
    
    $img_cito_gine=$datos['img_cito_gine'];
    $diagnostico_cito=$datos['diagnostico_cito'];


    $stmtPaciente = $con->prepare("SELECT id_paciente FROM paciente WHERE cedula = ?");
    $stmtPaciente->bind_param("s", $cedula);
    $stmtPaciente->execute();
    $stmtPaciente->store_result();

    // Verificar si se encontró el paciente
    if ($stmtPaciente->num_rows > 0) {

      $stmtPaciente->bind_result($id_paciente);
      $stmtPaciente->fetch();
      $stmtPaciente->close();



$fecha_actual = date("Y-m-d");

$stmt = $con->prepare(" call guardar_examen_fisico(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("issssssssssssssssssssssssssssssssssssssiiiiiiiissssssssssssssssssssssssiiiiiiiiiiiiissssssssssssssssss",
$id_paciente,
$fecha_actual,
$_SESSION['nombre_apellido'],
$add_peso,
$add_talla,
$add_pa,
$add_cintura,
// $add_motivo,
$add_tamaño_mama_izquierdo,
$add_tamaño_mama_derecho,
$add_consistencia_izquierdo,
$add_consistencia_derecho,
$add_pezon_izquierdo,
$add_pezon_derecho,
$add_piel_izquierdo,
$add_piel_derecho,
$add_axila_izquierdo,
$add_axila_derecho,
$add_protesis_izquierdo,
$add_protesis_derecho,
$contiene_nodulo,
$add_cuadrante,
$add_radio,
$add_consitencia_nodulo,
$add_cicatriz_nodulo,
$data,
$add_tamaño,
$ultrasonido_gabinete,
$add_fecha_u,
$add_freporte_u,
$mamografia_gabinete,
$add_fecha_m,
$add_freporte_m,
$biopsia_gabinete,
$add_fecha_b,
$add_reporte_b,
$mamas_normales,
$add_absceso,
$add_inflamatorio,
$add_nodulo_benigno,
$add_nodulo_sospechoso,
$quera_seba,
$quera_act,
$carci_baso,
$carci_esca,
$lunar_disp,
$lunar_conge,
$Pterigion,
$melanoma,
$recomendacion,
$referir_a,
$add_neu, 
$add_lin, 
$add_mono, 
$add_eosi, 
$add_baso, 
$add_hemo, 
$add_glob, 
$add_glu, 
$add_cre, 
$add_nitro, 
$add_urico, 
$add_sodio, 
$add_potasio, 
$add_coles, 
$add_ph, 
$add_prote, 
$add_glucosa, 
$add_leuco, 
$add_oculta,
$add_creat, 
$add_vih,

$add_ductal_insito,
$add_ductal_invasivo,
$add_mama_medular,
$add_mama_coloide,
$add_mama_tubular,
$add_mama_papilar,
$add_labulillar_insito,
$add_lobulillar_invasivo,
$add_mama_inflamatorio,
$add_cancer_recurrente,
$add_mama_masculino,
$add_piaget,
$add_metastasico,
$add_diag_gin,
$add_otros_pap,
$add_pulso,
$add_frecuencia,
$vulva,
$vagina,
$cuerpo,
$anexo,
$img_trompa,
$img_vulva,
$resultado_frotis,
$resultado_pap,
$resultado_shiller,
$resultado_biopsia,
$resultado_colposcopia,
$resultado_ivaa,
$img_cito_gine,
$diagnostico_cito
);
$stmt->execute();
if ($stmt->error) {
  echo json_encode(array("error" => "Error en la consulta: " . $stmt->error));
} else {
  echo ("1");
}

    }
    else{
      echo ("El paciente no se encontró");
    }

   
}

$con->close();
?>
