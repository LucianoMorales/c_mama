<?php

session_start();
include('../conexionesbd/conexion.php');

// Consulta SQL
$resultado = mysqli_query($con, "SELECT paciente.id_paciente, cedula,nombre,apellido,edad,telefono,sexo, modulo_c_piel, modulo_c_mama from paciente inner join modulo_paciente on paciente.id_paciente = modulo_paciente.id_paciente where modulo_c_mama ='si'" );
echo "<table border='1'  class='table' >".
" <thead>".
     "<tr>".
     "<th>id</th>".
     "<th>Cédula</th>".
     "<th>Nombre</th>".
     "<th>Edad</th>".
     
     "<th>Sexo</th>".
     "<th>Acciónes</th>".
     "</tr>". 
     "</thead>";


// Itera sobre las filas de resultados
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Imprime cada fila de datos
    echo "<tbody>".
    "<tr>" .
    "<td>" . $fila["id_paciente"] . "</td>" .
         "<td>" . $fila["cedula"] . "</td>" .
         "<td>" . $fila["nombre"]." ".$fila["apellido"]. "</td>" .
         "<td>" . $fila["edad"] . "</td>" .
         
         "<td>" . $fila["sexo"] . "</td>" .
         "<td>" .
     
         "<button type='button' id='actualizar' class='btn btn-warning btn-sm actualizar-bn' data-bs-toggle='modal' data-bs-target='#modificar_pac' data-cedula='" . $fila["id_paciente"] . "' onclick='modificar(this)'>Modificar</button>" .
       "   ".
         "<button type='button' class='btn btn-danger btn-sm'>Eliminar</button>" .
      
         "</td>" .
         "</tr>".
         "</tbody>";
}

// Imprime la etiqueta de cierre de la tabla fuera del buc<le
echo "</table>";
// // Crea un array con los resultados
// $datos = array();
// while ($fila = mysqli_fetch_assoc($resultado)) {
//   $datos[] = $fila;
// }

// // Imprime los resultados en formato JSON
// echo json_encode($datos);
// Cierre de la conexión a la base de datos
$con->close();

?>