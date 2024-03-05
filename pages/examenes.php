<?php
 session_start();

// Verificar si el usuario ha iniciado sesión
 if (!isset($_SESSION['nombre_apellido'])) {
   header('Location: ../index.html');
    exit();
  }
  if (!isset($_SESSION['rol'])) {
    $_SESSION['rol'] = 1; // Asigna un valor predeterminado si es necesario
  }
?>



<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://unpkg.com/konva@7.2.4/konva.min.js"></script>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

  <link rel="stylesheet" href="../style/estilo_canva.css">
  <link rel="stylesheet" type="text/css" href="../style/estilo_menu.css">
  <link rel="stylesheet" type="text/css" href="../style/estilo_menu_p.css">
  <link rel="stylesheet" href="../style/examenes/estilos.css">
  <link rel="icon" href="../image/icon/ancec_icono.ico" type="image/x-icon">
  <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
    " rel="stylesheet">
  <link rel="stylesheet" href="../style/estilo_buscarpaciente.css" />
  <title>Evolución paciente</title>
</head>

<body >



  <div class="contenedor contenedor-completo">
    <div class="menu text-center">



    
        <!-- *************************************************************************************** -->
        <!-- ************************* FUNCION DE CONFIGURACIÓN - ICONO Y OPCIONES **************  -->
        <!-- ************************************************************************************* -->
 
      <div class="menu-vertical-principal">

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" id="boton-configuracion">
            <svg width="25" height="25" id="configuracion" fill="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M12 14.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"></path>
              <path
                d="m22.05 14.063-.023-.018-1.479-1.16a.756.756 0 0 1-.286-.625v-.542a.75.75 0 0 1 .287-.62l1.479-1.16.022-.018a1.251 1.251 0 0 0 .276-1.597L20.324 4.86a1.259 1.259 0 0 0-1.527-.54l-.017.006-1.739.7a.747.747 0 0 1-.678-.06 8.417 8.417 0 0 0-.469-.275.747.747 0 0 1-.383-.554l-.262-1.856-.006-.034a1.276 1.276 0 0 0-1.239-1.027H9.996a1.262 1.262 0 0 0-1.24 1.05l-.004.026-.262 1.86a.75.75 0 0 1-.38.553 8.21 8.21 0 0 0-.47.273.746.746 0 0 1-.676.06l-1.74-.704-.017-.006a1.26 1.26 0 0 0-1.522.531l-.006.01L1.674 8.34a1.252 1.252 0 0 0 .276 1.598l.023.018 1.479 1.16a.755.755 0 0 1 .286.625v.542a.75.75 0 0 1-.287.62l-1.478 1.16-.023.018a1.25 1.25 0 0 0-.276 1.597l2.002 3.464a1.258 1.258 0 0 0 1.527.54l.017-.006 1.737-.7a.747.747 0 0 1 .678.06c.154.098.31.19.47.275a.747.747 0 0 1 .383.554l.26 1.856.006.034a1.275 1.275 0 0 0 1.242 1.027h4.008a1.262 1.262 0 0 0 1.24-1.05l.005-.026.26-1.86a.75.75 0 0 1 .384-.553 8.32 8.32 0 0 0 .469-.273.747.747 0 0 1 .676-.06l1.74.701.017.007a1.26 1.26 0 0 0 1.529-.542l2.002-3.464a1.251 1.251 0 0 0-.276-1.598Zm-6.304-1.887a3.75 3.75 0 1 1-3.922-3.922 3.76 3.76 0 0 1 3.922 3.922Z">
              </path>
            </svg>
          </button>
          <ul class="dropdown-menu">
            <?php if ($_SESSION["rol"] == 1) { ?>
              <li><a class="dropdown-item" href="user.php"> <span>
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="m23.303 5.22-3.8 3.79-2.278-2.27 3.801-3.788c-2.12-1.03-5.093-1.035-6.853.72-1.655 1.65-1.862 4.247-1.056 6.29l-8.45 8.383a.563.563 0 0 0 0 .797l2.45 2.442a.563.563 0 0 0 .797 0l8.438-8.46c2.023.76 4.594.545 6.222-1.079 1.758-1.755 1.754-4.703.73-6.825Z">
                      </path>
                      <path
                        d="m17.13 14.469-3.366 3.375 3.54 3.746a.51.51 0 0 0 .734.01l2.812-2.834a.518.518 0 0 0-.011-.736l-3.708-3.561Z">
                      </path>
                      <path
                        d="M5.578 9.937c0-.228-.188-.437-.35-.599l-.011-.011-.073-.07a.05.05 0 0 1-.012-.037.758.758 0 0 1 .446-.093c.06.006.278.042.582.23.158.098 1.53 1.417 2.059 1.908a.516.516 0 0 0 .007.72l.348.367 3.078-3.054-.387-.368a.51.51 0 0 0-.718-.003C9.47 7.77 9.187 7.266 9.094 6.937c-.207-.725.194-1.312.656-1.687.274-.217.838-.379 1.36-.422a2.47 2.47 0 0 1 .544.028c.163.024.295.054.346.066.177.048.35.11.516.187l.563-.89a4.142 4.142 0 0 0-.629-.83 5.391 5.391 0 0 0-.243-.239c-.365-.335-1.312-.9-2.559-.9-.72 0-1.433.14-2.098.413-1.755.72-2.901 1.7-3.427 2.22l-.004.003a10.29 10.29 0 0 0-.979 1.14c-.25.353-.224.742-.205 1 0 .015 0 .032.003.047a.863.863 0 0 0-1.11.086L.093 8.888a.318.318 0 0 0 0 .45l2.953 2.943a.315.315 0 0 0 .446 0l1.737-1.735c.161-.16.349-.381.349-.609Z">
                      </path>
                    </svg>
                  </span> Configuración</a></li>
            <?php } ?>


            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../php/conexionesbd/logout.php"> <span><svg width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M7.5 12a.75.75 0 0 1 .75-.75H15V6.375c0-1.5-1.584-2.625-3-2.625H4.875A2.628 2.628 0 0 0 2.25 6.375v11.25a2.628 2.628 0 0 0 2.625 2.625h7.5A2.627 2.627 0 0 0 15 17.625V12.75H8.25A.75.75 0 0 1 7.5 12Z">
                    </path>
                    <path
                      d="m21.53 11.472-3.75-3.75a.75.75 0 0 0-1.06 1.06l2.47 2.47H15v1.5h4.19l-2.47 2.47a.749.749 0 0 0 .526 1.294.75.75 0 0 0 .534-.234l3.75-3.75a.75.75 0 0 0 0-1.06Z">
                    </path>
                  </svg></span> Salir</a></li>
          </ul>
        </div>


      </div> 





      <nav  >
  
  <ul >
    <img src="../image/logoancec.png" height="100em" alt="" id="img">
    <button class="buton_seccion" > <a href="dashboard.php"  id="lista" >
        <div class="parte1_icono" >
          <svg width="28" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.261 4.745a.375.375 0 0 0-.518 0l-8.63 8.244a.374.374 0 0 0-.115.271l-.002 7.737a1.5 1.5 0 0 0 1.5 1.5h4.505a.75.75 0 0 0 .75-.75v-6.375a.375.375 0 0 1 .375-.375h3.75a.375.375 0 0 1 .375.375v6.375a.75.75 0 0 0 .75.75h4.503a1.5 1.5 0 0 0 1.5-1.5V13.26a.374.374 0 0 0-.116-.271L12.26 4.745Z"></path>
            <path d="M23.011 11.444 19.505 8.09V3a.75.75 0 0 0-.75-.75h-2.25a.75.75 0 0 0-.75.75v1.5L13.04 1.904c-.254-.257-.632-.404-1.04-.404-.407 0-.784.147-1.038.405l-9.97 9.539a.765.765 0 0 0-.063 1.048.749.749 0 0 0 1.087.05l9.726-9.294a.375.375 0 0 1 .519 0l9.727 9.294a.75.75 0 0 0 1.059-.02c.288-.299.264-.791-.036-1.078Z"></path>
         </svg>
        </div>
        <div class="parte2_texto" >Inicio</div></a>
      </button>
      <button class="buton_seccion" >
        <a  href="registro_paciente.php"  id="lista">
        <div class="parte1_icono">
          <svg width="28" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.688 2.25H16.5v-.938a.563.563 0 0 0-.563-.562H8.064a.563.563 0 0 0-.563.563v.937H4.312a.563.563 0 0 0-.562.563v19.875a.562.562 0 0 0 .563.562h15.375a.562.562 0 0 0 .562-.563V2.813a.563.563 0 0 0-.563-.562Zm-3.944 3H8.256v-1.5h7.488v1.5Z"></path>
         </svg>
        </div>
        <div class="parte2_texto" >Registro Paciente</div>
    </a>
      </button>
      <button class="buton_seccion" >
        <a  href="historia_clinica.php"  id="lista">
        <div class="parte1_icono">
        <svg width="28" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M6.274 16.934c-1.06 0-1.922-.383-2.568-1.143-.647-.76-1.071-1.888-1.318-3.53-.364-2.42-.003-4.458 1.016-5.741.6-.756 1.388-1.193 2.277-1.263.762-.061 1.9.248 3 2.062.689 1.137 1.213 2.646 1.437 4.141.272 1.806.07 3.134-.618 4.062-.545.737-1.384 1.194-2.494 1.36a4.984 4.984 0 0 1-.732.052Z"></path>
<path d="M8.11 23.247a3.25 3.25 0 0 1-1.812-.58 3.74 3.74 0 0 1-1.571-2.372c-.134-.687-.054-1.233.244-1.67.484-.71 1.354-.87 2.273-1.04l.296-.055c.211-.04.428-.094.638-.146.787-.194 1.6-.395 2.272.082.45.32.703.861.779 1.656.086.918-.11 1.833-.554 2.578-.478.802-1.194 1.332-2.016 1.494-.18.035-.365.053-.549.053Z"></path>
<path d="M17.727 12.436a5 5 0 0 1-.73-.056c-1.11-.164-1.949-.621-2.495-1.36-.687-.927-.89-2.256-.617-4.061.224-1.497.746-3.005 1.432-4.137C16.41 1.014 17.55.7 18.317.756c.886.065 1.673.495 2.274 1.247 1.026 1.283 1.39 3.328 1.024 5.758-.247 1.64-.665 2.763-1.317 3.53-.652.767-1.51 1.145-2.57 1.145Z"></path>
<path d="M15.891 18.747c-.183 0-.367-.018-.547-.053-.823-.161-1.54-.691-2.016-1.493-.444-.746-.64-1.661-.554-2.579.075-.796.328-1.336.779-1.656.671-.476 1.485-.276 2.272-.081.21.051.426.105.638.146l.295.054c.92.17 1.79.329 2.274 1.04.298.437.378.984.244 1.67a3.74 3.74 0 0 1-1.571 2.373c-.569.381-1.196.579-1.814.579Z"></path>
</svg>
        </div>
        <div class="parte2_texto" >Historia Clínica</div>
    </a>
      </button>
      </button>
     
     <button class="buton_seccion" >
       <a  href="examenes.php"  id="lista">
       <div class="parte1_icono">
       <svg width="28" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5-1.978-1.187-7.084-3.937-9.132-8.5h4.698l.934-1.556 3 5L13.566 13H17v-2h-4.566l-.934 1.556-3-5L6.434 11H2.21A9.556 9.556 0 0 1 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2Z"></path>
</svg>
       </div>
       <div class="parte2_texto" >Examen Físico</div>
   </a>
     </button>


      <button class="buton_seccion" >
        <a  href="evolucion_paciente.php"  id="lista">
        <div class="parte1_icono">
          <svg width="28" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.688 4.5H18V1.875a.375.375 0 0 0-.375-.375H6.375A.375.375 0 0 0 6 1.875V4.5H1.312a.563.563 0 0 0-.562.563v16.875a.562.562 0 0 0 .563.562h21.375a.562.562 0 0 0 .562-.563V5.063a.563.563 0 0 0-.563-.562ZM7.874 3.375h8.25V4.5h-8.25V3.375ZM16.5 14.531h-3.469V18H10.97v-3.469H7.5V12.47h3.469V9h2.062v3.469H16.5v2.062Z"></path>
         </svg>
        </div>
        <div class="parte2_texto" >Evolución Paciente</div>
    </a>
      </button>
      <button class="buton_seccion" id="btn-exp" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" >
        <a  href="#"  id="lista">
        <div class="parte1_icono">
          <svg width="28" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.75 16.5H15a.75.75 0 0 0-.75.75 2.25 2.25 0 0 1-4.5 0A.75.75 0 0 0 9 16.5H2.25a.75.75 0 0 0-.75.75v3a3.003 3.003 0 0 0 3 3h15a3.004 3.004 0 0 0 3-3v-3a.75.75 0 0 0-.75-.75Z"></path>
            <path d="m22.475 8.807-1.493-5.598C20.685 1.669 19.572.75 18 .75H6c-.787 0-1.453.22-1.973.653-.52.434-.855 1.034-1.008 1.803l-1.494 5.6A.745.745 0 0 0 1.5 9v2.25c0 1.654 1.346 3.75 3 3.75h15c1.654 0 3-2.096 3-3.75V9a.75.75 0 0 0-.025-.193Zm-1.823-.557H15a.746.746 0 0 0-.75.742 2.25 2.25 0 0 1-4.5 0A.746.746 0 0 0 9 8.25H3.348a.094.094 0 0 1-.09-.118l1.228-4.616C4.653 2.653 5.134 2.25 6 2.25h12c.871 0 1.352.4 1.512 1.259l1.23 4.623a.094.094 0 0 1-.09.118Z"></path>
         </svg>
        </div>
        <div class="parte2_texto" >
<div class="row">
  <div class="col-md-9">Expediente</div>
  <div class="col-md-2">      <div>
              <svg width="20" height="20" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path id="icono_select" d="m6.75 21 10.5-9-10.5-9v18Z"></path>
</svg>
              </div></div>
</div>
        
        </div>
   
    </a>

 
</svg>
      </button>
      <div class="row">
  <div class="col">
    <div class="collapse multi-collapse pt-0 pb-0" id="multiCollapseExample1">
      <div class="" style="background-color: #354960 ;">
      <!-- -->
      <button class="buton_seccion pt-0 pb-0" style="font-size: 14px;  padding: 1px 2px; margin: 0;" >
        <a  href="informes.php"  id="lista">
        <div class="parte1_icono">
        <svg width="20" height="20" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M21.75 12c0-5.385-4.366-9.75-9.75-9.75A9.75 9.75 0 0 0 2.25 12c0 5.384 4.365 9.75 9.75 9.75 5.384 0 9.75-4.366 9.75-9.75ZM9.937 15.475v-6.95a.75.75 0 0 1 1.23-.576l4.176 3.474a.75.75 0 0 1 0 1.154l-4.176 3.474a.75.75 0 0 1-1.23-.576Z"></path>
</svg>
        </div>
        <div class="parte2_texto" style="font-size: 14px;  padding: 1px 2px; margin: 0;">Informes</div>
    </a>
      </button>
      <button class="buton_seccion" style="font-size: 14px;  padding: 1px 5px; margin: 0;" >
        <a  href="estadistica.php"  id="lista">
        <div class="parte1_icono">
        <svg width="20" height="20" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M21.75 12c0-5.385-4.366-9.75-9.75-9.75A9.75 9.75 0 0 0 2.25 12c0 5.384 4.365 9.75 9.75 9.75 5.384 0 9.75-4.366 9.75-9.75ZM9.937 15.475v-6.95a.75.75 0 0 1 1.23-.576l4.176 3.474a.75.75 0 0 1 0 1.154l-4.176 3.474a.75.75 0 0 1-1.23-.576Z"></path>
</svg>
        </div>
        <div class="parte2_texto"style="font-size: 14px;  padding: 1px 2px; margin: 0;" >Estadistica</div>
    </a>
      </button>
      <button class="buton_seccion" style="font-size: 14px;  padding: 1px 5px; margin: 0;" >
        <a  href="historial_paciente.php"  id="lista">
        <div class="parte1_icono">
        <svg width="20" height="20" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M21.75 12c0-5.385-4.366-9.75-9.75-9.75A9.75 9.75 0 0 0 2.25 12c0 5.384 4.365 9.75 9.75 9.75 5.384 0 9.75-4.366 9.75-9.75ZM9.937 15.475v-6.95a.75.75 0 0 1 1.23-.576l4.176 3.474a.75.75 0 0 1 0 1.154l-4.176 3.474a.75.75 0 0 1-1.23-.576Z"></path>
</svg>
        </div>
        <div class="parte2_texto"  style="font-size: 14px;  padding: 1px 2px; margin: 0;">Historial</div>
    </a>
      </button>
      </div>
    </div>
  </div>
      </div>

   
  </ul> 

</nav>


  
    </div>



    <div class="container-fluid" id="menu-container">
      <div class="row">
        <div class="col-sm-12">
          <div class="menu-responsive-vertical">
            <div class="menu-vertical">
              <nav class="navbar bg-success" data-bs-theme="dark">
                <div class="container-fluid ">
                  <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                    aria-controls="offcanvasExample" id="boton-configuracion-responsivo">
                    <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path d="M3 18h18v-2H3v2Zm0-5h18v-2H3v2Zm0-7v2h18V6H3Z"></path>
                    </svg>
                  </button>
                  <form class="d-flex" role="search">

                    <div class="dropdown dropstart">
                      <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                        id="boton-configuracion-responsivo">
                        <svg width="20" height="20" id="configuracion-responsive" fill="currentColor"
                          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 14.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"></path>
                          <path
                            d="m22.05 14.063-.023-.018-1.479-1.16a.756.756 0 0 1-.286-.625v-.542a.75.75 0 0 1 .287-.62l1.479-1.16.022-.018a1.251 1.251 0 0 0 .276-1.597L20.324 4.86a1.259 1.259 0 0 0-1.527-.54l-.017.006-1.739.7a.747.747 0 0 1-.678-.06 8.417 8.417 0 0 0-.469-.275.747.747 0 0 1-.383-.554l-.262-1.856-.006-.034a1.276 1.276 0 0 0-1.239-1.027H9.996a1.262 1.262 0 0 0-1.24 1.05l-.004.026-.262 1.86a.75.75 0 0 1-.38.553 8.21 8.21 0 0 0-.47.273.746.746 0 0 1-.676.06l-1.74-.704-.017-.006a1.26 1.26 0 0 0-1.522.531l-.006.01L1.674 8.34a1.252 1.252 0 0 0 .276 1.598l.023.018 1.479 1.16a.755.755 0 0 1 .286.625v.542a.75.75 0 0 1-.287.62l-1.478 1.16-.023.018a1.25 1.25 0 0 0-.276 1.597l2.002 3.464a1.258 1.258 0 0 0 1.527.54l.017-.006 1.737-.7a.747.747 0 0 1 .678.06c.154.098.31.19.47.275a.747.747 0 0 1 .383.554l.26 1.856.006.034a1.275 1.275 0 0 0 1.242 1.027h4.008a1.262 1.262 0 0 0 1.24-1.05l.005-.026.26-1.86a.75.75 0 0 1 .384-.553 8.32 8.32 0 0 0 .469-.273.747.747 0 0 1 .676-.06l1.74.701.017.007a1.26 1.26 0 0 0 1.529-.542l2.002-3.464a1.251 1.251 0 0 0-.276-1.598Zm-6.304-1.887a3.75 3.75 0 1 1-3.922-3.922 3.76 3.76 0 0 1 3.922 3.922Z">
                          </path>
                        </svg>
                      </button>
                      <ul class="dropdown-menu">
                        <?php if ($_SESSION["rol"] == 1) { ?>
                          <li><a class="dropdown-item" href="config/user.php"> <span>
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                    d="m23.303 5.22-3.8 3.79-2.278-2.27 3.801-3.788c-2.12-1.03-5.093-1.035-6.853.72-1.655 1.65-1.862 4.247-1.056 6.29l-8.45 8.383a.563.563 0 0 0 0 .797l2.45 2.442a.563.563 0 0 0 .797 0l8.438-8.46c2.023.76 4.594.545 6.222-1.079 1.758-1.755 1.754-4.703.73-6.825Z">
                                  </path>
                                  <path
                                    d="m17.13 14.469-3.366 3.375 3.54 3.746a.51.51 0 0 0 .734.01l2.812-2.834a.518.518 0 0 0-.011-.736l-3.708-3.561Z">
                                  </path>
                                  <path
                                    d="M5.578 9.937c0-.228-.188-.437-.35-.599l-.011-.011-.073-.07a.05.05 0 0 1-.012-.037.758.758 0 0 1 .446-.093c.06.006.278.042.582.23.158.098 1.53 1.417 2.059 1.908a.516.516 0 0 0 .007.72l.348.367 3.078-3.054-.387-.368a.51.51 0 0 0-.718-.003C9.47 7.77 9.187 7.266 9.094 6.937c-.207-.725.194-1.312.656-1.687.274-.217.838-.379 1.36-.422a2.47 2.47 0 0 1 .544.028c.163.024.295.054.346.066.177.048.35.11.516.187l.563-.89a4.142 4.142 0 0 0-.629-.83 5.391 5.391 0 0 0-.243-.239c-.365-.335-1.312-.9-2.559-.9-.72 0-1.433.14-2.098.413-1.755.72-2.901 1.7-3.427 2.22l-.004.003a10.29 10.29 0 0 0-.979 1.14c-.25.353-.224.742-.205 1 0 .015 0 .032.003.047a.863.863 0 0 0-1.11.086L.093 8.888a.318.318 0 0 0 0 .45l2.953 2.943a.315.315 0 0 0 .446 0l1.737-1.735c.161-.16.349-.381.349-.609Z">
                                  </path>
                                </svg>
                              </span>Configuración</a></li>
                        <?php } ?>

                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../php/logout.php"> <span><svg width="24" height="24"
                                fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M7.5 12a.75.75 0 0 1 .75-.75H15V6.375c0-1.5-1.584-2.625-3-2.625H4.875A2.628 2.628 0 0 0 2.25 6.375v11.25a2.628 2.628 0 0 0 2.625 2.625h7.5A2.627 2.627 0 0 0 15 17.625V12.75H8.25A.75.75 0 0 1 7.5 12Z">
                                </path>
                                <path
                                  d="m21.53 11.472-3.75-3.75a.75.75 0 0 0-1.06 1.06l2.47 2.47H15v1.5h4.19l-2.47 2.47a.749.749 0 0 0 .526 1.294.75.75 0 0 0 .534-.234l3.75-3.75a.75.75 0 0 0 0-1.06Z">
                                </path>
                              </svg></span>Salir </a></li>
                      </ul>
                    </div>
                  </form>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>


      <div class="row d-flex justify-content-center " id="titulo">

        <div class="col-sm-12 col-md-12 text-center my-3">
          <h1>EXAMENES FÍSICOS</h1>
          <hr />
        </div>

        <div class="col-sm-6">
          <div class="input-group">
            <span class="input-group-text" style="border: none;"><b>
                <h5>Ingrese Cédula / Pasaporte</h5>
              </b></span>
            <input type="text" class="form-control" placeholder="Ingrese cédula" aria-label="Recipient's username"
              aria-describedby="button-addon2" id="cedula" />
            <button type="button" class="btn btn-outline-success" id="bsc_paciente">Buscar</button>
          </div>


        </div>
        <form class="row g-3  pb-3">

        <div class="table-responsive">
              <table class="class= table table-borderless" id="tabla-datos">
                <thead>
                  <tr style="background-color: #E5E7E9; font-size:12px;">
                
                    <th>Nombre Completo</th>
                    <th>Sexo</th>
                    <th>Edad</th>
                    <th>Seguro</th>
                    <th>referente</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <!-- Los datos se mostrarán aquí -->
                </tbody>
              </table>
            </div>
        </form>

      </div>
      <div class="row" id="cuerpo">


        <!-- PARTE INACTIVA  -->
        <!-- ********************************************************************************************** -->
        <!-- ***************************  DATOS BIOMETRICOS  ******************************************* -->
        <!-- ******************************************************************************************* -->
        <!-- FORMULARIOS -->
        <form class="row g-3 my-3 no-gutters ">
          <div class="section">
            <h6>Datos Biométricos</h6>
            <hr>
          </div>
          <div class="col-md-2">
            <label for="add_peso" class="form-label">Peso </label>
            <div class="input-group">

              <input type="text" class="form-control" id="add_peso" placeholder="Peso" aria-describedby="peso" />
              <span class="input-group-text" id="peso">Kg</span>
            </div>


          </div>




          <div class="col-md-2">

            <label for="add_talla" class="form-label">Talla</label>
            <div class="input-group">
              <input type="text" class="form-control" id="add_talla" placeholder="Talla" />
              <span class="input-group-text" id="talla">M</span>
            </div>

          </div>
          <div class="col-md-2">
            <label for="add_pa" class="form-label">P/A</label>


            <div class="input-group">
              <input type="text" class="form-control" id="add_pa" placeholder="P/A" />
              <span class="input-group-text" id="talla">mmHg</span>
            </div>
            
            
          </div>




          <div class="col-md-2 my-3">
            <label for="add_cintura" class="form-label">Cintura</label>


            <div class="input-group">
              <input type="text" class="form-control" id="add_cintura" placeholder="Cintura" />
              <span class="input-group-text" id="talla">cm</span>
            </div>
          </div>
          
          <div class="col-md-2 my-3">
            <label for="add_cintura" class="form-label">Pulso</label>


            <div class="input-group">
              <input type="text" class="form-control" id="add_pulso" placeholder="Pulso" />
              <span class="input-group-text" id="talla">ppm</span>
            </div>
          </div>

          <div class="col-md-2 my-3">
            <label for="add_cintura" class="form-label">Frecuencia Cardiaca</label>


            <div class="input-group">
              <input type="text" class="form-control" id="add_frecuencia" placeholder="Frecuencia Cardiaca" />
              <span class="input-group-text" id="talla">ppm</span>
            </div>
          </div>

          
          <div class="col-md-3">
            <div class="form-check">

            </div>
          </div>


        </form>
        <!-- *¨*********************************************************************** -->
        <!-- **************** SE MUESTRA LA IMEGEN DEL CALCULO DE DEL IMC ************ -->
        <!-- **********************************************************************  -->
        <div class="col-md-12 text-center my-3">
          <div class="row no-gutters">
            <div class="col-md-12">
              <span id="imc"></span>
              <span id="texto_imc"></span>
            </div>
            <div class="col-md-12">
              <img src="../image/imc.png" alt="" width="60%">
            </div>
          </div>
        </div>


        <div class="col-12 ">

          <label for="validationCustomUsername" class="form-label">
            <h6>Examen físico de mamas</h6>
          </label>
          <hr class="my-1">
          <!-- ********************************************************************************** -->
          <!-- **********************   MOTIVO  ************************************************* -->
          <!-- ********************************************************************************** -->

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Signos</th>
                <th scope="col" colspan="2" class="text-center">Hallazgo</th>

              </tr>
            </thead>
            <tbody>
              <tr style="text-align: center;" >
                <th scope="row" ></th>
                <td> <strong>Derecha</strong> </td>
                <td> <strong>Izquierda</strong> </td>

              </tr>
              <!-- /////////////////////////////////////////////////////////////////////////////////////// -->
              <!-- TAMAÑO DE MAMA -->
              <!-- ///////////////////////////////////////////////////////////////////////////////////// -->

              <tr>
                <th scope="row">Tamaño de la mama</th>
                <td><select class="form-select" aria-label="Default select example" id="add_tamaño_mama_derecho">
                    <option value="" selected>seleccione el hallazgo </option>
                    <option value="Pequeño">Pequeño</option>
                    <option value="Mediano">Mediano</option>
                    <option value="Grande">Grande</option>
                   
                  </select></td>
                <td><select class="form-select" aria-label="Default select example" id="add_tamaño_mama_izquierdo">
                    <option value="" selected>Seleccione el hallazgo</option>
                    <option value="Pequeño">Pequeño</option>
                    <option value="Mediano">Mediano</option>
                    <option value="Grande">Grande</option>
                  
                  </select></td>

              </tr>
              <!-- ///////////////////////////////////////////////////////////////////////// -->
              <!-- CONSISTENCIA -->
              <!-- ///////////////////////////////////////////////////////////////////////////////// -->

              <tr>
                <th scope="row">Consistencia</th>
                <td><select class="form-select" aria-label="Default select example" id="add_consistencia_derecho">
                    <option value="" selected>seleccione el hallazgo</option>
                    <option value="Blando">Blando</option>
                    <option value="Firme">Firme</option>
                    <option value="Nodular">Nodular</option>
                 
                  </select></td>
                <td><select class="form-select" aria-label="Default select example" id="add_consistencia_izquierdo">
                    <option value="" selected>Seleccione el hallazgo</option>
                    <option value="Blando">Blando</option>
                    <option value="Firme">Firme</option>
                    <option value="Nodular">Nodular</option>
                   
                  </select></td>
              </tr>
              <!-- //////////////////////////////////////////////////////// -->
              <!-- PEZON  -->
              <!-- ///////////////////////////////////////////////////////////// -->
              <tr>
                <th scope="row">Pezón</th>
                <td><select class="form-select" aria-label="Default select example" id="add_pezon_derecho">
                    <option value="" selected>seleccione el hallazgo</option>
                    <option value="Invertido">Invertido</option>
                    <option value="Excema">Excema</option>
                    <option value="Secreción">Secreción</option>
                    <option value="Lechosa">Lechosa</option>
                    <option value="Verde">Verde</option>
                    <option value="Hematica">Hematica</option>
                  </select></td>
                <td><select class="form-select" aria-label="Default select example" id="add_pezon_izquierdo">
                    <option value="" selected>Seleccione el hallazgo</option>
                    <option value="Invertido">Invertido</option>
                    <option value="Excema">Excema</option>
                    <option value="Secreción">Secreción</option>
                    <option value="Lechosa">Lechosa</option>
                    <option value="Verde">Verde</option>
                    <option value="Hematica">Hematica</option>
                  </select></td>
              </tr>
              <!-- /////////////////////////////////////////////////////// -->
              <!-- PIEL -->
              <!-- ///////////////////////////////////////////////////////////////// -->
              <tr>
                <th scope="row">Piel</th>
                <td><select class="form-select" aria-label="Default select example" id="add_piel_derecho">
                    <option  value="" selected>seleccione el hallazgo</option>
                    <option value="Gruesa">Gruesa</option>
                    <option value="Edema">Edema</option>
                    <option value="Retracción">Retracción</option>
                  
                  </select></td>
                <td><select class="form-select" aria-label="Default select example" id="add_piel_izquierdo">
                    <option value="" selected>Seleccione el hallazgo</option>
                    <option value="Gruesa">Gruesa</option>
                    <option value="Edema">Edema</option>
                    <option value="Retracción">Retracción</option>
                    
                  </select></td>
              </tr>
              <!-- ////////////////////////////////////////////////////////////// -->
              <!-- AXILA -->
              <!-- ////////////////////////////////////////////////////////////////////////// -->
              <tr>
                <th scope="row">Axila</th>
                <td><select class="form-select" aria-label="Default select example" id="add_axila_derecho">
                    <option  value="" selected>seleccione el hallazgo</option>
                    <option value="Ganglio móvil">Ganglio móvil</option>
                    <option value="Ganglio Fijo">Ganglio Fijo</option>
                    <option value="Mama accesoria">Mama accesoria</option>
                 
                  </select></td>
                <td><select class="form-select" aria-label="Default select example" id="add_axila_izquierdo">
                    <option value="" selected>Seleccione el hallazgo</option>
                    <option value="Ganglio móvil">Ganglio móvil</option>
                    <option value="Ganglio Fijo">Ganglio Fijo</option>
                    <option value="Mama accesoria">Mama accesoria</option>
                  
                  </select></td>
              </tr>


              <tr>
                <th scope="row">Protesis </th>
                <td><select class="form-select" aria-label="Default select example" id="add_protesis_derecho">
                    <option  value="" selected>seleccione el hallazgo</option>
                    <option value="Encapsulada">Encapsulada</option>

                    

                  </select></td>
                <td><select class="form-select" aria-label="Default select example" id="add_protesis_izquierdo">
                    <option  value="" selected>Seleccione el hallazgo</option>
                    <option value="Encapsulada">Encapsulada</option>

                 
                  </select></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- *****************************************************************************************************-->
        <!-- *************************************  FIN DEL TABLE ************************************************-->
        <!-- ***************************************************************************************************** -->
        <div class="col-md-4 my-3">
          <label for=""> <strong>Tiene nódulo</strong> </label>
          <select class="form-select" aria-label="Default select example" id="contiene_nodulo">
            <option value="" selected>Seleccione el hallazgo</option>
            <option value="Si">Si</option>

            <option value="No">No</option>
          </select>
        </div>

        <!-- ************************************************************************************************ *****-->
        <!-- *************************************** NODULO *******************************************************  -->
        <!-- ******************************************************************************************************* -->
        <div class="row d-none my-3" id="informacion_nodulo">

          <div class="col-md-5">
            <label for="validationCustomUsername" class="form-label"><strong>Nódulo</strong></label>

            <table class="table">
              <thead>
                <tr> </tr>
              </thead>
              <tbody>
                <tr>

                  <td>
                    <!-- CUADRANTE -->

                    <label for="inputPassword" class="col-sm-4 col-form-label">Cuadrante: </label>
                  </td>
                  <td>
                    <input type="text" class="form-control" id="add_cuadrante">


                  </td>
                </tr>
                <!-- RADIO -->
                <tr>
                  <td>
                    <label for="inputPassword" class="col-sm-4 col-form-label">Radio: </label>
                  </td>
                  <td>
                    <input type="text" class="form-control" id="add_radio">

                  </td>
                </tr>
                <!-- TAMAÑO -->
                <tr>
                  <td> <label for="inputPassword" class="col-sm-4 col-form-label">Tamaño: </label></td>
                  <td> <input type="text" class="form-control" id="add_tamaño">
                  </td>
                </tr>
                <!-- CONSISTENCIA -->
                <tr>
                  <td><label for="">Consistencia: </label></td>
                  <td><select class="form-select" aria-label="Default select example" id="add_consistencia_nodulo">
                      <option value="" selected>seleccione el hallazgo</option>
                      <option value="Móvil">Móvil</option>
                      <option value="Fijo">Fijo</option>
                      <option value="Irregular">Irregular</option>
                      <option value="Único">Único</option>
                      <option value="Múltiple">Múltiple</option>
                     
                    </select></td>

                </tr>

                <!-- ///////////////////////////////////////////// -->
                <!-- CICATRIZ  -->
                <!-- /////////////////////////////////////////////////// -->
                <tr>
                  <td> <label>Cicatriz por: </label> </td>
                  <td><select class="form-select" aria-label="Default select example" id="add_cicatriz_nodulo">
                      <option value="" selected>seleccione el hallazgo</option>
                      <option value="Biopsia">Biopsia</option>
                      <option value="Mastectomía">Mastectomía</option>
                  

                    </select></td>

                </tr>
              </tbody>
            </table>
          </div>
          <!-- ******************************************************************** -->
          <!-- ******************** DIAGRAMA ************************************ -->
          <!-- ****************************************************************** -->

          <div class="col-md-6 my-3">
          <div class="row">
<div class="col-md-2">
<input type="color" id="colorPicker_tetas" value="#000000" style="top: 5px;" >
       
          </div>
          <div class="col-md-2">
       <svg  id="undoBtn_tetas" width="30" height="30" fill="#14992f" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="m21.75 20.625-1.318-1.505c-1.054-1.203-2.031-2.13-3.379-2.752-1.247-.574-2.812-.874-4.888-.93v4.812L2.25 11.812l9.915-8.437v4.838c3.417.14 5.962 1.27 7.574 3.363 1.334 1.736 2.011 4.136 2.011 7.14v1.909Z"></path>
</svg>

          </div>
         <div class="col-md-2"> 
         <svg id="clearBtn_tetas"  width="30" height="30" fill="#ff0000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="M20.979 4.5H15.75V2.25A.75.75 0 0 0 15 1.5H9a.75.75 0 0 0-.75.75V4.5H3.021L3 6.375h1.547l.942 14.719A1.5 1.5 0 0 0 6.984 22.5h10.032a1.5 1.5 0 0 0 1.496-1.404l.941-14.721H21L20.979 4.5ZM8.25 19.5l-.422-12h1.547l.422 12H8.25Zm4.5 0h-1.5v-12h1.5v12Zm1.125-15h-3.75V3.187A.188.188 0 0 1 10.313 3h3.374a.188.188 0 0 1 .188.188V4.5Zm1.875 15h-1.547l.422-12h1.547l-.422 12Z"></path>
</svg>
</div>
          <div class="row g-2 my-2"  id="tetas"  >
       
</div>
          </div>
               

      
          </div>


        </div>
        <div class="col-md-12 my-1">
          <span>
            <h6>Examen Ginecológico</h6>
          </span>
          <hr class=" my-1">
        </div>
        <div class="col-md-6 my-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#examen_gine">
 Abrir examenes
</button>
        </div>

      
        





        <div class="col-md-12 my-3">
          <span>
            <h6>Laboratorio General / Estudio de Gabinete</h6>
          </span>
          <hr>
        </div>
        <!-- ********************************************************************************************************** -->
        <!-- ************************************  LABORITORIO CLINICO ******************************************* -->
        <!-- ******************************************************************************************************* -->
        <div class="row g-3">
          <div class="col-md-6">
            <div class="text-center">
              <span><strong>Laboratario General</strong></span>
            </div>
            <div class="col-md-8 my-3">
            <label for="">¿Se realizo examenes de Laboratorio?</label>
            <select class="form-select" aria-label="Default select example" id="examen_lab">
                  <option selected>seleccione </option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
          </div>
          <div class="container"><div class="col-md-10 text-center">
            <button class="form-control btn btn-info d-none" id="add_lab" data-bs-toggle="modal" data-bs-target="#modal_laboratorio">Agregar Examenes</button>
          </div></div>
          
          </div>
       
          <!-- ************************************************************************************************** -->
          <!-- **************************   ESTUDIO DE GABINETE   *********************************************** -->
          <!-- ********************************************************************************************** -->
          <div class="col-md-6">
            <div class="text-center">
              <strong>Estudio de gabinete</strong>
            </div>
            <div class="row g-3">
              <!-- //////////////////////////////// -->
              <!-- ULTRASONIDOS -->
              <!-- ////////////////////////////////////// -->
              <div class="col-md-3 my-3">
                <label for="">Ultrasonidos</label>
                <select class="form-select" aria-label="Default select example" id="ultrasonido_gabinete">
                  <option selected>seleccione </option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>

                </select>
              </div>
              <div class="col-md-4 d-none" id="add_fecha_ul">
                <label for="">Fecha</label>
                <input type="date" class="form-control" id="add_fecha_u">
              </div>

              <div class="col-md-5 d-none" id="add_reporte_ul">
                <label for="">Reporte</label>
                <textarea name="" id="add_reporte_u" cols="5" rows="2" class="form-control"></textarea>
              </div>
            </div>


            <!-- *************************************************************************-->
            <!-- ***********************  MAMOGRAFIA ************************************* -->
            <!-- ************************************************************************-->


            <div class="row g-3">
              
              <div class="col-md-3 my-3">
                <label for="">Mamografía</label>
                <select class="form-select" aria-label="Default select example" id="mamografia_gabinete">
                  <option selected>seleccione </option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>

                </select>
              </div>
              <div class="col-md-4 d-none" id="add_fecha_ma">
                <label for="">Fecha</label>
                <input type="date" class="form-control" id="add_fecha_m">
              </div>
              
              <div class="col-md-5 d-none" id="add_reporte_ma">
                <label for="">Reporte</label>
                <textarea name="" id="add_reporte_m" cols="5" rows="2" class="form-control"></textarea>
              </div>
            </div>
              <!-- //////////////////////////////////////////////////////////////////////////////// -->
            <!-- ///////////////////////////   BIOPSIA ///////////////////////////////////////////-->
            <!-- ///////////////////////////////////////////////////////////////////////////////// -->
            <div class="row g-3">
              
              <div class="col-md-3 my-3">
                <label for="">Biopsia</label>
                <select class="form-select" aria-label="Default select example" id="biopsia_gabinete">
                  <option selected>seleccione </option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>

                </select>
              </div>
              <div class="col-md-4 d-none" id="add_fecha_bi">
                <label for="">Fecha</label>
                <input type="date" class="form-control" id="add_fecha_b">
              </div>
              
              <div class="col-md-5 d-none" id="add_reporte_bi">
                <label for="">Reporte</label>
                <textarea name="" id="add_reporte_b" cols="5" rows="2" class="form-control"></textarea>
              </div>
            </div>

            <div class="col-md-6 my-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#examen_cito">
Evaluación Citológica
</button>
        </div>


          </div>
        </div>
        <!-- *********************************************************************************************** -->
        <!-- ************************* DIAGNOSTICO HISTOPATOLÓGICO **************************************** -->
        <!-- **********************************************************************************************  -->

       <!-- <div class="row g-3 "  id="histo">
<div class="col-md-12"><strong>Diagnostico Histopatológico</strong></div>
<hr>

       </div> -->

   
    
        <!-- ************************************************************************************************ ********* -->
        <!-- *************************** DIAGNOSTICO CLINICO *********************************************************  -->
        <!-- ********************************************************************************************************* -->

        <div class="row my-3">
          <div class="col-md-6">
            <label for="validationCustomUsername" class="form-label">
              <strong>Diagnóstico Clínico</strong>
            </label>
         
          
        

          <!-- MAMAS NORMALES -->

          <div class="row g-3">
            <div class="col-md-6"><label for="">Mamas normales</label></div>
          <div class="col-md-6" >
          <input type="text" class="form-control" id="mamas_normales">


          </div>
          </div>
             
<!-- ABCESO -->

<div class="row g-3">
            <div class="col-md-6"><label for="">Abceso</label></div>
          <div class="col-md-6" >
          <input type="text" class="form-control" id="add_absceso">


          </div>
          </div>

<!-- INFLAMATORIO HORMONAL -->


<div class="row g-3">
            <div class="col-md-6"><label for="">Inflamatorio / Hormonal</label></div>
          <div class="col-md-6" >
          <input type="text" class="form-control" id="add_inflamatorio">


          </div>
          </div>


<!-- BENIGNO -->



<div class="row g-3">
            <div class="col-md-6"><label for=""> Nódulo Benigno</label></div>
          <div class="col-md-6" >
          <input type="text" class="form-control" id="add_nodulo_benigno">


          </div>
          </div>
           
   <!-- ******************************************************************************* -->
 <!-- *************************** NODULO SOSPECHOSO  ********************************** -->
  <!-- ******************************************************************************** -->

 
<div class="row g-3">
            <div class="col-md-6"><label for=""> Nódulo sospechoso</label></div>
          <div class="col-md-6" >
          <input type="text" class="form-control" id="add_nodulo_sospechoso">
          </div>
          </div>
          
          <div class="row g-3">
            <div class="col-md-6"><label for=""> Diagnóstico ginecológico</label></div>
          <div class="col-md-6" >
          <input type="text" class="form-control" id="add_diag_gin">
          </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6"><label for=""> Otros Diagnósticos (PAP)</label></div>
          <div class="col-md-6" >
          <input type="text" class="form-control" id="add_otros_pap">
          </div>
          </div>


          </div>




          <div class="col-md-6">
            <label for="validationCustomUsername" class="form-label">
            <svg id="impre_diagnostica_op" width="25" height="25" fill="#002afa" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path id="diag" d="M12 2.25c-5.376 0-9.75 4.374-9.75 9.75s4.374 9.75 9.75 9.75 9.75-4.374 9.75-9.75S17.376 2.25 12 2.25Zm4.5 10.5h-3.75v3.75h-1.5v-3.75H7.5v-1.5h3.75V7.5h1.5v3.75h3.75v1.5Z"></path>
</svg>
       
              <strong>Impresión diagnóstica</strong></label>
          <!-- IMPRESION DIAGNOSTICO -->
          <div class="row g-3 d-none" id="opcion_impresion" >
         
          <div class="col-md-6 ">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="quera_seba" name="quera_seba">
                    <label class="form-check-label" for="flexCheckDefault">
                        Queratosis Sebarréica
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="quera_act" name="quera_act" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Queratosis Actínica
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="carci_baso" name="carci_baso">
                    <label class="form-check-label" for="flexCheckDefault">
                        Carcinoma Basocelular
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="carci_esca" name="carci_esca" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Carcinoma de células escamosas
                    </label>
                  </div>

              </div>
      
              
              <div class="col-md-4  mb-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="lunar_disp" name="lunar_disp"> 
                    <label class="form-check-label" for="flexCheckDefault">
                        Lunar Displástico
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="lunar_conge" name="lunar_conge" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Lunar Congénito
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="pterigion" name="pteri">
                    <label class="form-check-label" for="flexCheckDefault">
                        Pterigion
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="melanoma" name="melanoma" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Melanoma
                    </label>
                  </div>

              </div>
              </div>
       
              <!-- CANCER DE MAMAA -->
              <!-- OTROS DIAGNOSTICOS MAS  -->
              <div class="col-md-6">
              <label for="validationCustomUsername" class="form-label">
              <svg id="cancer_mama_op" width="25" height="25" fill="#002afa" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path id="path_mama" d="M12 2.25c-5.376 0-9.75 4.374-9.75 9.75s4.374 9.75 9.75 9.75 9.75-4.374 9.75-9.75S17.376 2.25 12 2.25Zm4.5 10.5h-3.75v3.75h-1.5v-3.75H7.5v-1.5h3.75V7.5h1.5v3.75h3.75v1.5Z"></path>
</svg>


        
              <strong>Cáncer de mama</strong></label>
          <!-- IMPRESION DIAGNOSTICO -->
          </div>

          <div class="row g-3 d-none" id="opciones_cancer_mama" >
         
          <div class="col-md-6 ">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_ductal_insito" name="add_ductal_insito">
                    <label class="form-check-label" for="flexCheckDefault">
                        Carcinoma ductal in sito
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_ductal_invasivo" name="add_ductal_invasivo" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Carcinoma ductal invasivo
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_mama_medular" name="add_mama_medular">
                    <label class="form-check-label" for="flexCheckDefault">
                        Carcinoma mama medular
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_mama_coloide" name="add_mama_coloide" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Carcinoma mama coloide
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_mama_tubular" name="add_mama_tubular" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Carcinoma mama tubular
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_mama_papilar" name="add_mama_papilar"> 
                    <label class="form-check-label" for="flexCheckDefault">
                        Carcinoma mama Papilar
                    </label>
                  </div>
              </div>
      
              
              <div class="col-md-6 ">
            
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_labulillar_insito" name="add_labulillar_insito" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Car. Lobulillar in sito
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_lobulillar_invasivo" name="add_lobulillar_invasivo">
                    <label class="form-check-label" for="flexCheckDefault">
                        Car. Lobulillar invasivo
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_mama_inflamatorio" name="add_mama_inflamatorio" >
                    <label class="form-check-label" for="flexCheckChecked">
                       Cán. mama Inflamatorio
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_cancer_recurrente" name="add_cancer_recurrente" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Cáncer de mama recurrente
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_mama_masculino" name="add_mama_masculino" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Cáncer de mama Maculino
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_piaget" name="add_piaget" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Enf. de Piaget Mamaria
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_metastasico" name="add_metastasico" >
                    <label class="form-check-label" for="flexCheckChecked">
                        Metastasico
                    </label>
                  </div>
              </div>
              </div>
              </div>
            </div>
        

        <div class="row g-3">
          <div class="col-md-6">
          <label for="">Recomendación</label>
          <textarea name="" id="recomendacion" cols="3" rows="3" class="form-control"></textarea>
          </div>
          <div class="col-md-4">
            <label for="">Referia a:</label>
            <select class="form-select" aria-label="Default select example" id="referir_a">
                  <option value="" selected>seleccione... </option>
                  <option value="Clínica ANCEC">Clínica ANCEC</option>
                  <option value="CSS">CSS</option>
                  <option value="Centro de salud (MINSA)">Centro de salud (MINSA)</option>
                  <option value="Hospital Regional">Hospital Regional</option>
                  <option value="ION">ION</option>
                  <option value="Seguimiento privado">Seguimiento privado</option>
                  <option value="Unidades de Oncologia">Unidades de Oncologia</option>
                </select>
          </div>
        </div>


        <!-- boton final -->
        <div class=" row justify-content-right mb-2">
          <div class="col-3 my-3">

            <button class="btn btn-primary" id="send_date" type="submit">Agregar Información</button>

          </div>
        </div>
      </div>
      <!-- cuerpo 2 -->






    </div>
  </div>




  <!-- ////////////////////////////////////////////////////////// -->
  <!-- ////////  MENU RESPONSIVO ////////////////////////////////-->
  <!-- ///////////////////////////////////////////////////////// -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>
        <a href=" dashboard.php" id="menu-extra">Inicio</a>
        <hr id="linea">
        <a href="registro_paciente.php" id="menu-extra">Registro Paciente</a>
        <hr id="linea">
        <a href="historia_clinica.php" id="menu-extra">Historia Clínica</a>
        <hr id="linea">
        <a href="examenes.php" id="menu-extra">Examenes Físicos</a>
        <hr id="linea">
      </div>

    </div>
  </div>

  <!-- ************************************************************************************ -->
<!-- **************  MODAL SOBRE EXAMENES DE LABORATORIO ********************************** -->
<!-- ************************************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="modal_laboratorio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Laboratorio Generales</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-3">
          <!-- ****************************************************************** -->
          <!-- HEMOGRAMAA -->
<div class="col-md-12">Hemograma</div>
<div class="col-md-10 offset-md-1">
<table class="table  table-borderless">
  <thead>
    <tr>
     
      <th scope="col">Análisis</th>
      <th scope="col">Resultados</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
   
      <td>Neutrófilos  </td>
      <td>  <input type="text" class="form-control" id="add_neu"> </td>
   
    </tr>
    <tr>
    
    
    <td>Linfocitos </td>
      <td>  <input type="text" class="form-control" id="add_lin"> </td>
   
    </tr>
    <tr>
      
    <td>Monocitos  </td>
      <td>  <input type="text" class="form-control" id="add_mono" > </td>
   
    </tr>

    <tr>
       
    <td>Eosinófilos</td>
      <td>  <input type="text" class="form-control" id="add_eosi"> </td>
   
    </tr>
    
    <tr>
       
    <td>Basófilos </td>
      <td>  <input type="text" class="form-control" id="add_baso"  > </td>
   
    </tr>
    
    <tr>
       
    <td>Hemoglobina</td>
      <td>  <input type="text" class="form-control" id="add_hemo" > </td>
   
    </tr>
    <tr>
       
       <td>Recuento de glóbulos rojos</td>
         <td>  <input type="text" class="form-control" id="add_glob" > </td>
      
       </tr>
  </tbody>
</table>
</div>
<!-- ***************************************************************************************** -->
     <!-- ************************  QUIMICA  *************************************************  -->
   <!-- ****************************************************************************************** -->
   <div class="col-md-12">Quimica</div>
<div class="col-md-10 offset-md-1">
<table class="table  table-borderless">
  <thead>
    <tr>
     
      <th scope="col">Análisis</th>
      <th scope="col">Resultados</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
   
      <td>Glucosa  </td>
      <td>  <input type="text" class="form-control" id="add_glu" > </td>
   
    </tr>
    <tr>
    
    
    <td>Creatinina</td>
      <td>  <input type="text" class="form-control" id="add_cre" > </td>
   
    </tr>
    <tr>
      
    <td>Nitrogeno de Urea </td>
      <td>  <input type="text" class="form-control" id="add_nitro" > </td>
   
    </tr>

    <tr>
       
    <td>Acido Úrico</td>
      <td>  <input type="text" class="form-control" id="add_urico" > </td>
   
    </tr>
    
    <tr>
       
    <td>Sodio</td>
      <td>  <input type="text" class="form-control" id="add_sodio" > </td>
   
    </tr>
    
    <tr>
       
    <td>Potasio</td>
      <td>  <input type="text" class="form-control" id="add_potasio" > </td>
   
    </tr>
    <tr>
       
       <td>Colesterol</td>
         <td>  <input type="text" class="form-control" id="add_coles" > </td>
      
       </tr>
  </tbody>
</table>
</div>

<!-- ***************************************************************************************** -->
     <!-- URINALISIS   -->
   <!-- ****************************************************************************************** -->
   <div class="col-md-12">Urinálisis</div>
<div class="col-md-10 offset-md-1">
<table class="table  table-borderless">
  <thead>
    <tr>
     
      <th scope="col">Análisis</th>
      <th scope="col">Resultados</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
   
      <td>PH  </td>
      <td>  <input type="text" class="form-control" id="add_ph" > </td>
   
    </tr>
    <tr>
    
    
    <td>Proteínas </td>
      <td>  <input type="text" class="form-control" id="add_prote" > </td>
   
    </tr>
    <tr>
      
    <td>Glucosa </td>
      <td>  <input type="text" class="form-control" id="add_glucosa" > </td>
   
    </tr>

    <tr>
       
    <td>Leucocitos</td>
      <td>  <input type="text" class="form-control" id="add_leuco" > </td>
   
    </tr>
    
    <tr>
       
    <td>Sangre Oculta</td>
      <td>  <input type="text" class="form-control" id="add_oculta"  > </td>
   
    </tr>
    
    <tr>
       
    <td>Creatinina</td>
      <td>  <input type="text" class="form-control" id="add_creat" > </td>
   
    </tr>
   
  </tbody>
</table>
</div>
<div class=" col-md-4">
  <label for="">
    VIH
  </label>
  <select class="form-select" aria-label="Default select example" id="add_vih">
                  <option value="" selected>seleccione... </option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
        
                </select>
</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardar_cambios" >Guardar cambios</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="examen_gine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Examen Ginecologico</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row my-3">
          <div class="col-md-8">
          <div class="row g-2 my-2">
            <h6><strong>VULVA</strong></h6>
            <textarea class="form-control" id="vulva_gine" aria-label="With textarea"></textarea>
          </div>
          <div class="row g-2 my-2">
            <h6><strong>VAGINA</strong></h6>
            <textarea class="form-control" id="vagina" aria-label="With textarea"></textarea>
          </div>
                        
          
          <div class="row g-2 my-2">
  <div class="col-md">
  <h6><strong>CUELLO</strong></h6>
  </div>
  <div class="col-md">
 <div class="col-sm-12">
<span>FROTIS</span>
 </div>
<div class="col-sm-12">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="frotis_option" id="f_1" value="Si">
  <label class="form-check-label" for="f_1">Si</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="frotis_option" id="f_2" value="No">
  <label class="form-check-label" for="f_2">No</label>
</div>
</div>
  </div>
  <div class="col-md">
 <div class="col-sm-12">
<span>PAP</span>
 </div>
<div class="col-sm-12">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="pap_option" id="pap_1" value="Si">
  <label class="form-check-label" for="pap_1">Si</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="pap_option" id="pap_2" value="No">
  <label class="form-check-label" for="pap_2">No</label>
</div>
</div>
  </div>
  <div class="col-md">
 <div class="col-sm-12">
<span>I.V.A.A</span>
 </div>
<div class="col-sm-12">
<div class="form-check ">
  <input class="form-check-input" type="radio" name="ivaa_option" id="ivaa" value="Negativo">
  <label class="form-check-label" for="ivaa">Negativo</label>
</div>
<div class="form-check ">
  <input class="form-check-input" type="radio" name="ivaa_option" id="ivaa_2" value="Positivo">
  <label class="form-check-label" for="ivaa_2">Positivo</label>
</div>
</div>
  </div>


  <div class="col-md">
 <div class="col-sm-12">
<span>SHILLER</span>
 </div>
<div class="col-sm-12">
<div class="form-check ">
  <input class="form-check-input" type="radio" name="shiller_option" id="shiller" value="Negativo">
  <label class="form-check-label" for="shiller">Negativo</label>
</div>
<div class="form-check ">
  <input class="form-check-input" type="radio" name="shiller_option" id="shiller_2" value="Positivo">
  <label class="form-check-label" for="shiller_2">Positivo</label>
</div>
</div>
  </div>
  <div class="col-md">
 <div class="col-sm-12">
<span>BIOPSIA</span>
 </div>
<div class="col-sm-12">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="biopsia_option" id="biopsia" value="Si">
  <label class="form-check-label" for="biopsia">Si</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="biopsia_option" id="biopsia_2" value="No">
  <label class="form-check-label" for="biopsia_2">No</label>
</div>
</div>
  </div>
  <div class="col-md">
 <div class="col-sm-12">
<span>COLPOSCOPIA</span>
 </div>
<div class="col-sm-12">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="colposcopia_option" id="colposcopía" value="Si">
  <label class="form-check-label" for="colposcopía">Si</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="colposcopia_option" id="colposcopia_2" value="No">
  <label class="form-check-label" for="colposcopia_2">No</label>
</div>
</div>
  </div>

</div>
          </div>
   
          <div class="col-md-4"  >
<!-- <img src="../image/otros/VULVA.png"  class="img-thumbnail"  alt=""> -->
<div class="row">
<div class="col-md-2">
<input type="color" id="colorPicker" value="#000000" style="top: 5px;" >
       
          </div>
          <div class="col-md-2">
       <svg  id="undoBtn" width="30" height="30" fill="#14992f" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="m21.75 20.625-1.318-1.505c-1.054-1.203-2.031-2.13-3.379-2.752-1.247-.574-2.812-.874-4.888-.93v4.812L2.25 11.812l9.915-8.437v4.838c3.417.14 5.962 1.27 7.574 3.363 1.334 1.736 2.011 4.136 2.011 7.14v1.909Z"></path>
</svg>

          </div>
         <div class="col-md-2"> 
         <svg id="clearBtn"  width="30" height="30" fill="#ff0000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="M20.979 4.5H15.75V2.25A.75.75 0 0 0 15 1.5H9a.75.75 0 0 0-.75.75V4.5H3.021L3 6.375h1.547l.942 14.719A1.5 1.5 0 0 0 6.984 22.5h10.032a1.5 1.5 0 0 0 1.496-1.404l.941-14.721H21L20.979 4.5ZM8.25 19.5l-.422-12h1.547l.422 12H8.25Zm4.5 0h-1.5v-12h1.5v12Zm1.125-15h-3.75V3.187A.188.188 0 0 1 10.313 3h3.374a.188.188 0 0 1 .188.188V4.5Zm1.875 15h-1.547l.422-12h1.547l-.422 12Z"></path>
</svg>
</div>
          <div class="row g-2 my-2"  id="vulva"  >
       
          </div>
          </div>
               

 
     
          </div>
      </div>



      <div class="row my-3">
          <div class="col-md-6">
          <div class="row g-2 my-2">
            <h6><strong>CUERPO</strong></h6>
            <textarea class="form-control" id="cuerpo_gine" aria-label="With textarea"></textarea>
          </div>
          <div class="row g-2 my-2">
            <h6><strong>ANEXOS Y PARAMETROS</strong></h6>
            <textarea class="form-control" id="anexo_gine" aria-label="With textarea"></textarea>
          </div>
                        
           </div>
           <div class="col-md-6"  >
<!-- <img src="../image/otros/VULVA.png"  class="img-thumbnail"  alt=""> -->
<div class="row">
<div class="col-md-2">
<input type="color" id="colorPicker_" value="#000000" style="top: 5px;" >
       
          </div>
          <div class="col-md-2">
       <svg  id="undoBtn_trompa" width="30" height="30" fill="#14992f" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="m21.75 20.625-1.318-1.505c-1.054-1.203-2.031-2.13-3.379-2.752-1.247-.574-2.812-.874-4.888-.93v4.812L2.25 11.812l9.915-8.437v4.838c3.417.14 5.962 1.27 7.574 3.363 1.334 1.736 2.011 4.136 2.011 7.14v1.909Z"></path>
</svg>

          </div>
         <div class="col-md-2"> 
         <svg id="clearBtn_trompa"  width="30" height="30" fill="#ff0000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="M20.979 4.5H15.75V2.25A.75.75 0 0 0 15 1.5H9a.75.75 0 0 0-.75.75V4.5H3.021L3 6.375h1.547l.942 14.719A1.5 1.5 0 0 0 6.984 22.5h10.032a1.5 1.5 0 0 0 1.496-1.404l.941-14.721H21L20.979 4.5ZM8.25 19.5l-.422-12h1.547l.422 12H8.25Zm4.5 0h-1.5v-12h1.5v12Zm1.125-15h-3.75V3.187A.188.188 0 0 1 10.313 3h3.374a.188.188 0 0 1 .188.188V4.5Zm1.875 15h-1.547l.422-12h1.547l-.422 12Z"></path>
</svg>
</div>
          <div class="row g-2 my-2"  id="trompa"  >
       
</div>
          </div>
               

 
     
          </div>
      </div>

      <div class="container mt-5 d-none" id="funcion_citologia" >
   <div class="row">
   <div class="col-md-7">   
    <div class="row ">
      <div class="col-md-5 text-center"><strong>HALLAZGO</strong></div>
      <div class="col-md-2 text-center"><strong>SIGLA</strong></div>
      <div class="col-md-5 text-center"><strong>DIBUJO</strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>ESCAMOSO</strong></div>
      <div class="col-md-2 border text-center"><strong>0 </strong></div>
      <div class="col-md-5 border"><strong></strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>ECTTOPIA</strong></div>
      <div class="col-md-2 border text-center"><strong>E</strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/E.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>U. ESCAMO CEULAR VISIBLE</strong></div>
      <div class="col-md-2 border text-center"><strong>U </strong></div>
      <div class="col-md-5 border"><strong></strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border "><strong>COLPITIS CONDILOMATOSA</strong></div>
      <div class="col-md-2 border text-center"><strong>CC </strong></div>
      <div class="col-md-5 border"><strong></strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>EPITELIO BLANCO</strong></div>
      <div class="col-md-2 border text-center"><strong>EB </strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/EB.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border "><strong>PUNTEADO</strong></div>
      <div class="col-md-2  border text-center"><strong>P </strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/P.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border"><strong>MOSAICO</strong></div>
      <div class="col-md-2 border text-center"><strong>M</strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/M.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border" ><strong>LEUCOPLASIA</strong></div>
      <div class="col-md-2  border text-center"><strong>L </strong></div>
      <div class="col-md-5 border "><img src="../image/tramas/L.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border" ><strong>ORIFICIOS GLANDULARES COR.</strong></div>
      <div class="col-md-2 border "><strong>OGC </strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/OGC.png" class="img-fluid" alt="..."></div>
     
    </div>
    <div class="row my-3 border ">
      <div class="col-md-5 border" ><strong>VASOS ATÍPICOS</strong></div>
      <div class="col-md-2 border"><strong>VA</strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/VA.png" class="img-fluid" alt="..."></div>
    
    </div>
    <div class="row my-3">
      <div class="col-md-5 border" ><strong>TEST DE SHILLER</strong></div>
      <div class="col-md-2 border"><strong>YODO</strong></div>
      <div class="col-md-5 border text-center"><strong> + / -</strong></div>
   
    </div>
 </div>
   <div class="col-md-5">
   <div class="row">
<div class="col-md-2">
<input type="color" id="colorPicker_cito" value="#000000" style="top: 5px;" >
       
          </div>
          <div class="col-md-2">
       <svg  id="undoBtn_cito" width="30" height="30" fill="#14992f" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="m21.75 20.625-1.318-1.505c-1.054-1.203-2.031-2.13-3.379-2.752-1.247-.574-2.812-.874-4.888-.93v4.812L2.25 11.812l9.915-8.437v4.838c3.417.14 5.962 1.27 7.574 3.363 1.334 1.736 2.011 4.136 2.011 7.14v1.909Z"></path>
</svg>

          </div>
         <div class="col-md-2"> 
         <svg id="clearBtn_cito"  width="30" height="30" fill="#ff0000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="M20.979 4.5H15.75V2.25A.75.75 0 0 0 15 1.5H9a.75.75 0 0 0-.75.75V4.5H3.021L3 6.375h1.547l.942 14.719A1.5 1.5 0 0 0 6.984 22.5h10.032a1.5 1.5 0 0 0 1.496-1.404l.941-14.721H21L20.979 4.5ZM8.25 19.5l-.422-12h1.547l.422 12H8.25Zm4.5 0h-1.5v-12h1.5v12Zm1.125-15h-3.75V3.187A.188.188 0 0 1 10.313 3h3.374a.188.188 0 0 1 .188.188V4.5Zm1.875 15h-1.547l.422-12h1.547l-.422 12Z"></path>
</svg>
</div>
          <div class="row g-2 my-2"  id="img_citologia_gine"  >
       
</div>
          </div>
   </div>
   </div>
   <div class="col-sm-12">
   <h6><strong>DIAGNOSTICO</strong></h6>
  <textarea class="form-control" id="diagnostico_cito_gine" aria-label="With textarea" ></textarea>
</div>
    </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="saveBtn_gine" >Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>



<!-- EVALUACION CITOLOGICA -->


<div class="modal fade" id="examen_cito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">SOLICITUD PARA EVALUACIÓN CITOLOGICA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 

      
      <div class="row g-3 align-items-center">
<div class="col-2">
<h5>Institución</h5>
</div>
<div class="col-sm-6">
<Label>Asociación Nacional Contra el Cáncer Capitulo de Santiago</Label>
</div>
</div>

<div class="row g-3 align-items-center my-3">
<div class="col-sm-8">
  
<div class="row g-3 align-items-center ">
<div class="col-sm-6 text-center">
<h6>Apellidos</h6>
</div>
<div class="col-sm-6 text-center">
<h6>Nombres</h6>
</div>

</div>

<div class="row g-3 align-items-center ">
<div class="col-sm-2 ">
<h6>Paterno</h6>
<input type="text" name="" id="apellido_paterno" class="form-control form-control-sm">
</div>
<div class="col-sm-2">
<h6>Materno</h6>
<input type="text" name="" id="apellido_materno" class="form-control form-control-sm" >
</div>
<div class="col-sm-2">
<h6>Cónyuge</h6>
<input type="text" name="" id="conyuge" class="form-control form-control-sm" >
</div>
<div class="col-sm-3">
<h6>Primero</h6>
<input type="text" name="" id="primer_nombre" class="form-control form-control-sm" >
</div>
<div class="col-sm-3 ">
<h6>Segundo</h6>
<input type="text" name="" id="segundo_nombre" class="form-control form-control-sm" >
</div>
</div>

<div class="row g-3 align-items-center  my-3 ">
<div class="form-floating">
<textarea class="form-control" placeholder="" id="direccion_dom"></textarea>
<label for="direccion_dom">Dirección de domicilio</label>
</div>


</div>
<div class="row g-3 align-items-center ">
<div class="form-floating">
<textarea class="form-control" placeholder="" id="direccion_tra"></textarea>
<label for="direccion_tra">Dirección de trabajo</label>
</div>


</div>
<div class="row g-3 align-items-center  my-3 ">
<div class="col-sm-3 text-center mb-0" >
<h6>Menarquia a los</h6>
</div>
<div class="col-sm-1  px-0 ms-0">
<input type="number" name="" id="menarquia" class="form-control form-control-sm ms-0 ">
</div>
<div class="col-sm-1  ms-0">
<h6>años</h6>

</div>
<div class="col-sm-4 text-center " >
<h6>I° relacion sexual a los</h6>
</div>
<div class="col-sm-1 text-center px-0">
<input type="number" name="" id="relacion_sexual" class="form-control form-control-sm ">

</div>
<div class="col-sm-2 ms-0">
<h6 >años</h6>

</div>

</div>



</div>


<div class="col-sm-4 ">
<div class="row g-3 align-items-center ">

<div class="col-sm-3 text-center " >
<h6>S.S</h6>
</div>
<div class="col-sm-6 text-center">
<input type="text" name="" id="s_s" class="form-control form-control-sm">
</div>

</div>

<div class="row g-3 align-items-center">

<div class="col-sm-3 text-center">
<h6>Ced.</h6>
</div>
<div class="col-sm-6 text-center">
<input type="text" name="" id="ced" class="form-control form-control-sm">
</div>

</div>
<div class="row g-3 align-items-center">

<div class="col-sm-3 text-center">
<h6>Teléfono</h6>
</div>
<div class="col-sm-6 text-center">
<input type="text" name="" id="telefono" class="form-control form-control-sm">
</div>

</div>
<div class="row g-3 align-items-center">

<div class="col-sm-5 text-center">
<h6 style="font-size: 14px;" > Primer parto a los  </h6>
</div>
<div class="col-sm-3 text-center">
<input type="number" name="" id="parto" class="form-control form-control-sm">
</div>
<div class="col-sm-4 text-center ms-0">
<h6>años </h6>
</div>
</div>

<div class="row g-3 align-items-center">

<div class="col-sm-5 text-center">
<h6 style="font-size: 14px;" > Menopausia a los  </h6>
</div>
<div class="col-sm-3 text-center">
<input type="number" name="" id="menopausia" class="form-control form-control-sm mb-0">
</div>
<div class="col-sm-4 text-center mb-0">
<h6>años </h6>
</div>
</div>


</div>
<hr>
<div class="col-sm-12 ">
<div class="row ">
<div class="col-sm-3">Fecha de toma
      <input type="text" name="" id="fecha_toma_cita" class="form-control" disabled>
  </div>
 <div class="col-sm-2">
  edad
  <input type="text" name="" id="edad_cito" class="form-control">
 </div>

 <div class="col-sm-3">
  Ocupación
  <input type="text" name="" id="ocupacion_cito" class="form-control">
 </div>
 <div class="col-sm-3">
  Estado Civil
  <input type="text" name="" id="estado_civil_cito" class="form-control">
 </div>
 <div class="col-sm-3 my-3">
  Fecha ultima menstruación
  <input type="date" name="" id="fecha_ultima_menstruacion_cito" class="form-control">
 </div>
 <div class="col-sm-4 my-3">
  usa anticonceptivos orales IM,DIU, otros.
  <input type="text" name="" id="anticonceptivos_cito" class="form-control">
 </div>
 <div class="col-sm-2 my-3">
  Grava, Para, Aborto
  <input type="text" name="" id="grava_cito" class="form-control">
 </div>
 <div class="col-sm-3 my-3">
  Conyuges: uno / +uno
  <input type="text" name="" id="conyuges_cito" class="form-control">
 </div>
 <div class="col-sm-4 my-3">
  Examen ginecologico y Observaciones.
  <textarea type="text" name="" id="examen_citolo" class="form-control"> </textarea>
 </div>
 <!-- <div class="col-sm-2 my-3">
  Atendida por: 
  <input type="text" name="" id="atendida_por_cito" class="form-control">
 </div> -->

</div>
</div>

<!-- <div class="col-sm-12 my-3">
  <hr>
<h3>INTERPRETACION CITOLÓGICA - SISTEMA BETHESTA - OPS/OMS</h3>
<hr>
 </div> -->
<!-- <div class="col-sm-8">
 <div class="row">
 <div class="col-sm-3">
 <h5>Número de Citologia</h5>
 </div>
 <div class="col-sm-5">
 <input type="input" name="" id="numero_cito" class="form-control">
 </div>
 </div>
</div> -->


<!-- <div class="col-sm-12">
  <hr>
  <h4>A. ADECUACIÓN DE LA MUESTRA</h4>
  <hr>
</div> -->


 <!-- <div class="col-sm-12 my-3">
<div class="row">
  <div class="col-sm-4" >
  <select name="satisfaccion" id="satisfaccion" class="form-control">
  <option value="satisfactorio">Satisfactorio</option>
  <option value="no-satisfactorio">No Satisfactorio</option>
</select>


  </div>
  <div class="col-sm-8" >
  <div class="form-floating">
<textarea class="form-control" placeholder="espefifique" id="especifique"></textarea>
<label for="especifique">Especifique</label>
</div>
  </div>

<div class="col-sm-12 my-3">
  <hr>
<h4>B. INFORME</h4>
<hr>
</div>
<div class="col-sm-12">
<div class="row">
<div class="col-sm-5">
  <h5>Resultados o Interpretación Citologica</h5>
</div>
<div class="col-sm-7">
<textarea type="text" name="" id="resultados_cito" class="form-control"> </textarea>
</div>
</div>
</div>

<div class="col-sm-12 my-3">
<h4>C. OTROS</h4>
</div>
<div class="col-sm-12">
<div class="row">
<div class="col-sm-5">
  <h5>Células endometriales en pacientes mayores de 40 años</h5>
</div>
<div class="col-sm-7">
<input type="text" class="form-control" id="otros_cito">
</div>
</div>
</div>


<div class="col-sm-12 my-3">
  <hr>
<h4>D. COMENTARIOS</h4>
<hr>
</div>
<div class="col-sm-12">
<div class="row">

<div class="col-sm-12">
<textarea type="text" name="" id="comentarios_cito" class="form-control"> </textarea>
</div>
</div>
</div>

</div>
 </div> -->
     <!-- <div class="col-sm-9">
      <div class="row">
          <div class="col-sm-3">
              <h5>Nombre</h5>
          </div>
          <div class="col-sm-6">
              <input type="text" name="" class="form-control" id="nombre_cito">
          </div>
      </div>
     </div>     boton final -->


     <!-- <div class="col-sm-9">
      <div class="row">
          <div class="col-sm-3">
              <h5>Fecha de lectura</h5>
          </div>
          <div class="col-sm-6">
              <input type="text" name="" class="form-control" id="fecha_lectura_cito">
          </div>
      </div>
     </div>     boton final -->

     <div class="container mt-5">
   <div class="row">
   <div class="col-md-7">   
    <div class="row ">
      <div class="col-md-5 text-center"><strong>HALLAZGO</strong></div>
      <div class="col-md-2 text-center"><strong>SIGLA</strong></div>
      <div class="col-md-5 text-center"><strong>DIBUJO</strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>ESCAMOSO</strong></div>
      <div class="col-md-2 border text-center"><strong>0 </strong></div>
      <div class="col-md-5 border"><strong></strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>ECTTOPIA</strong></div>
      <div class="col-md-2 border text-center"><strong>E</strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/E.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>U. ESCAMO CEULAR VISIBLE</strong></div>
      <div class="col-md-2 border text-center"><strong>U </strong></div>
      <div class="col-md-5 border"><strong></strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border "><strong>COLPITIS CONDILOMATOSA</strong></div>
      <div class="col-md-2 border text-center"><strong>CC </strong></div>
      <div class="col-md-5 border"><strong></strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>EPITELIO BLANCO</strong></div>
      <div class="col-md-2 border text-center"><strong>EB </strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/EB.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border "><strong>PUNTEADO</strong></div>
      <div class="col-md-2  border text-center"><strong>P </strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/P.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border"><strong>MOSAICO</strong></div>
      <div class="col-md-2 border text-center"><strong>M</strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/M.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border" ><strong>LEUCOPLASIA</strong></div>
      <div class="col-md-2  border text-center"><strong>L </strong></div>
      <div class="col-md-5 border "><img src="../image/tramas/L.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border" ><strong>ORIFICIOS GLANDULARES COR.</strong></div>
      <div class="col-md-2 border "><strong>OGC </strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/OGC.png" class="img-fluid" alt="..."></div>
     
    </div>
    <div class="row my-3 border ">
      <div class="col-md-5 border" ><strong>VASOS ATÍPICOS</strong></div>
      <div class="col-md-2 border"><strong>VA</strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/VA.png" class="img-fluid" alt="..."></div>
    
    </div>
    <div class="row my-3">
      <div class="col-md-5 border" ><strong>TEST DE SHILLER</strong></div>
      <div class="col-md-2 border"><strong>YODO</strong></div>
      <div class="col-md-5 border text-center"><strong> + / -</strong></div>
   
    </div>
 </div>
   <div class="col-md-5">
   <div class="row">
<div class="col-md-2">
<input type="color" id="colorPicker_cito" value="#000000" style="top: 5px;" >
       
          </div>
          <div class="col-md-2">
       <svg  id="undoBtn_cito" width="30" height="30" fill="#14992f" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="m21.75 20.625-1.318-1.505c-1.054-1.203-2.031-2.13-3.379-2.752-1.247-.574-2.812-.874-4.888-.93v4.812L2.25 11.812l9.915-8.437v4.838c3.417.14 5.962 1.27 7.574 3.363 1.334 1.736 2.011 4.136 2.011 7.14v1.909Z"></path>
</svg>

          </div>
         <div class="col-md-2"> 
         <svg id="clearBtn_cito"  width="30" height="30" fill="#ff0000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path d="M20.979 4.5H15.75V2.25A.75.75 0 0 0 15 1.5H9a.75.75 0 0 0-.75.75V4.5H3.021L3 6.375h1.547l.942 14.719A1.5 1.5 0 0 0 6.984 22.5h10.032a1.5 1.5 0 0 0 1.496-1.404l.941-14.721H21L20.979 4.5ZM8.25 19.5l-.422-12h1.547l.422 12H8.25Zm4.5 0h-1.5v-12h1.5v12Zm1.125-15h-3.75V3.187A.188.188 0 0 1 10.313 3h3.374a.188.188 0 0 1 .188.188V4.5Zm1.875 15h-1.547l.422-12h1.547l-.422 12Z"></path>
</svg>
</div>
          <div class="row g-2 my-2"  id="img_citologia"  >
       
</div>
          </div>
   </div>
   </div>

    </div>
    <!-- cuerpo 2 -->
  </div>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="send_date_cito" >Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>





</body>
<script src="../jquery/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
"></script>
<!-- <script src="../js/canvas.js"></script> -->
<script src="../js/examenes/select.js"></script>
<script src="../js/examenes/calcular_imc.js"></script>
<script src="../js/examenes/examenes.js"></script>




</html>