<?php

include('../conexionesbd/conexion.php');  

$dato = json_decode(file_get_contents('php://input'), true);
// if($_SERVER['REQUEST_METHOD']=='POST'){
$cedula=$dato['cedula'];


$resultado = mysqli_query($con, "SELECT nombre,apellido,sexo,edad, seguro, referente  from paciente INNER JOIN modulo_paciente ON paciente.id_paciente = modulo_paciente.id_paciente  WHERE  cedula= '$cedula' AND modulo_c_mama='si' ");
  // Mostrar los resultados de la búsqueda en una tabla
  if (mysqli_num_rows($resultado) > 0) {
    // Mostrar los resultados de la búsqueda en una tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {


        echo "<tr style='background:#F2F4F4'>" .
            
            "<td>" . $fila["nombre"] . " " . $fila["apellido"] . "</td>" .
            "<td>" . $fila["sexo"] . "</td>" .
            "<td>" . $fila["edad"] . "</td>" .
            "<td>" . $fila["seguro"] . "</td>" .
            "<td>" . $fila["referente"] . "</td>" .
            "</tr>";
    }
} else {
    // Mostrar el mensaje de "El paciente no existe"
    echo "<tr border:1px><td colspan=12' style='text-align:center; background:#F2F4F4; color:red'> **** Paciente no encontrado ****</td></tr>";

}

// Cierre de la conexión a la base de datos
$con->close();


?>