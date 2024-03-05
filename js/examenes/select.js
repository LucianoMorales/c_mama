// Obtén el elemento select y el div de información
var selectElement = document.getElementById("contiene_nodulo");
var informacionDiv = document.getElementById("informacion_nodulo");

// Agrega un evento change al elemento select
selectElement.addEventListener("change", function () {
  // Verifica si se seleccionó "Si"
  if (selectElement.value === "Si") {
    informacionDiv.classList.remove("d-none"); // Muestra el div de información
  } else {
    informacionDiv.classList.add("d-none"); // Oculta el div de información
  }
});
// *************************************************************************************
// *********************** CONTROL SELECT DE ULTROSONIDO GABINETE  *********************
// *************************************************************************************
// Obtén el elemento select y el div de información
var selectU = document.getElementById("ultrasonido_gabinete");
var fecha = document.getElementById("add_fecha_ul");
var reporte = document.getElementById("add_reporte_ul");
// Agrega un evento change al elemento select
selectU.addEventListener("change", function () {
  // Verifica si se seleccionó "Si"
  if (selectU.value === "Si") {
    fecha.classList.remove("d-none"); // Muestra el div de información
    reporte.classList.remove("d-none"); 
  } else {
    fecha.classList.add("d-none"); // Oculta el div de información
    reporte.classList.add("d-none");
  }
});
// *************************************************************************************
// *********************** CONTROL SELECT DE MAMOGRAFIA GABINETE  *********************
// *************************************************************************************
// Obtén el elemento select y el div de información
var selectM = document.getElementById("mamografia_gabinete");
var fechaM = document.getElementById("add_fecha_ma");
var reporteM = document.getElementById("add_reporte_ma");
// Agrega un evento change al elemento select
selectM.addEventListener("change", function () {
  // Verifica si se seleccionó "Si"
  if (selectM.value === "Si") {
    fechaM.classList.remove("d-none"); // Muestra el div de información
    reporteM.classList.remove("d-none"); 
  } else {
    fechaM.classList.add("d-none"); // Oculta el div de información
    reporteM.classList.add("d-none");
  }
});
// *************************************************************************************
// *********************** CONTROL SELECT DE BIOPSIA GABINETE  *********************
// *************************************************************************************
// Obtén el elemento select y el div de información
var selectB = document.getElementById("biopsia_gabinete");
var fechaB = document.getElementById("add_fecha_bi");
var reporteB = document.getElementById("add_reporte_bi");
var histo = document.getElementById("histo");
// Agrega un evento change al elemento select
selectB.addEventListener("change", function () {
  // Verifica si se seleccionó "Si"
  if (selectB.value === "Si") {
    fechaB.classList.remove("d-none"); // Muestra el div de información
    reporteB.classList.remove("d-none"); 
    histo.classList.remove("d-none"); 
  } else {
    fechaB.classList.add("d-none"); // Oculta el div de información
    reporteB.classList.add("d-none");
    histo.classList.add("d-none"); 
  }
});


// *************************************************************************************
// *********************** CONTROL SELECT DE EXAMENES DE LABORATORIOS *********************
// *************************************************************************************

var examen_lab = document.getElementById("examen_lab");
var btn_examen = document.getElementById("add_lab");

// Agrega un evento change al elemento select
examen_lab.addEventListener("change", function () {
  // Verifica si se seleccionó "Si"
  if (examen_lab.value === "Si") {
    btn_examen.classList.remove("d-none"); // Muestra el div de información
  
  } else {
    btn_examen.classList.add("d-none"); // Oculta el div de información

  }
});



var colposcopia = document.getElementById("colposcopía");
var fn_citologia = document.getElementById("funcion_citologia");

// Agrega un evento change al elemento select
$("input[name='colposcopia_option']").on("change", function(){
  if ($(this).val() === "Si") {
      $("#funcion_citologia").removeClass("d-none");
  } else {
      $("#funcion_citologia").addClass("d-none");
  }
});