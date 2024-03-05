 function limpiar(){

////////////////////////////////////////////////////
document.getElementById("cedula").value="";
$("#add_antec_cancer ").prop("SelectedIndex",0);
 document.getElementById("add_tipo_cancer").value="";
$("#add_heredo ").prop("SelectedIndex",0);
$("add_diabetes").prop("checked",false);
$("add_hipertension").prop("checked",false);
$("add_enf_renal").cprop("checked",false);
$("add_cardiopatias").prop("checked",false);
document.getElementById("add_otro").value="";
$("#add_cancer_madre ").prop("selectedIndex",0);
$("#add_cancer_hermana ").prop("selectedIndex",0);
$("#add_cancer_abuela ").prop("selectedIndex",0);
$("#add_cancer_prima ").prop("selectedIndex",0);
$("#add_antec_cancer_pat").prop("selectedIndex",0);
document.getElementById("add_tipo_cancer_pat").value="";
$("#add_enfer_cronica_pat ").prop("SelectedIndex",0);
$("add_diabetes_pat").prop("checked",false);
$("add_hipertension_pat").prop("checked",false);
$("add_enf_renal_pat").prop("checked",false);
$("add_cardiopatias_pat").prop("checked",false);
$("add_obesidad_pat").prop("checked",false);
document.getElementById("add_otro_pat").value="";
document.getElementById("add_embarazos").value="";
document.getElementById("add_partos").value="";
document.getElementById("add_abortos").value="";
document.getElementById("add_cesáreas").value="";
document.getElementById("add_menarquia").value="";
document.getElementById("add_ivsa").value="";
document.getElementById("add_ultimo_pap").value="";
$("#add_vph ").prop("selectedIndex",0);
 document.getElementById("add_ultimo_parto").value="";
$("#add_pecho ").prop("selectedIndex",0);
document.getElementById("add_fecha_menstruacion").value;
document.getElementById("add_menopausia").value="";
document.getElementById("add_tabaquismo").value="";
document.getElementById("add_anticonceptivos").value="";
document.getElementById("add_estrogenos").value="";

$("#add_biopsia_previa ").prop("selectedIndex",0);
document.getElementById("fecha_biopsia").value="";
document.getElementById("resultado_biopsia").value="";
$("#add_quistes ").prop("selectedIndex",0);
$("#add_fifroadenoma ").prop("selectedIndex",0);
$("#add_cancer_mama ").prop("selectedIndex",0);
document.getElementById("add_motivo").value="";

 }
 
 
 
 
 $("#send_date").click(function () {
// Variables de JavaScript
const cedula = document.getElementById("cedula").value;
const antecedentesCancer = $("#add_antec_cancer :selected").val();
const tipoCancer = document.getElementById("add_tipo_cancer").value;
const enfcronica_familiar = $("#add_heredo :selected").val();
const diabetes = document.getElementsByName("add_diabetes")[0].checked ? 1 : 0;
const hipertension = document.getElementsByName("add_hipertension")[0].checked ? 1 : 0;
const fRenal = document.getElementsByName("add_enf_renal")[0].checked ? 1 : 0;
const cardiopatias = document.getElementsByName("add_cardiopatias")[0].checked ? 1 : 0;
const otro = document.getElementById("add_otro").value;
const madre = $("#add_cancer_madre :selected").val();
const hermana = $("#add_cancer_hermana :selected").val();
const abuela = $("#add_cancer_abuela :selected").val();
const prima = $("#add_cancer_prima :selected").val();
const antecedentesPatologicos = $("#add_antec_cancer_pat :selected").val();
const tipoCancerPat = document.getElementById("add_tipo_cancer_pat").value;
const enfCronicaPat = $("#add_enfer_cronica_pat :selected").val();
const diabetesPat = document.getElementsByName("add_diabetes_pat")[0].checked ? 1 : 0;
const hipertensionPat = document.getElementsByName("add_hipertension_pat")[0].checked ? 1 : 0;
const fRenalPat = document.getElementsByName("add_enf_renal_pat")[0].checked ? 1 : 0;
const cardiopatiasPat = document.getElementsByName("add_cardiopatias_pat")[0].checked ? 1 : 0;
const obesidadPat = document.getElementsByName("add_obesidad_pat")[0].checked ? 1 : 0;
const otroPat = document.getElementById("add_otro_pat").value;
const embarazos = document.getElementById("add_embarazos").value;
const partos = document.getElementById("add_partos").value;
const abortos = document.getElementById("add_abortos").value;
const cesareas = document.getElementById("add_cesáreas").value;
const menarquia = document.getElementById("add_menarquia").value;
const ivsa = document.getElementById("add_ivsa").value;
const ultimoPap = document.getElementById("add_ultimo_pap").value;
const vph = $("#add_vph :selected").val();
const ultimoParto = document.getElementById("add_ultimo_parto").value;
const pecho = $("#add_pecho :selected").val();
const fechaMenstruacion = document.getElementById("add_fecha_menstruacion").value;
const menopausia = document.getElementById("add_menopausia").value;
const tabaquismo = document.getElementById("add_tabaquismo").value;
const anticonceptivos = document.getElementById("add_anticonceptivos").value;
const estrogenos = document.getElementById("add_estrogenos").value;

const biopsiaPrevia = $("#add_biopsia_previa :selected").val();
const fecha_biopsia = document.getElementById("fecha_biopsia").value;
const resultado_biopsia = document.getElementById("resultado_biopsia").value;
const quistes = $("#add_quistes :selected").val();
const fifroadenoma = $("#add_fifroadenoma :selected").val();
const cancerMama = $("#add_cancer_mama :selected").val();
const add_motivo = document.getElementById("add_motivo").value;
// Objeto 'datos' construido con las variables
const datos = {
  cedula:cedula,
  antecedentes_cancer: antecedentesCancer,
  tipo_cancer: tipoCancer,
  enfcronica_familiar:enfcronica_familiar,
  diabetes:diabetes,
  hipertension:hipertension,
  f_renal: fRenal,
  cardiopatias:cardiopatias,
  otro:otro,
  madre:madre,
  hermana:hermana,
  abuela:abuela,
  prima:prima,
  antecedentes_patologicos: antecedentesPatologicos,
  tipo_cancer_pat: tipoCancerPat,
  enf_cronica: enfCronicaPat,
  diabetes_pat: diabetesPat,
  hipertension_pat: hipertensionPat,
  f_renal_pat: fRenalPat,
  cardiopatias_pat: cardiopatiasPat,
  obesidad_pat: obesidadPat,
  otro_pat: otroPat,
  embarazos:embarazos,
  partos:partos,
  abortos:abortos,
  cesareas:cesareas,
  menarquia:menarquia,
  ivsa:ivsa,
  ultimopap: ultimoPap,
  vph:vph,
  ultimoparto: ultimoParto,
  pecho:pecho,
  fechamenstruacion:fechaMenstruacion,
  menopausia:menopausia,
  tabaquismo:tabaquismo,
  anticonceptivos:anticonceptivos,
  estrogenos:estrogenos,
  // provera:provera,
  biopsiaprevia:biopsiaPrevia ,
  fecha_biopsia:fecha_biopsia,
  resultado_biopsia:resultado_biopsia,
  quistes:quistes,
  fifroadenoma:fifroadenoma,
  cancermama:cancerMama,
  add_motivo:add_motivo
};

$.ajax({
    type:"POST",
    url:"../php/historia_clinica/historia_clinica.php",
    data:JSON.stringify(datos),
    success: function(resp){
     
        if(resp==1){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Datos Guardados con exito'
          })
          limpiar();
        }
        else{

          console.log(resp);
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Datos no guardados',
            footer: '<a>Intentelo de nuevo</a>'
          })
        }
    }
})
  });

  $("#bsc_paciente").click(function () {
    const cedula = document.getElementById("cedula").value;
    if(cedula.length==0){
alert("ingrese la cédula, campo vacio")

    }
    else{
      const dato= {cedula:cedula};
      $.ajax({
        type:"POST",
        url:"../php/historia_clinica/bsc_paciente.php",
        data:JSON.stringify(dato),
        success: function(resp){
          $('#tabla-datos tbody').html(resp);
        }
      })
    }



  })