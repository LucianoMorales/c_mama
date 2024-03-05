<?php

session_start();
include('../conexionesbd/conexion.php');
$data = json_decode(file_get_contents("php://input"), true);
$paciente_modificar = $data['paciente_modificar'];
$sql = "call datos_historial(". $paciente_modificar . ")";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datos_paciente[] = array(
                'antecedentes_cancer' => $row['antecedentes_cancer'],
                'tipo_cancer_he' => $row['tipo_cancer'],
                'enfermedad_cronica' => $row['enfermedad_cronica'],
                'madre' => $row['madre'],
                'abuela' => $row['abuela'],
                'prima' => $row['prima'],
                'hermana' => $row['hermana'],
                'diabetes' => $row['diabetes'],
                'hipertension' => $row['hipertension'],
                'enf_renal' => $row['enf_renal'],
                'cardiopatias' => $row['cardiopatias'],
                'otra' => $row['otra'],
                'antecendentes_cancer_pp' => $row['antecendentes_cancer_pe'],
                'tipo_cancer_pp' => $row['tipo_cancer_pe'],
                'enfermedad_cronica_pp' => $row['enfermedad_cronica_pe'],
                'diabetes_pp' => $row['diabetes_ecc'],
                'hipertension_pp' => $row['hipertension_ecc'],
                'enf_renal_pp' => $row['enf_renal_ecc'],
                'cardiopatias_pp' => $row['cardiopatias_ecc'],
                'obesidad' => $row['obesidad_ecc'],
                'otra_pp' => $row['otra_ecc'],
                'embarazos' => $row['embarazos'],
                'partos' => $row['partos'],
                'abortos' => $row['abortos'],
                'cesareas' => $row['cesareas'],
                'menarquia' => $row['menarquia'],
                'ivsa' => $row['ivsa'],
                'ultimo_pap' => $row['ultimo_pap'],
                'vacunacion_VPH' => $row['vacunacion_VPH'],
                'ultimo_parto' => $row['ultimo_parto'],
                'dio_pecho' => $row['dio_pecho'],
                'ultima_menstruacion' => $row['ultima_menstruacion'],
                'menopausia' => $row['menopausia'],
                'tabaquismo' => $row['tabaquismo'],
                'anticonseptivos' => $row['anticonseptivos'],
                'estrogenos' => $row['estrogenos'],
                'provera' => $row['provera'],
                'biopsia_previa' => $row['biopsia_previa'],
                'quistes' => $row['quistes'],
                'fibroadenoma' => $row['fibroadenoma'],
                'cancer_mama' => $row['cancer_mama']
          
        );
    }


    // Convertir el array asociativo a formato JSON
    $json_resultado = json_encode($datos_paciente);
    
    // Enviar la respuesta JSON al cliente
    echo $json_resultado;
    
} else {
    echo "No se encontraron resultados.";
}
?>