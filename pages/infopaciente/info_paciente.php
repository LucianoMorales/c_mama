<!-- <?php
session_start();

// Verificar si el usuario ha iniciado sesión
//  if (!isset($_SESSION['nombre_apellido'])) {
//     header('Location: ../index.html');
//     exit();
//   }
//   if (!isset($_SESSION['rol'])) {
//     $_SESSION['rol'] = 1; // Asigna un valor predeterminado si es necesario
//   }
?>  -->



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
    <link rel="stylesheet" href="../../style/estilo_canva.css">
    <link rel="stylesheet" type="text/css" href="../../style/estilo_informacion_paciente.css">
    <link rel="stylesheet" type="text/css" href="../../style/estilo_menu_p.css">
    <link rel="icon" href="../../image/icon/ancec_icono.ico" type="image/x-icon">
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
    " rel="stylesheet">
    <link rel="stylesheet" href="../../style/responsive_informacion_paciente.css" />
    <title>Evolución paciente</title>
  </head>
  <body>
 


   <div class="contenedor contenedor-completo" >
    <div class="menu text-center">


   <nav  >
  <ul >
     <button class="buton_seccion" >
       <a  href="../dashboard.php"  id="lista">
       <div class="parte1_icono">
       <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M11.03 8.53a.75.75 0 1 0-1.06-1.06l-4 4a.748.748 0 0 0 0 1.06l4 4a.75.75 0 1 0 1.06-1.06l-2.72-2.72H18a.75.75 0 0 0 0-1.5H8.31l2.72-2.72Z"></path>
</svg>
<span class="parte2_texto">Regresar</span>
       </div>
    
   </a>
     </button>

  </ul> 

</nav>
      </div> 
     <!-- <div id="cme" >
    <div id="modificar">
        <span><a href="" id="info_paciente" data-bs-toggle="modal" data-bs-target="#exampleModal" >Modificar información</a></span>
    </div>
    <div id="eliminar" >
        <span><a href="" id="info_paciente" >Eliminar Información</a></span>
    </div>
     </div> -->


    <div class="container" id="menu-container"  >
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


    
      <div class="row" id="cuerpo" style="justify-content: center; max-width: 100%; " >


        <img src="../../image/logoancec.png" alt="" style="width: 36rem; height:auto; opacity:0.2; position:absolute " >
      <div  style="z-index: 2;" id="table_pac" style="height: 100%; width: 100%; " >
</div>
     
  
    
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
<div class="modal fade" id="examen_fisico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Examen Físico</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Imgrese Cédula</label>
  <input type="text" class="form-control" id="cedula_examenes" placeholder="Ingrese cédula del paciente">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Peso</label>
  <input type="text" class="form-control" id="peso_examenes" placeholder="Ingrese el peso">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Talla</label>
  <input type="text" class="form-control" id="talla_examenes" placeholder="Ingrese la Talla">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Pulso</label>
  <input type="text" class="form-control" id="pulso_examenes" placeholder="Ingrese el Pulso">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Presión</label>
  <input type="text" class="form-control" id="presion_examenes" placeholder="Ingrese la Presión">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Fecha</label>
  <input type="date" class="form-control" id="fecha_examenes" placeholder="Ingrese la Fecha">
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardar_examenes"> Guardar</button>
      </div>
    </div>
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

  <div class="modal fade" id="modificar_pac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos de los pacientes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"  >
     <div id="contenedor_principal" style="justify-content: center; text-align:center;">

     <div>
     <div class="btn-group" role="group" aria-label="Basic outlined example">
  <button type="button" class="btn btn-outline-primary"  id="informacion_personal">Informacion personal</button>
  <button type="button" class="btn btn-outline-primary" id="historial_clinico">Historial Clinico</button>
  <button type="button" class="btn btn-outline-primary" id="examenes_fisicos">Examenes Físicos</button>
  <button type="button" class="btn btn-outline-primary" id="lab_general">Laboratorios general</button>
</div>
</div>
<div>
  <!-- ************************************************************************************ -->
   <!-- *************************ACTUALIZAR REGISTRO PACIENTE ************************************* -->
   <!-- ************************************************************************************** -->
<div id="informacion_personal_cuerpo" style="display: none;" >
<div class="container-fluid" id="menu-container" >

      <div class="row d-flex justify-content-center "  >
 <div class="col-sm-12 col-md-12 text-center my-3">
          <h1>REGISTRO DE PACIENTE</h1>
  
        </div> 

<!-- ARREGLAR LÑA LINEA DEBAJOOOOO DEL COSITO Y BORRAR LA LINEA FEA.  -->
 </div>
      <div  >
      <div class="section">
  <h6>Información personal</h6>
  <hr>
</div>
        <form class="row g-3 needs-validation" novalidate>
<div class="col-md-3">
            <label for="validationCustom01" class="form-label">Cédula: </label>
            <input
              type="text"
              class="form-control"
              id="cedula"
              placeholder="1-123-123"
              
            />
          </div>

          <div class="col-md-3">
            <label for="validationCustom01" class="form-label">Nombre: </label>
            <input
              type="text"
              class="form-control"
              id="nombre"
              placeholder="Nombre"
            />
          </div>
          <div class="col-md-3">
            <label for="validationCustom02" class="form-label">Apellido</label>
            <input
              type="text"
              class="form-control"
              id="ape"
              placeholder="Apellido"
            />
          </div>
          <div class="col-md-2">
            <label for="validationCustom04" class="form-label"
              >Fecha Nacimiento</label
            >
            <input type="date" class="form-control" id="fecha_nac" />
          </div>
          <div class="col-md-1">
            <label for="validationCustom03" class="form-label">Edad</label>
            <input
              type="text"
              class="form-control"
              id="ed"
            />
          </div>
          <div class="col-md-2">
            <label for="validationCustom01" class="form-label">Sexo </label>
            <select class="form-select" aria-label="Default select example" id="sexo">
              <option selected></option>
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
              <option value="Otros">Otros</option>
            </select>
          </div>
          <div class="col-md-2 ">
            <label for="validationCustom01" class="form-label">Estado civil </label>
            <select class="form-select" aria-label="Default select example" id="estado_civil">
              <option selected></option>
              <option value="Casado (a)">Casado (a)</option>
              <option value="Soltero (a)">Soltero (a)</option>
              <option value="Viudo (a)">Viudo (a)</option>
              <option value="Unido (a)">Unido (a)</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Ocupación</label>
            <input
              type="text"
              class="form-control"
              id="ocupacion"
            />
          </div>
          <!-- <div class="col-md-3">
            <label for="validationCustom05" class="form-label"
              >Lugar de trabajo</label
            >
            <input
              type="text"
              class="form-control"
              id="lugar_trabajo"
            />
          </div> -->
          <div class="col-md-2">
            <label for="validationCustom05" class="form-label"
              >Área de referencia</label
            >
            <select class="form-select" aria-label="Default select example" id="area_referencia">
                <option selected></option>
                <option value="CSS">CSS</option>
                <option value="MINSA">MINSA</option>
                <option value="Clinica ANCEC">Clinica ANCEC</option>
                <option value="Sector privado">Sector privado</option>
                <option value="Libre demanda">Libre demanda</option>
              </select>
          </div>
          <div class="col-md-8">
            <label for="validationCustom05" class="form-label"
              >Facilidad de hospedaje y transporte en la ciudad de Panamá (Dirección) </label
            >
            <input
              type="text"
              class="form-control"
              id="hospedaje_direccion"
            />
          </div>
          <div class="col-md-3">
            <label for="validationCustom05" class="form-label"
              >Agregar a Navegación</label
            >
            <select class="form-select" aria-label="Default select example" id="add_navegacion">
                <option selected>Seleccione</option>
                <option value="Si">Si</option>
                <option value="No">No</option> 
              </select>
          </div>
          <!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
          <!-- INFORMACION DE CONTACTO -->
          <!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
          <div class="section">
          <h6>Información de contacto</h6>
           <hr>
          </div>
          <div class="col-md-2">
            <label for="validationCustom01" class="form-label">Teléfono </label>
            <input
              type="text"
              class="form-control"
              id="telefono"
              placeholder="1234-5678"
            />
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Correo electronico </label>
            <input
              type="text"
              class="form-control"
              id="correo_electronico"
              placeholder="nombre@ejemplo.com"
            />
          </div>
 <!-- <div class="col-md-3">
            <label for="validationCustom05" class="form-label">provincia</label>
            <select class="form-select" aria-label="Default select example" id="provincias">
             
            </select>
          </div>
          <div class="col-md-3 my-3">
            <label for="validationCustom05" class="form-label">Distrito</label>
            <select class="form-select" aria-label="Default select example" id="distritos">
             
              </select>
          </div> -->
<!-- /////////////////////////////////////////////////////////////////////////////////// -->
          <!-- INFORMACION DE SEGURO MEDICO -->
          <!-- /////////////////////////////////////////////////////////////////////////// -->

          <div class="section">
          <h6>Información de seguro médico</h6>
           <hr>
          </div>

          <div class="col-md-2 my-3">
            <label for="validationCustomUsername" class="form-label"
              >Seguro Social</label
            >
 
                <select class="form-select" aria-label="Default select example" id="seguro">
                    <option selected>Seleccione</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
          </div>
               <!-- /////////////////////////////////////////////////////////////////////////////////// -->
          <!-- INFORMACION DE CONTACTO DE EMERGENCIA-->
          <!-- /////////////////////////////////////////////////////////////////////////// -->

          <div class="section">
          <h6>Información de contacto de emergencia</h6>
           <hr>
          </div>
          <div class="col-md-3">
            <label for="validationCustom01" class="form-label">Nombre de contacto</label>
            <input type="text" class="form-control" id="nombre_contacto" placeholder="Nombre"/>
          </div>
          <div class="col-md-2 my-3">
            <label for="validationCustom01" class="form-label">Teléfono </label>
            <input type="text" class="form-control" id="telefono_contacto" placeholder="1234-5678"/>
          </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////// -->
          <!-- INFORMACION MEDICO -->
          <!-- /////////////////////////////////////////////////////////////////////////// -->
          <div class="section">
          <h6>Información médica</h6>
           <hr>
          </div>
        </form>

<!-- //////////////////////////////////////////////////// -->
<!-- FORMULARIOS DE ALERGIAS -->
<!-- /////////////////////////////////////////////////// -->
  <div class="col-12">
          <div class="form-check">
            <label for="validationCustom01" class="form-label"
              >¿Padece de alergias?</label
            >
            <div class="form-check form-check-inline">
                <select class="form-select" aria-label="Default select example" id="alergia">
                    <option selected>Escoga una opción</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
            </div> 
          </div>
        </div>
        <div class="col-12">
        <form class="row g-3 needs-validation" novalidate>
          <div class="col-md-3">
            <label for="validationCustom01" class="form-label">AHF </label>
            <input
              type="text"
              class="form-control"
              id="add_ahf"
              placeholder="AHF"
            />
          </div>
          <div class="col-md-3">
            <label for="validationCustom02" class="form-label">APP</label>
            <input
              type="text"
              class="form-control"
              id="add_app"
              placeholder="APP"
            />
          </div>
          <div class="col-md-2">
            <label for="validationCustom01" class="form-label">AQT</label>
            <input
              type="text"
              class="form-control"
              id="add_aqt"
              placeholder="AQT"
            
            />
          </div>

        </form>
        </div>
<!-- ////////////////////////////////////////////// -->
<!-- TEXTO QUE LE GENERA ALERGIAS -->
<!-- ///////////////////////////////////////////////////// -->
        <div class="col-10 my-3">
          <label for="validationCustomUsername" class="form-label"
            >¿Que le genera alergias?</label
          >
          <textarea class="form-control" aria-label="With textarea" id="medicamentos_aler"></textarea>
        </div>
        <div class="col-5">
        </div>
            <!-- boton final -->
      <div class=" row justify-content-right mb-2">
      <div class="col-3">
        
            <button class="btn btn-success" id="actualizar_pacientes" 
            type="submit" >ACTUALIZAR INFORMACIÓN  </button>
 
      </div>
      </div>
      </div>
 
    </div>

</div>

  <!-- ************************************************************************************ -->
   <!-- *************************ACTUALIZAR HISTORIAL PACIENTE ************************************* -->
   <!-- ************************************************************************************** -->
<div id="historial_clinico_cuerpo" style="display: none;" >

<div class="row d-flex justify-content-center " id="titulo" >
      
      <div class="col-sm-12 col-md-12 text-center my-3">
        <h1>HISTORIA CLÍNICA</h1>
        <hr />
      </div>







      
    </div>

  
    <div class="row" id="cuerpo">


      <!-- PARTE INACTIVA  -->
   
   <!-- //////////////////////////////////////////// -->
      <!-- titulo antecendentes-->
      <!-- //////////////////////////////////////// -->
      <div class="container">
      <div class="list-group">
<li  class="list-group-item " aria-current="true">
  <div class="d-flex w-100 justify-content-between">
    <h6 class="mb-0 fw-semibold">Antecedentes HeredoFamiliar</h6>
   
</li>
<!-- //////////////////////////////////////////////// -->
<!-- FOMRULARIOS DE ANTECEDENTES HEREDOFAMILIAR -->
<!-- ///////////////////////////////////////// -->
<li  class="list-group-item ">
  <!-- FORMULARIOS -->
  <form class="row g-3 mb-3" >
        <div class="col-md-3">
          <label for="validationCustom01" class="form-label">¿Antecedentes de cáncer? </label>
          <select class="form-select" aria-label="Default select example" id="add_antec_cancer">
              <option selected>Seleccione...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
      
              
            </select>
        </div>
        <div class="col-md-3 d-none" id="container_tipo_cancer">
          <label for="validationCustom02" class="form-label">Tipo de cáncer</label>
          <input
            type="text"
            class="form-control"
            id="add_tipo_cancer"
            placeholder="Tipo"
           
          />
        </div>
        <div class="col-md-3">
          <label for="validationCustom02" class="form-label">¿Alguna enfermedad cronica?</label>
          <select class="form-select" aria-label="Default select example" id="add_heredo">
              <option selected>Seleccione...</option>
              <option value="1">Si</option>
              <option value="2">No</option>
            </select>
        </div>
      



        <div class="col-md-3 " id="container_heredo" >
          <label for="validationCustom01" class="form-label"><strong>¿Cuales?</strong></label>
          <div class="container">
              <div class="row">
              <div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes">
<label class="form-check-label" for="flexCheckDefault">
  Diabetes
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="add_hipertension" name="add_hipertension">
<label class="form-check-label" for="flexCheckChecked"> 
Hipertensión
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="add_enf_renal" name="add_enf_renal" >
<label class="form-check-label" for="flexCheckChecked">
  
Enf. Renal
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="add_cardiopatias" name="add_cardiopatias">
<label class="form-check-label" for="flexCheckChecked">
Cardiopatias
</label>
</div>

              </div>
          </div>
          <input
            type="text"
            class="form-control"
            id="add_otro"
            placeholder="Otro"
          
          />
        </div>




        <div class="container">
<div class="row no-gutters">
        <div class="col-md-3">
          <label for="validationCustom02" class="form-label"></label>
          <p>  <strong> Cáncer de mama en la </strong></p>
        </div>
        <div class="col-md-2">
          <label for="validationCustom02" class="form-label">Madre</label>
          <select class="form-select" aria-label="Default select example" id="add_cancer_madre">
              <option selected>Seleccione...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-2">
          <label for="validationCustom02" class="form-label">Hermana</label>
          <select class="form-select" aria-label="Default select example" id="add_cancer_hermana">
              <option selected>Seleccione...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-2">
          <label for="validationCustom02" class="form-label">Abuela</label>
          <select class="form-select" aria-label="Default select example" id="add_cancer_abuela">
              <option selected>Seleccione...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-2">
          <label for="validationCustom02" class="form-label">Prima</label>
          <select class="form-select" aria-label="Default select example" id="add_cancer_prima">
              <option selected>Seleccione...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>
        </div>
        </div>
      </form>


</li>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ANTECEDENTES PERSONALES PATOLOGICOS  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<li  class="list-group-item ">
  <div class="d-flex w-100 justify-content-between">
  <h6 class="mb-0 fw-semibold">Antecedentes Personales Patologicos</h6>
  
  </div>
 
</li>

<li  class="list-group-item ">
  <!-- FORMULARIOS -->
  <form class="row g-3 mb-3" >
        <div class="col-md-3">
          <label for="validationCustom01" class="form-label">¿Antecedentes de cáncer? </label>
          <select class="form-select" aria-label="Default select example" id="add_antec_cancer_pat">
              <option selected>Seleccione...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
      
              
            </select>
        </div>
        <div class="col-md-3 d-none" id="container_tipo_cancer_pat">
          <label for="validationCustom02" class="form-label">Tipo de cáncer</label>
          <input
            type="text"
            class="form-control"
            id="add_tipo_cancer_pat"
            placeholder="Tipo"
           
          />
        </div>
        <div class="col-md-3">
          <label for="validationCustom02" class="form-label">¿Alguna enfermedad cronica?</label>
          <select class="form-select" aria-label="Default select example" id="add_enfer_cronica_pat">
              <option selected>Seleccione...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>
      



        <div class="col-md-3 " id="container_enfe_cronica_pat">
          <label for="validationCustom01" class="form-label"><strong>¿Cuales?</strong></label>
          <div class="container">
              <div class="row">
              <div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="add_diabetes_pat" name="add_diabetes_pat">
<label class="form-check-label" for="flexCheckDefault">
  Diabetes
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="add_hipertension_pat"  name="add_hipertension_pat">
<label class="form-check-label" for="flexCheckChecked">
  
Hipertensión
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="add_enf_renal_pat" name="add_enf_renal_pat" >
<label class="form-check-label" for="flexCheckChecked">
  
Enf. Renal
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="add_cardiopatias_pat" name="add_cardiopatias_pat" >
<label class="form-check-label" for="flexCheckChecked">
  
Cardiopatias
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="add_obesidad_pat" name="add_obesidad_pat" >
<label class="form-check-label" for="flexCheckChecked">
  
Obesidad
</label>
</div>
              </div>
          </div>
          <input
            type="text"
            class="form-control"
            id="add_otro_pat"
            placeholder="Otro"
          
          />
        </div>
      </form>
</li>

<!-- ///////////////////////////////////////////////////////// -->
<!-- FORMULARIOS PARA ANTECENDETES GINECOPTETRICOS -->
<!-- /////////////////////////////////////////////////////// -->
<li  class="list-group-item ">
  <div class="d-flex w-100 justify-content-between">
  <h6 class="mb-0 fw-semibold">Antecedentes Gineco-obstétricos</h6>
  
  </div>
 
</li>

<li  class="list-group-item ">
  <!-- FORMULARIOS GINECOBTETRICOS-->
  <form class="row g-3 mb-3" >
  <div class="col-md-2">
          <label for="validationCustom01" class="form-label">Embarazos </label>
          <input
            type="text"
            class="form-control"
            id="add_embarazos"
            placeholder="cantidad"
            
          />
        </div>
        <div class="col-md-2">
          <label for="validationCustom02" class="form-label">Partos</label>
          <input
            type="text"
            class="form-control"
            id="add_partos"
            placeholder="Cantidad"
           
          />
        </div>
        <div class="col-md-2">
          <label for="validationCustom03" class="form-label">Abortos</label>
          <input
            type="text"
            class="form-control"
            id="add_abortos"
            placeholder="Cantidad abortos"
          />
        </div>
        <div class="col-md-2">
          <label for="validationCustom01" class="form-label">Cesareas </label>
          <input
            type="text"
            class="form-control"
            id="add_cesáreas"
            placeholder="Cantidad"
          
          />
        </div>
        <div class="col-md-2">
          <label for="validationCustom01" class="form-label">Menarquia </label>
          <input
            type="text"
            class="form-control"
            id="add_menarquia"
            placeholder=""
          
          />
        </div>
  <div class="col-md-2">
          <label for="validationCustom01" class="form-label">IVSA </label>
          <input
            type="text"
            class="form-control"
            id="add_ivsa"
          />
        </div>

        <div class="col-md-3">
          <label for="validationCustom02" class="form-label">Fecha del último PAP</label>
          <input
            type="date"
            class="form-control"
            id="add_ultimo_pap"
          />
        </div>

        <div class="col-md-2 my-3">
          <label for="validationCustom05" class="form-label"
            >Vacunación por VPH</label
          >
          <select class="form-select" aria-label="Default select example" id="add_vph">
              <option selected>Seleccione</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>

        <div class="col-md-3">
          <label for="validationCustom02" class="form-label">Fecha del último parto</label>
          <input
            type="date"
            class="form-control"
            id="add_ultimo_parto"
            
           
          />
        </div>
     

    

        <div class="col-md-2 my-3">
          <label for="validationCustom05" class="form-label"
            >Dio Pecho</label
          >
          <select class="form-select" aria-label="Default select example" id="add_pecho">
              <option selected>Seleccione</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>
      
        <div class="col-md-2">
          <label for="validationCustom04" class="form-label"
            >Ultima menstruación</label>
          <input
            type="date"
            class="form-control"
            id="add_fecha_menstruacion"
            
          />
        </div>
        <div class="col-md-2">
          <label for="validationCustom01" class="form-label">Menopausia </label>
          <input
            type="text"
            class="form-control"
            id="add_menopausia"
            placeholder=""
          
          />
        </div>
        <div class="col-md-2">
          <label for="validationCustom01" class="form-label">Tabaquismo </label>
          <input
            type="text"
            class="form-control"
            id="add_tabaquismo"
            placeholder=""
          
          />
        </div>

        <div class="col-md-3 my-3">
          <label for="validationCustom05" class="form-label"
            >Usa Anticonceptivos</label>
            <input type="number" class="form-control" id="add_anticonceptivos">
          <!-- <select class="form-select" aria-label="Default select example" id="add_anticonceptivos">
              <option selected>Seleccione</option>
              <option value="1">Si</option>
              <option value="2">No</option>
            </select> -->
        </div>

        <div class="col-md-3 my-3">
          <label for="validationCustom05" class="form-label"
            >Usa Estrógenos</label>
            <input type="number" class="form-control" id="add_estrogenos">
          <!-- <select class="form-select" aria-label="Default select example" id="add_estrogenos">
              <option selected>Seleccione</option>
              <option value="1">Si</option>
              <option value="2">No</option>
            </select> -->
        </div>
        <div class="col-md-3 my-3">
          <label for="validationCustom05" class="form-label"
            >Usa Provera</label>
            <input type="number" name="" class="form-control" id="add_provera">
          <!-- <select class="form-select" aria-label="Default select example" id="add_provera">
              <option selected>Seleccione</option>
              <option value="1">Si</option>
              <option value="2">No</option>
            </select> -->
        </div>
        <div class="col-md-3 my-3">
          <label for="validationCustom05" class="form-label"
            >Biopsia previa</label>
          <select class="form-select" aria-label="Default select example" id="add_biopsia_previa">
              <option selected>Seleccione</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-3 my-3">
          <label for="validationCustom05" class="form-label"
            >¿Ha tenido quistes?</label>
          <select class="form-select" aria-label="Default select example" id="add_quistes">
              <option selected>Seleccione</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>
       
        <div class="col-md-3 my-3">
          <label for="validationCustom05" class="form-label"
            >¿Ha tenido Fifroadenoma?</label>
          <select class="form-select" aria-label="Default select example" id="add_fifroadenoma">
              <option selected>Seleccione</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>
     
        <div class="col-md-3 my-3">
          <label for="validationCustom05" class="form-label"
            >¿Ha tenido cáncer de mama?</label>
          <select class="form-select" aria-label="Default select example" id="add_cancer_mama">
              <option selected>Seleccione</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
        </div>

      </form>
</li>



</div>
</div>

          <!-- boton final -->
    <div class=" row justify-content-right mb-2">
    <div class="col-3">
      
          <button class="btn btn-success" id="modificar_historial" 
          type="submit" >ACTUALIZAR INFORMACIÓN</button>

    </div>
    </div>
    </div>
   


</div>

  <!-- ************************************************************************************ -->
   <!-- *************************ACTUALIZAR EXAMENES PACIENTE ************************************* -->
   <!-- ************************************************************************************** -->
<div id="examenes_fisicos_cuerpo" style="display: none;" >
<div class="row d-flex justify-content-center " id="titulo">

<div class="col-sm-12 col-md-12 text-center my-3">
  <h1>EXAMENES FÍSICOS</h1>
  <hr />
</div>



</div>
<div class="row" id="cuerpo">

<div class="row" >
<div class="col-md-4" ><span>Seleccione fecha de examen</span></div>
<div class="col-md-8">  
  <select  id="opciones" class="form-select" >

           <!-- Puedes agregar más opciones según tus necesidades -->
        
    </select>
  </div>

</div>

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

  <div class="col-md-12 my-3" id="container_tipo_cancer_pat">
    <label for="validationCustom02" class="form-label"> <strong>¿Motivo de su visita?</strong> </label>
    <textarea class="form-control" name="" id="add_motivo" cols="30" rows="3"></textarea>
  </div>
  <label for="validationCustomUsername" class="form-label">
    <h6>Examen Físico de Mamas</h6>
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
      <tr>
        <th scope="row"></th>
        <td> <strong>Derecha</strong> </td>
        <td> <strong>Izquierda</strong> </td>

      </tr>
      <!-- /////////////////////////////////////////////////////////////////////////////////////// -->
      <!-- TAMAÑO DE MAMA -->
      <!-- ///////////////////////////////////////////////////////////////////////////////////// -->

      <tr>
        <th scope="row">Tamaño de la mama</th>
        <td><select class="form-select" aria-label="Default select example" id="add_tamaño_mama_derecho">
            <option selected>seleccione el hallazgo derecho</option>
            <option value="Pequeno">Pequeno</option>
            <option value="Mediano">Mediano</option>
            <option value="Grande">Grande</option>
           
          </select></td>
        <td><select class="form-select" aria-label="Default select example" id="add_tamaño_mama_izquierdo">
            <option selected>Seleccione el hallazgo</option>
            <option value="Pequeno">Pequeño</option>
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
            <option selected>seleccione el hallazgo</option>
            <option value="Blando">Blando</option>
            <option value="Firme">Firme</option>
            <option value="Nodular">Nodular</option>
         
          </select></td>
        <td><select class="form-select" aria-label="Default select example" id="add_consistencia_izquierdo">
            <option selected>Seleccione el hallazgo</option>
            <option value="Blando">Blando</option>
            <option value="Firme">Firme</option>
            <option value="Nodular">Nodular</option>
           
          </select></td>
      </tr>
      <!-- //////////////////////////////////////////////////////// -->
      <!-- PEZON  -->
      <!-- ///////////////////////////////////////////////////////////// -->
      <tr>
        <th scope="row">Pezon</th>
        <td><select class="form-select" aria-label="Default select example" id="add_pezon_derecho">
            <option selected>seleccione el hallazgo</option>
            <option value="Invertido">Invertido</option>
            <option value="Excema">Excema</option>
            <option value="Secreción">Secreción</option>
            <option value="Lechosa">Lechosa</option>
            <option value="Verde">Verde</option>
            <option value="Hematica">Hematica</option>
          </select></td>
        <td><select class="form-select" aria-label="Default select example" id="add_pezon_izquierdo">
            <option selected>Seleccione el hallazgo</option>
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
            <option selected>seleccione el hallazgo</option>
            <option value="Gruesa">Gruesa</option>
            <option value="Edema">Edema</option>
            <option value="Retracción">Retracción</option>
          
          </select></td>
        <td><select class="form-select" aria-label="Default select example" id="add_piel_izquierdo">
            <option selected>Seleccione el hallazgo</option>
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
            <option selected>seleccione el hallazgo</option>
            <option value="Ganglio móvil">Ganglio móvil</option>
            <option value="Ganglio Fijo">Ganglio Fijo</option>
            <option value="Mama accesoria">Mama accesoria</option>
         
          </select></td>
        <td><select class="form-select" aria-label="Default select example" id="add_axila_izquierdo">
            <option selected>Seleccione el hallazgo</option>
            <option value="Ganglio móvil">Ganglio móvil</option>
            <option value="Ganglio Fijo">Ganglio Fijo</option>
            <option value="Mama accesoria">Mama accesoria</option>
          
          </select></td>
      </tr>

      <!-- /////////////////////////////////////////// -->
      <!-- TAMAÑO DEL NODULO -->
      <!-- ///////////////////////////////////////////////////// -->


      <!-- ////////////////////////////////////////// -->
      <!-- CONSISTENCIA  -->
      <!-- ///////////////////////////////////////////////// -->


      <!-- ////////////////////////////////////////////////////////////////// -->
      <!-- PROTESIS -->
      <!-- ////////////////////////////////////////////////////////////////// -->
      <tr>
        <th scope="row">Protesis </th>
        <td><select class="form-select" aria-label="Default select example" id="add_protesis_derecho">
            <option selected>seleccione el hallazgo</option>
            <option value="Encapsulada">Encapsulada</option>

            

          </select></td>
        <td><select class="form-select" aria-label="Default select example" id="add_protesis_izquierdo">
            <option selected>Seleccione el hallazgo</option>
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
  <label for=""> <strong>Tiene nodulo</strong> </label>
  <select class="form-select" aria-label="Default select example" id="contiene_nodulo">
    <option selected>Seleccione el hallazgo</option>
    <option value="Si">Si</option>

    <option value="No">No</option>
  </select>
</div>

<!-- ************************************************************************************************ *****-->
<!-- *************************************** NODULO *******************************************************  -->
<!-- ******************************************************************************************************* -->
<div class="row  my-3" id="informacion_nodulo">

  <div class="col-md-5">
    <label for="validationCustomUsername" class="form-label"><strong>Nodulo</strong></label>

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
              <option selected>seleccione el hallazgo</option>
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
              <option selected>seleccione el hallazgo</option>
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
    <label for="validationCustomUsername" class="form-label"><strong>Dibuje en diagrama</strong></label>
    <button type="button" class="btn btn-danger" id="clear">Limpiar Diagrama</button>
    <div id="container">
      <canvas id="canvas" width="330" height="310" style="border:1px solid black; "></canvas>

    </div>
  </div>


</div>

<div class="col-md-12">
  <span>
    <h6>Estudio de Gabinete</h6>
  </span>
  <hr>
</div>
<!-- ********************************************************************************************************** -->
<!-- ************************************  LABORITORIO CLINICO ******************************************* -->
<!-- ******************************************************************************************************* -->
<div class="row g-3">


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
      <div class="col-md-4 " id="add_fecha_ul">
        <label for="">Fecha</label>
        <input type="date" class="form-control" id="add_fecha_u">
      </div>

      <div class="col-md-5 " id="add_reporte_ul">
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
      <div class="col-md-4 " id="add_fecha_ma">
        <label for="">Fecha</label>
        <input type="date" class="form-control" id="add_fecha_m">
      </div>
      
      <div class="col-md-5 " id="add_reporte_ma">
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
      <div class="col-md-4 " id="add_fecha_bi">
        <label for="">Fecha</label>
        <input type="date" class="form-control" id="add_fecha_b">
      </div>
      
      <div class="col-md-5 " id="add_reporte_bi">
        <label for="">Reporte</label>
        <textarea name="" id="add_reporte_b" cols="5" rows="2" class="form-control"></textarea>
      </div>
    </div>

  </div>
</div>
<!-- *********************************************************************************************** -->
<!-- ************************* DIAGNOSTICO HISTOPATOLÓGICO **************************************** -->
<!-- **********************************************************************************************  -->

<div class="row g-3 "  id="histo">
<div class="col-md-12"><strong>Diagnostico Histopatológico</strong></div>
<hr>

</div>
<!-- ************************************************************************************************ ********* -->
<!-- *************************** DIAGNOSTICO CLINICO *********************************************************  -->
<!-- ********************************************************************************************************* -->

<div class="row my-3">
  <div class="col-md-6"><label for="validationCustomUsername" class="form-label"><strong>Diagnóstico Clínico</strong></label></div>
  <div class="col-md-6"><label for="validationCustomUsername" class="form-label"><strong>Impresión diagnostica</strong></label></div>
  
  <div class="col-md-5" >

  <!-- MAMAS NORMALES -->

  <div class="row g-3">
    <div class="col-md-6"><label for="">add_mamas normales</label></div>
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
    <div class="col-md-6"><label for=""> Nodulo Benigno</label></div>
  <div class="col-md-6" >
  <input type="text" class="form-control" id="add_nodulo_benigno">


  </div>
  </div>
   
<!-- ******************************************************************************* -->
<!-- *************************** NODULO SOSPECHOSO  ********************************** -->
<!-- ******************************************************************************** -->


<div class="row g-3">
    <div class="col-md-6"><label for=""> Nodulo sospechoso</label></div>
  <div class="col-md-6" >
  <input type="text" class="form-control" id="add_nodulo_sospechoso">


  </div>
  </div>

  </div>

  <!-- IMPRESION DIAGNOSTICO -->
  <div class="col-md-4 ">
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
      <div class="col-md-3 ">
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


<div class="row g-3">
  <div class="col-md-6">
  <label for="">Recomendación</label>
  <textarea name="" id="recomendacion" cols="3" rows="3" class="form-control"></textarea>
  </div>
  <div class="col-md-4">
    <label for="">Referia a:</label>
    <select class="form-select" aria-label="Default select example" id="referir_a">
          <option selected>seleccione... </option>
          <option value="Clínica ANCEC">Clínica ANCEC</option>
          <option value="CSS">CSS</option>
          <option value="Centro de salud (MINSA)">Centro de salud (MINSA)</option>
          <option value="Hospital Regional">Hospital Regional</option>
          <option value="ION">ION</option>
        </select>
  </div>
</div>


<!-- boton final -->
<div class=" row justify-content-right mb-2">
  <div class="col-3 my-3">

    <button class="btn btn-success" id="actualizar_examenes" type="submit">ACTUALIZAR INFORMACIÓN</button>

  </div>
</div>
</div>
<!-- cuerpo 2 -->






</div>
<div id="laboratorios_general" style="display: none;" >

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
                  <option selected>seleccione... </option>
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
</div>




</div>
</div>
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   
      </div>
    </div>
  </div>
</div>




  </body>

  <script src="../../jquery/jquery-3.5.1.min.js"></script>


  <!-- <script src="../../js/cargar.js"></script> -->
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"
></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
"></script>

<script src="../../js/info_paciente/info_paciente.js"></script>
 

</html>
