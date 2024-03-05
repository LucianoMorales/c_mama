<?php

include('../conexionesbd/conexion.php');  
$texto;
$dato = json_decode(file_get_contents('php://input'), true);
// if($_SERVER['REQUEST_METHOD']=='POST'){
$filtro=$dato['valor'];

if ($filtro == '1') {
    $consulta = " SELECT cedula, nombre , apellido,edad , sexo, telefono, provincia, distrito, referente,fecha_ingreso
    FROM paciente
    INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente
    WHERE  modulo_c_mama = 'si'";

} else if ($filtro == 'navegacion') {
    $consulta = "  SELECT cedula, nombre , apellido,edad , sexo, telefono, provincia, distrito, referente,fecha_ingreso
    FROM paciente
    INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente
    WHERE navegacion = 'si' AND modulo_c_mama = 'si';
    ";
} else if ($filtro == 'masculino' || $filtro == 'femenino') {
    $consulta = "SELECT cedula, nombre , apellido,edad , sexo, telefono, provincia, distrito, referente,fecha_ingreso
    FROM paciente
    INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente
    WHERE sexo = '".$filtro."' AND modulo_c_mama = 'si';";
} else if ($filtro == 'seguro') {
    $consulta = "SELECT cedula, nombre , apellido,edad , sexo, telefono, provincia, distrito, referente,fecha_ingreso
    FROM paciente
    INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente
    WHERE seguro = 'Si' AND modulo_c_mama = 'si';";
}
$resultado = mysqli_query($con, $consulta);


  // Mostrar los resultados de la búsqueda en una tabla
  if (mysqli_num_rows($resultado) > 0) {
    // Mostrar los resultados de la búsqueda en una tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {

       
        echo "<tr style='background:#F2F4F4'>" .
        "<td>" . $fila["cedula"] . "</td>" .
            "<td>" . $fila["nombre"] . " " . $fila["apellido"] . "</td>" .
            "<td>" . $fila["edad"] . "</td>" .
            "<td>" . $fila["sexo"] . "</td>" .
            "<td>" . $fila["telefono"] . "</td>" .
            "<td>" . $fila["provincia"] . "</td>" .
            "<td>" . $fila["distrito"] . "</td>" .
            "<td>" . $fila["referente"] . "</td>" .
            "<td>" . $fila["fecha_ingreso"] . "</td>" .
            "</tr>";
    }
} else {
    // Mostrar el mensaje de "El paciente no existe"


}

// Cierre de la conexión a la base de datos
$con->close();


?>