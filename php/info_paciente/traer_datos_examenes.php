<?php

session_start();
include('../conexionesbd/conexion.php');
$data = json_decode(file_get_contents("php://input"), true);
$paciente_modificar = $data['paciente_modificar'];
$fecha= $data['fecha'];
$stmt = $con->prepare(" call datos_examenes(?,?)");
$stmt->bind_param("ss", $paciente_modificar, $fecha);
$stmt->execute();
if ($stmt->error) {
    echo "Error en la ejecución del procedimiento almacenado: " . $stmt->error;
  
} else {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $datos_paciente = array(
                'nombre_medico' => $row['nombre_medico'],
                'motivo' => $row['motivo'],
                // 'fecha_informe' => $row['fecha_informe'],
                'referir' => $row['referir'],
                'tamaño_mama_izq' => $row['tamaño_mama_izq'],
                'tamaño_mama_dere' => $row['tamaño_mama_dere'],
                'consistencia_izq' => $row['consistencia_izq'],
                'consistencia_dere' => $row['consistencia_dere'],
                'pezon_izq' => $row['pezon_izq'],
                'pezon_dere' => $row['pezon_dere'],
                'piel_izq' => $row['piel_izq'],
                'piel_dere' => $row['piel_dere'],
                'axila_izq' => $row['axila_izq'],
                'axila_derecha' => $row['axila_derecha'],
                'protesis_izq' => $row['protesis_izq'],
                'protesis_dere' => $row['protesis_dere'],
                'cuadrante' => $row['cuadrante'],
                'radio' => $row['radio'],
                'consistencia' => $row['consistencia'],
                'cicatriz' => $row['cicatriz'],
                'noduloscol' => $row['noduloscol'],
                'img_mama' => $row['img_mama'],
                'tamano' => $row['tamano'],
               'ultrasonidos' => $row['ultrasonidos'],
                'fecha_ultra' => $row['fecha_ultra'],
                'reporte_ultra' => $row['reporte_ultra'],
                'mamografia' => $row['mamografia'],
                'fecha_mamografia' => $row['fecha_mamografia'],
                'reporte_mamografia' => $row['reporte_mamografia'],
                'biopsia' => $row['biopsia_'],
                'fecha_biopsia' => $row['fecha_biopsia'],
                'reporte_biopsia' => $row['reporte_biopsia'],
                'mamas_normales' => $row['mamas_normales'],
                'abceso' => $row['abceso'],
                'inflamatorio' => $row['inflamatorio'],
                'nodulo_benigno' => $row['nodulo_benigno'],
                'nodulo_sospechoso' => $row['nodulo_sospechoso'],
                'queretosis_seborreica' => $row['queretosis_seborreica'],
                'queratosis_actinica' => $row['queratosis_actinica'],
                'carcinoma_basocelular' => $row['carcinoma_basocelular'],
                'celulas_escamosas' => $row['celulas_escamosas'],
                'lunar_diplastico' => $row['lunar_diplastico'],
                'lunar_congenito' => $row['lunar_congenito'],
                'pterigion' => $row['pterigion'],
                'melanoma' => $row['melanoma'],
                'comentario' => $row['comentario']
            );
        }
    
    
        // Convertir el array asociativo a formato JSON
        $json_resultado = json_encode($datos_paciente);
        
        // Enviar la respuesta JSON al cliente
        echo $json_resultado;
        
    } else {
        echo json_encode(array('error' => 'No se encontraron resultados.'));
    }
}
$stmt->close();
$con->close();
?>