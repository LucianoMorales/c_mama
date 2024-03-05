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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../style/estilo_menu.css">
    <link rel="stylesheet" type="text/css" href="../style/estilo_menu_p.css">
    <link rel="icon" href="../image/icon/ancec_icono.ico" type="image/x-icon">
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
    " rel="stylesheet">
    <link rel="stylesheet" href="../style/estilo_buscarpaciente.css" />
    <title>Evolución paciente</title>
  </head>
  <body>
 


   <div class="contenedor contenedor-completo" >
    <div class="menu text-center">


        <!-- *************************************************************************************** -->
        <!-- ************************* FUNCION DE CONFIGURACIÓN - ICONO Y OPCIONES **************  -->
        <!-- ************************************************************************************* -->
  
      <div class="menu-vertical-principal">
       
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="boton-configuracion">
            <svg width="25" height="25" id="configuracion"  fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 14.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"></path>
              <path d="m22.05 14.063-.023-.018-1.479-1.16a.756.756 0 0 1-.286-.625v-.542a.75.75 0 0 1 .287-.62l1.479-1.16.022-.018a1.251 1.251 0 0 0 .276-1.597L20.324 4.86a1.259 1.259 0 0 0-1.527-.54l-.017.006-1.739.7a.747.747 0 0 1-.678-.06 8.417 8.417 0 0 0-.469-.275.747.747 0 0 1-.383-.554l-.262-1.856-.006-.034a1.276 1.276 0 0 0-1.239-1.027H9.996a1.262 1.262 0 0 0-1.24 1.05l-.004.026-.262 1.86a.75.75 0 0 1-.38.553 8.21 8.21 0 0 0-.47.273.746.746 0 0 1-.676.06l-1.74-.704-.017-.006a1.26 1.26 0 0 0-1.522.531l-.006.01L1.674 8.34a1.252 1.252 0 0 0 .276 1.598l.023.018 1.479 1.16a.755.755 0 0 1 .286.625v.542a.75.75 0 0 1-.287.62l-1.478 1.16-.023.018a1.25 1.25 0 0 0-.276 1.597l2.002 3.464a1.258 1.258 0 0 0 1.527.54l.017-.006 1.737-.7a.747.747 0 0 1 .678.06c.154.098.31.19.47.275a.747.747 0 0 1 .383.554l.26 1.856.006.034a1.275 1.275 0 0 0 1.242 1.027h4.008a1.262 1.262 0 0 0 1.24-1.05l.005-.026.26-1.86a.75.75 0 0 1 .384-.553 8.32 8.32 0 0 0 .469-.273.747.747 0 0 1 .676-.06l1.74.701.017.007a1.26 1.26 0 0 0 1.529-.542l2.002-3.464a1.251 1.251 0 0 0-.276-1.598Zm-6.304-1.887a3.75 3.75 0 1 1-3.922-3.922 3.76 3.76 0 0 1 3.922 3.922Z"></path>
           </svg>
          </button>
          <ul class="dropdown-menu">
            <?php if ($_SESSION["rol"] == 1) {?>
              <li  ><a class="dropdown-item" href="user.php" > <span >
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="m23.303 5.22-3.8 3.79-2.278-2.27 3.801-3.788c-2.12-1.03-5.093-1.035-6.853.72-1.655 1.65-1.862 4.247-1.056 6.29l-8.45 8.383a.563.563 0 0 0 0 .797l2.45 2.442a.563.563 0 0 0 .797 0l8.438-8.46c2.023.76 4.594.545 6.222-1.079 1.758-1.755 1.754-4.703.73-6.825Z"></path>
                  <path d="m17.13 14.469-3.366 3.375 3.54 3.746a.51.51 0 0 0 .734.01l2.812-2.834a.518.518 0 0 0-.011-.736l-3.708-3.561Z"></path>
                  <path d="M5.578 9.937c0-.228-.188-.437-.35-.599l-.011-.011-.073-.07a.05.05 0 0 1-.012-.037.758.758 0 0 1 .446-.093c.06.006.278.042.582.23.158.098 1.53 1.417 2.059 1.908a.516.516 0 0 0 .007.72l.348.367 3.078-3.054-.387-.368a.51.51 0 0 0-.718-.003C9.47 7.77 9.187 7.266 9.094 6.937c-.207-.725.194-1.312.656-1.687.274-.217.838-.379 1.36-.422a2.47 2.47 0 0 1 .544.028c.163.024.295.054.346.066.177.048.35.11.516.187l.563-.89a4.142 4.142 0 0 0-.629-.83 5.391 5.391 0 0 0-.243-.239c-.365-.335-1.312-.9-2.559-.9-.72 0-1.433.14-2.098.413-1.755.72-2.901 1.7-3.427 2.22l-.004.003a10.29 10.29 0 0 0-.979 1.14c-.25.353-.224.742-.205 1 0 .015 0 .032.003.047a.863.863 0 0 0-1.11.086L.093 8.888a.318.318 0 0 0 0 .45l2.953 2.943a.315.315 0 0 0 .446 0l1.737-1.735c.161-.16.349-.381.349-.609Z"></path>
               </svg>
              </span> Configuración</a></li>
              <?php }?>
              <!-- 
              <li><a class="dropdown-item" href="infopaciente/info_paciente.php"> <span>
              <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M9.714 2.857a3.429 3.429 0 0 1 3.429 3.429V8.57a3.429 3.429 0 1 1-6.857 0V6.286a3.429 3.429 0 0 1 3.428-3.429Zm8 16v-.832c0-3.642-4.213-6.025-8-6.025s-8 2.383-8 6.025v.832c0 .631.512 1.143 1.143 1.143h13.714c.632 0 1.143-.512 1.143-1.143Z" clip-rule="evenodd"></path>
  <path fill="currentColor" fill-rule="evenodd" d="M14.308 3.06a3.43 3.43 0 0 1 2.263 3.226v1.143c0 1.482-.968 2.95-2.285 3.428.77-1.05 1.155-2.384 1.154-4-.001-1.618-.378-2.883-1.132-3.797ZM20 20h1.143c.631 0 1.143-.512 1.143-1.143v-.832c0-2.48-1.954-4.376-4.396-5.334 0 0 3.253 2.737 2.11 7.309Z" clip-rule="evenodd"></path>
</svg>
              </span> Info. paciente</a></li>
              -->
          
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../php/conexionesbd/logout.php"> <span><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M7.5 12a.75.75 0 0 1 .75-.75H15V6.375c0-1.5-1.584-2.625-3-2.625H4.875A2.628 2.628 0 0 0 2.25 6.375v11.25a2.628 2.628 0 0 0 2.625 2.625h7.5A2.627 2.627 0 0 0 15 17.625V12.75H8.25A.75.75 0 0 1 7.5 12Z"></path>
              <path d="m21.53 11.472-3.75-3.75a.75.75 0 0 0-1.06 1.06l2.47 2.47H15v1.5h4.19l-2.47 2.47a.749.749 0 0 0 .526 1.294.75.75 0 0 0 .534-.234l3.75-3.75a.75.75 0 0 0 0-1.06Z"></path>
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
    
      </div>
    </div>
  </div>
      </div>

     
   
  </ul> 

</nav>
      </div> 
     


    <div class="container-fluid" id="menu-container" >
        <div class="row">
          <div class="col-sm-12">
            <div class="menu-responsive-vertical">
              <div class="menu-vertical">
                <nav  class="navbar bg-success" data-bs-theme="dark">
                  <div class="container-fluid ">
                    <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" id="boton-configuracion-responsivo">
                      <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 18h18v-2H3v2Zm0-5h18v-2H3v2Zm0-7v2h18V6H3Z"></path>
                     </svg>
                    </button>
                    <form class="d-flex" role="search">
                    
                      <div class="dropdown dropstart">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="boton-configuracion-responsivo">
                          <svg width="20" height="20" id="configuracion-responsive"  fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 14.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"></path>
                            <path d="m22.05 14.063-.023-.018-1.479-1.16a.756.756 0 0 1-.286-.625v-.542a.75.75 0 0 1 .287-.62l1.479-1.16.022-.018a1.251 1.251 0 0 0 .276-1.597L20.324 4.86a1.259 1.259 0 0 0-1.527-.54l-.017.006-1.739.7a.747.747 0 0 1-.678-.06 8.417 8.417 0 0 0-.469-.275.747.747 0 0 1-.383-.554l-.262-1.856-.006-.034a1.276 1.276 0 0 0-1.239-1.027H9.996a1.262 1.262 0 0 0-1.24 1.05l-.004.026-.262 1.86a.75.75 0 0 1-.38.553 8.21 8.21 0 0 0-.47.273.746.746 0 0 1-.676.06l-1.74-.704-.017-.006a1.26 1.26 0 0 0-1.522.531l-.006.01L1.674 8.34a1.252 1.252 0 0 0 .276 1.598l.023.018 1.479 1.16a.755.755 0 0 1 .286.625v.542a.75.75 0 0 1-.287.62l-1.478 1.16-.023.018a1.25 1.25 0 0 0-.276 1.597l2.002 3.464a1.258 1.258 0 0 0 1.527.54l.017-.006 1.737-.7a.747.747 0 0 1 .678.06c.154.098.31.19.47.275a.747.747 0 0 1 .383.554l.26 1.856.006.034a1.275 1.275 0 0 0 1.242 1.027h4.008a1.262 1.262 0 0 0 1.24-1.05l.005-.026.26-1.86a.75.75 0 0 1 .384-.553 8.32 8.32 0 0 0 .469-.273.747.747 0 0 1 .676-.06l1.74.701.017.007a1.26 1.26 0 0 0 1.529-.542l2.002-3.464a1.251 1.251 0 0 0-.276-1.598Zm-6.304-1.887a3.75 3.75 0 1 1-3.922-3.922 3.76 3.76 0 0 1 3.922 3.922Z"></path>
                         </svg>
                        </button>
                        <ul class="dropdown-menu">
                        <?php if ($_SESSION["rol"] == 1) {?>
                          <li><a class="dropdown-item" href="config/user.php"> <span>
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path d="m23.303 5.22-3.8 3.79-2.278-2.27 3.801-3.788c-2.12-1.03-5.093-1.035-6.853.72-1.655 1.65-1.862 4.247-1.056 6.29l-8.45 8.383a.563.563 0 0 0 0 .797l2.45 2.442a.563.563 0 0 0 .797 0l8.438-8.46c2.023.76 4.594.545 6.222-1.079 1.758-1.755 1.754-4.703.73-6.825Z"></path>
                              <path d="m17.13 14.469-3.366 3.375 3.54 3.746a.51.51 0 0 0 .734.01l2.812-2.834a.518.518 0 0 0-.011-.736l-3.708-3.561Z"></path>
                              <path d="M5.578 9.937c0-.228-.188-.437-.35-.599l-.011-.011-.073-.07a.05.05 0 0 1-.012-.037.758.758 0 0 1 .446-.093c.06.006.278.042.582.23.158.098 1.53 1.417 2.059 1.908a.516.516 0 0 0 .007.72l.348.367 3.078-3.054-.387-.368a.51.51 0 0 0-.718-.003C9.47 7.77 9.187 7.266 9.094 6.937c-.207-.725.194-1.312.656-1.687.274-.217.838-.379 1.36-.422a2.47 2.47 0 0 1 .544.028c.163.024.295.054.346.066.177.048.35.11.516.187l.563-.89a4.142 4.142 0 0 0-.629-.83 5.391 5.391 0 0 0-.243-.239c-.365-.335-1.312-.9-2.559-.9-.72 0-1.433.14-2.098.413-1.755.72-2.901 1.7-3.427 2.22l-.004.003a10.29 10.29 0 0 0-.979 1.14c-.25.353-.224.742-.205 1 0 .015 0 .032.003.047a.863.863 0 0 0-1.11.086L.093 8.888a.318.318 0 0 0 0 .45l2.953 2.943a.315.315 0 0 0 .446 0l1.737-1.735c.161-.16.349-.381.349-.609Z"></path>
                           </svg>
                          </span>Configuración</a></li>
                       <?php } ?>
                        
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../php/logout.php"> <span><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 12a.75.75 0 0 1 .75-.75H15V6.375c0-1.5-1.584-2.625-3-2.625H4.875A2.628 2.628 0 0 0 2.25 6.375v11.25a2.628 2.628 0 0 0 2.625 2.625h7.5A2.627 2.627 0 0 0 15 17.625V12.75H8.25A.75.75 0 0 1 7.5 12Z"></path>
                            <path d="m21.53 11.472-3.75-3.75a.75.75 0 0 0-1.06 1.06l2.47 2.47H15v1.5h4.19l-2.47 2.47a.749.749 0 0 0 .526 1.294.75.75 0 0 0 .534-.234l3.75-3.75a.75.75 0 0 0 0-1.06Z"></path>
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


      <div class="row d-flex justify-content-center " id="titulo" >
      
        <div class="col-sm-12 col-md-12 text-center my-3">
          <h1>INFORMES DE PACIENTES</h1>
          <hr />
        </div>

        <div class="col-sm-6">
        <div class="input-group">
  
        <select class="form-select" id="miSelect" aria-label="Default select example">
  <option selected>Selecione algún filtro</option>
  <option value="1">Todos los pacientes</option>
  <option value="navegacion">Pacientes en navegación</option>
  <option value="masculino">Pacientes masculinos</option>
  <option value="femenino">Pacientes femeninos</option>
  <option value="seguro">Pacientes con seguro social</option>
</select>

</div>


</div>

<div  class="text-center col-sm-6" >
 <div class="row">
 <div class="col"> Fecha de inicio
  <input type="date" class="form-control" id="fecha_i" >
 </div> 
  <div class="col">Fecha de finalización
  <input type="date" class="form-control" id="fecha_f" >
  </div>
  <div class="col"><button type="button" class="btn btn-outline-success" id="ingresar">Buscar</button></div>
 </div>
</div>

<form class="row g-3 needs-validation pb-3" >
<div>
<button  onclick="imprimir()" type="button" style="color: red; outline: inherit;border: none;background: none;" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
</svg>Guardar</button>
</div>
            
      
        </form>





        
      </div>
      <div class="row" id="cuerpo">
<div id="titulo" ></div>
      <table class="class= table table-borderless" id="tabla-datos">
                <thead>
                  <tr style="background-color: #E5E7E9; font-size:12px;">
                  <th>Cédula</th>
                    <th>Nombre Completo</th>
                    <th>Sexo</th>
                    <th>Edad</th>
                    <th>Teléfono</th>
                    <th>Provincia</th>
                    <th>Distrito</th>
                    <th>referente</th>
                    <th>fecha de ingreso</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <!-- Los datos se mostrarán aquí -->
                </tbody>
              </table>
        <!-- PARTE INACTIVA  -->
     
     
        <!-- FORMULARIOS -->
 

      
        
        

            <!-- boton final -->
      
      </div>
      <!-- cuerpo 2 -->
      
      

      

  
    </div>
  </div>

  <!-- ////////////////////////////////////////////////////////// -->
  <!-- //MENU RESPONSIVO -->
  <!-- ////////////////////////////////////////////// -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>
       <a href="dashboard.php" id="menu-extra">Inicio</a>
       <hr id="linea">
       <a href="registro_paciente.php" id="menu-extra">Registro Paciente</a>
       <hr id="linea">
       <a href="historia_clinca.php" id="menu-extra">Historia Clínica</a>
       <hr id="linea">
       <a href="hist_obstetrica.php" id="menu-extra">Historia Obstetrica</a>
       <hr id="linea">
       <a href="evolucion_paciente.php" id="menu-extra">Evolución Paciente</a>
       <hr id="linea">
      </div>
     
    </div>
  </div>

<!-- /////////////////////////////////////////////////////////////// -->
<!-- MODAL PARA EXAMEN FISICO -->
<!-- /////////////////////////////////////////////////////////////////// -->


  <!-- ////////////////////////////////////////////////////////// -->
  <!-- //MENU RESPONSIVO -->
  <!-- ////////////////////////////////////////////// -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>
       <a href="formulario.php" id="menu-extra">Inicio</a>
       <hr id="linea">
       <a href="registro-paciente.php" id="menu-extra">Registro Paciente</a>
       <hr id="linea">
       <a href="registro-medico.php" id="menu-extra">Registro Médico</a>
       <hr id="linea">
       <a href="estadistica.php" id="menu-extra">Estadistica</a>
       <hr id="linea">
      </div>
     
    </div>
  </div>






  </body>
  <!-- <script src="../jquery/jquery-3.5.1.min.js"></script> -->
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"
></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
<script src="../jquery/jquery-3.5.1.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
"></script>
<script src="../js/JsPDF/jspdf.min.js"></script>
<script src="../js/JsPDF/jspdf.plugin.autotable.js"></script>
  <script src="../js/informes/informes.js"></script>
 
  <script src="../js/informes/pdf.js"></script>


</html>
