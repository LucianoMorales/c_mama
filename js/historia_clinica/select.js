// ************************************************************************
// CONTROLA LOS SELECT SI MUESTRA O NO LA INFORMACION DEPENDENDIENDO DE LO QUE SELECCIONE EL USUARIO
// **********************************************************************}


// VARIABLES DE TIPO DE CANCER SECCION HEREDOFAMILIAR
var selectheredo = document.getElementById("add_heredo");
var informacionheredo = document.getElementById("container_heredo");
// VARIABLES DE ALGUNA ENFERMEDAD CRONICA HEREDOFAMILIAR

var selectantece = document.getElementById("add_antec_cancer");
var informaciontipo = document.getElementById("container_tipo_cancer");



// VARIABLES DE TIPO DE CANCER SECCION PATOLOGIA
var selectantecepat = document.getElementById("add_antec_cancer_pat");
var informaciontipopat = document.getElementById("container_tipo_cancer_pat");

// VARIABLES DE ALGUNA ENFERMEDAD CRONICA PATOLOGIA

var selectcronicopat = document.getElementById("add_enfer_cronica_pat");
var informacion_cronica_pat = document.getElementById("container_enfe_cronica_pat");



var biopsia = document.getElementById("add_biopsia_previa");
var  seleccionbiopsia = document.getElementById("seleccionBiopsia");

// Agrega un evento change al elemento select

biopsia.addEventListener("change", function() {

  // Verifica si se seleccionó "Si"
  if (biopsia.value === "Si") {
    seleccionbiopsia.classList.remove("d-none");
 // Muestra el div de información
  
  } else {
    seleccionbiopsia.classList.add("d-none"); // Oculta el div de información

   
  }
});


selectheredo.addEventListener("change", function() {

  // Verifica si se seleccionó "Si"
  if (selectheredo.value === "Si") {
    informacionheredo.classList.remove("d-none");
 // Muestra el div de información
  
  } else {
    informacionheredo.classList.add("d-none"); // Oculta el div de información

   
  }
});


// Agrega un evento change al elemento select
selectantece.addEventListener("change", function() {

  // Verifica si se seleccionó "Si"
  if (selectantece.value === "Si") {
    informaciontipo.classList.remove("d-none");
 // Muestra el div de información
  
  } else {
    informaciontipo.classList.add("d-none"); // Oculta el div de información
   
   
  }
});

selectantecepat.addEventListener("change", function() {

    // Verifica si se seleccionó "Si"
    if (selectantecepat.value === "Si") {
      informaciontipopat.classList.remove("d-none");
   // Muestra el div de información
    
    } else {
      informaciontipopat.classList.add("d-none"); // Oculta el div de información
     
     
    }
  });
  selectcronicopat.addEventListener("change", function() {

    // Verifica si se seleccionó "Si"
    if (selectcronicopat.value === "Si") {
      informacion_cronica_pat.classList.remove("d-none");
   // Muestra el div de información
    
    } else {
      informacion_cronica_pat.classList.add("d-none"); // Oculta el div de información
     
     
    }
  });