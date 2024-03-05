<?php

session_start();
include "conexion.php";
$medico;

$usuario= $_POST['username'];
$pass = $_POST['password'];
$contrasena = hash('sha256', $pass);
$sql = "SELECT * FROM sesion WHERE usuario='$usuario' AND contrasena='$contrasena'";
$resultado = mysqli_query($con, $sql);
if (mysqli_num_rows($resultado) == 1) {
  $fila = mysqli_fetch_assoc($resultado);
  $nombre_usuario = $fila['nombre_apellido'];
  $rol = $fila['rol'];

  // SE GUARDA LA VARIBLE AREA PARA SABER DE QUE AREA VIENE EL USUARIO
  $area = $fila['id_area'];

  // Guarda el nombre de usuario en una variable de sesión
  $_SESSION['nombre_apellido'] = $nombre_usuario;
  $_SESSION['rol'] = $rol;
$medico= $_SESSION['nombre_apellido'];

  // AQUI SE UTILIZA EL IF PARA SABER Y VERIFICAR DEPENDIENDO DEL ID QUE SE LE ASIGNO AL USUARIO. 
    if ($area == 1){
echo "1";

    }
    else if ($area == 2){
echo"2";
    }
  } else {
    // Los datos son incorrectos, mostramos un mensaje de error
    echo "0";
  }






?>