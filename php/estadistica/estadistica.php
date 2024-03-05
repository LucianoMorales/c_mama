<?php

include('../conexionesbd/conexion.php');  


// Obtener el valor del parámetro mesAnio desde la URL
$mesAnio = $_POST['mesAnio'];

// Convertir el valor 'YYYY-MM' a 'YYYY-MM-01' para incluir todo el mes
$fecha = $mesAnio . '-01';

$sql = "SELECT 
sexo, COUNT(*) as cantidad_pacientes
FROM paciente
 INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente  WHERE modulo_paciente.modulo_c_mama='si' and
fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH) GROUP BY sexo;
";
$result1 = $con->query($sql);




// ---------------------------------------------------------------------------
$query2 = "SELECT seguro, COUNT(*) AS cantidad FROM paciente INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente  WHERE modulo_paciente.modulo_c_mama='si' and
fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH) GROUP BY seguro";
$result2 = $con->query($query2);

////////////////////////////////////////////////////////////////////////

$query2_ = "SELECT sexo, COUNT(*) AS cantidad FROM paciente INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente  WHERE modulo_paciente.modulo_c_mama='si' and seguro='Si' and 
fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH) GROUP BY sexo";

$result2_ = $con->query($query2_);

$query3 = "SELECT CASE
 WHEN edad >= 0 AND edad <= 10 THEN '0-9'
  WHEN edad > 10 AND edad <= 20 THEN '10-19'
  WHEN edad > 20 AND edad <= 30 THEN '20-29'
  WHEN edad > 30 AND edad <= 40 THEN '30-39'
  WHEN edad > 40 AND edad <= 50 THEN '40-49'
WHEN edad > 50 AND edad <= 60 THEN '50-59'
 WHEN edad > 60 AND edad <= 70 THEN '60-69'
  WHEN edad > 70 AND edad <= 80 THEN '70-79'
  WHEN edad > 80 AND edad <= 90 THEN '80-89'
  WHEN edad > 90 AND edad <= 100 THEN '90-99'
  WHEN edad >= 100 THEN '100+'
END AS rango_edad,
COUNT(*) as cantidad
FROM paciente
INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente  WHERE modulo_paciente.modulo_c_mama='si' and  fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH  )
GROUP BY rango_edad;
";
$result3 = $con->query($query3);



$query4 = "SELECT estado_civil, COUNT(*) AS cantidad FROM  paciente
INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente  WHERE modulo_paciente.modulo_c_mama='si' and  fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH  ) GROUP BY estado_civil;";
$result4 = $con->query($query4);


$query5 = "SELECT referente, COUNT(*) AS cantidad FROM  paciente
INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente  WHERE modulo_paciente.modulo_c_mama='si' and  fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH  ) GROUP BY referente;";
$result5 = $con->query($query5);

$query6 = "SELECT distrito, COUNT(*) AS cantidad FROM  paciente
INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente  WHERE modulo_paciente.modulo_c_mama='si' and  fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH  ) GROUP BY distrito;";
$result6 = $con->query($query6);


$query7 = "SELECT
SUM(CASE WHEN queretosis_seborreica = 1 THEN 1 ELSE 0 END) AS count_queretosis_seborreica,
SUM(CASE WHEN queratosis_actinica = 1 THEN 1 ELSE 0 END) AS count_queratosis_actinica,
SUM(CASE WHEN carcinoma_basocelular = 1 THEN 1 ELSE 0 END) AS count_carcinoma_basocelular,
SUM(CASE WHEN celulas_escamosas = 1 THEN 1 ELSE 0 END) AS count_celulas_escamosas,
SUM(CASE WHEN lunar_diplastico = 1 THEN 1 ELSE 0 END) AS count_lunar_diplastico,
SUM(CASE WHEN lunar_congenito = 1 THEN 1 ELSE 0 END) AS count_lunar_congenito,
SUM(CASE WHEN pterigion = 1 THEN 1 ELSE 0 END) AS count_pterigion,
SUM(CASE WHEN melanoma = 1 THEN 1 ELSE 0 END) AS count_melanoma
 from diagnostico_examenes inner join examenes_fisicos on diagnostico_examenes.id_examenes = examenes_fisicos.id_examen_fisico
inner join paciente on examenes_fisicos.id_paciente = paciente.id_paciente INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente 
WHERE modulo_paciente.modulo_c_mama='si' and  fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH  )
";
$result7 = $con->query($query7);

$query8 = "SELECT
SUM(CASE WHEN car_duc_in = 1 THEN 1 ELSE 0 END) AS count_car_duc_in,
SUM(CASE WHEN car_duc_invasivo = 1 THEN 1 ELSE 0 END) AS count_car_duc_invasivo,
SUM(CASE WHEN car_medu = 1 THEN 1 ELSE 0 END) AS count_car_medu,
SUM(CASE WHEN coloide = 1 THEN 1 ELSE 0 END) AS count_coloide,
SUM(CASE WHEN tubular = 1 THEN 1 ELSE 0 END) AS count_tubular,
SUM(CASE WHEN tapilar = 1 THEN 1 ELSE 0 END) AS count_tapilar,
SUM(CASE WHEN lobu_insita = 1 THEN 1 ELSE 0 END) AS count_lobu_insita,
SUM(CASE WHEN lobu_invasivo = 1 THEN 1 ELSE 0 END) AS count_lobu_invasivo,
SUM(CASE WHEN inflamatorio = 1 THEN 1 ELSE 0 END) AS count_inflamatorio,
SUM(CASE WHEN recurrente = 1 THEN 1 ELSE 0 END) AS count_recurrente,
SUM(CASE WHEN masculino = 1 THEN 1 ELSE 0 END) AS count_masculino,
SUM(CASE WHEN piaget = 1 THEN 1 ELSE 0 END) AS count_piaget,
SUM(CASE WHEN metastasico = 1 THEN 1 ELSE 0 END) AS count_metastasico
from diagnostico_cancer_mama inner join examenes_fisicos on diagnostico_cancer_mama .id_examenes = examenes_fisicos.id_examen_fisico
inner join paciente on examenes_fisicos.id_paciente = paciente.id_paciente INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente 
WHERE modulo_paciente.modulo_c_mama='si' and  fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH  )

";
$result8 = $con->query($query8);


$query9 = "SELECT referir_a, COUNT(*) AS cantidad  from info_paciente inner join examenes_fisicos on info_paciente.examenes_fisicos = examenes_fisicos.id_examen_fisico
inner join paciente on examenes_fisicos.id_paciente = paciente.id_paciente INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente 
WHERE modulo_paciente.modulo_c_mama='si' and  fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH  ) GROUP BY referir_a;

";
$result9 = $con->query($query9);

$query10 = "SELECT noduloscol, COUNT(*) AS cantidad  from nodulos inner join examenes_fisicos on nodulos.id_examenes = examenes_fisicos.id_examen_fisico
inner join paciente on examenes_fisicos.id_paciente = paciente.id_paciente INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente 
WHERE modulo_paciente.modulo_c_mama='si' and  fecha_ingreso >= '$fecha' AND fecha_ingreso < DATE_ADD('$fecha', INTERVAL 1 MONTH  ) GROUP BY  noduloscol;


";
$result10 = $con->query($query10);


$data = array(); // Aquí guardaremos los datos

if ($result1->num_rows > 0) {
    $consulta1 = array();
    while ($row = $result1->fetch_assoc()) {
        // Agregar cada fila de datos al arreglo
        $consulta1[] = $row;
    }
    $data["consulta1"] = $consulta1;
}

if ($result2->num_rows > 0) {
    $consulta2 = array();
    while ($row = $result2->fetch_assoc()) {
        $consulta2[] = $row;
    }
    $data["consulta2"] = $consulta2;
}

if ($result2_->num_rows > 0) {
    $consulta2_ = array();
    while ($row = $result2_->fetch_assoc()) {
        $consulta2_[] = $row;
    }
    $data["consulta2_"] = $consulta2_;
}



if ($result3->num_rows > 0) {
    $consulta3 = array();
    while ($row = $result3->fetch_assoc()) {
        $consulta3[] = $row;
    }
    $data["consulta3"] = $consulta3;
}


if ($result4->num_rows > 0) {
    $consulta4 = array();
    while ($row = $result4->fetch_assoc()) {
        $consulta4[] = $row;
    }
    $data["consulta4"] = $consulta4;
}
if ($result5->num_rows > 0) {
    $consulta5 = array();
    while ($row = $result5->fetch_assoc()) {
        $consulta5[] = $row;
    }
    $data["consulta5"] = $consulta5;
}
if ($result6->num_rows > 0) {
    $consulta6 = array();
    while ($row = $result6->fetch_assoc()) {
        $consulta6[] = $row;
    }
    $data["consulta6"] = $consulta6;
}

if ($result7->num_rows > 0) {
    $consulta7 = array();
    while ($row = $result7->fetch_assoc()) {
        $consulta7[] = $row;
    }
    $data["consulta7"] = $consulta7;
}
if ($result8->num_rows > 0) {
    $consulta8 = array();
    while ($row = $result8->fetch_assoc()) {
        $consulta8[] = $row;
    }
    $data["consulta8"] = $consulta8;
}

if ($result9->num_rows > 0) {
    $consulta9 = array();
    while ($row = $result9->fetch_assoc()) {
        $consulta9[] = $row;
    }
    $data["consulta9"] = $consulta9;
}
if ($result10->num_rows > 0) {
    $consulta10 = array();
    while ($row = $result10->fetch_assoc()) {
        $consulta10[] = $row;
    }
    $data["consulta10"] = $consulta10;
}
// Cerrar la conexión a la base de datos
$con->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
// Cierre de la conexión a la base de datos



?>