// BOTONES DE MODAL

let paciente_modificar;

var btnInformacionPersonal = document.getElementById("informacion_personal");
var btnHistorialClinico = document.getElementById("historial_clinico");
var btnExamenesFisicos = document.getElementById("examenes_fisicos");
var btnlabgeneral = document.getElementById("lab_general");

var divInformacionPersonal = document.getElementById("informacion_personal_cuerpo");
var divHistorialClinico = document.getElementById("historial_clinico_cuerpo");
var divExamenesFisicos = document.getElementById("examenes_fisicos_cuerpo");
var divlabgeneral = document.getElementById("laboratorios_general");

var clear = document.getElementById('clear');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');

const image = new Image();
image.src = "../../image/mamas/mamas.png"; // Ruta de la imagen

// Espera a que la imagen se cargue
image.onload = function() {
  // Dibuja la imagen en el canvas
  context.drawImage(image, 0, 0, canvas.width, canvas.height);
};


// Variables para almacenar el estado del dibujo
var isDrawing = false;
var points = []; // Arreglo para almacenar los puntos de cada línea dibujada

// Función para dibujar una línea
function drawLine(x, y) {
    if (!isDrawing) return;

    context.strokeStyle = 'red';
    context.lineWidth = 2;
    context.lineCap = 'round';

    context.beginPath();
    context.moveTo(points[points.length - 1].x, points[points.length - 1].y);
    context.lineTo(x, y);
    context.stroke();

    points.push({ x: x, y: y });
}

// Eventos del ratón
canvas.addEventListener('mousedown', function(e) {
    isDrawing = true;
    points.push({ x: e.offsetX, y: e.offsetY });
});

canvas.addEventListener('mousemove', function(e) {
    drawLine(e.offsetX, e.offsetY);
});

canvas.addEventListener('mouseup', function() {
    isDrawing = false;
});

canvas.addEventListener('mouseout', function() {
    isDrawing = false;
});

function clearCanvas() {
    if (points.length > 0) {
        // Borra todas las líneas del lienzo sin borrar la imagen de fondo
        context.clearRect(0, 0, canvas.width, canvas.height);

        // Vuelve a dibujar la imagen de fondo
        context.drawImage(image, 0, 0, canvas.width, canvas.height);

        // Elimina el último trazo dibujado
        points.pop();

        // Redibuja los trazos restantes
        for (var i = 0; i < points.length; i++) {
            var point = points[i];
            if (i === 0) {
                context.beginPath();
                context.moveTo(point.x, point.y);
            } else {
                context.lineTo(point.x, point.y);
            }
            context.strokeStyle = 'red';
            context.lineWidth = 2;
            context.lineCap = 'round';
            context.stroke();
        }
    }
}


function datos(){
  $.ajax({
    url: '../../php/info_paciente/info_paciente.php',
    // dataType: 'json',
    success: function(datos) {
      // Agrega la tabla al cuerpo de la tabla en el HTML
      $('#table_pac').html(datos);
    }
  });
}



// Agrega escuchadores de eventos de clic a los botones
btnInformacionPersonal.addEventListener("click", function() {
  // Muestra el div de información personal y oculta los otros
  divInformacionPersonal.style.display = "block";
  divHistorialClinico.style.display = "none";
  divExamenesFisicos.style.display = "none";
  divlabgeneral.style.display="none";
  const datos = {
    paciente_modificar : paciente_modificar,
  };
  console.log(datos);
  $.ajax({
    type:"POST",
    url: '../../php/info_paciente/traer_datos_paciente.php',
    contentType: 'application/json',  // Especificar el tipo de contenido
    dataType: 'json',
    data:JSON.stringify(datos),
    // dataType: 'json',
    success: function(datos) {
      
      $('#cedula').val(datos[0].cedula);
      $('#nombre').val(datos[0].nombre);
      $('#ape').val(datos[0].apellido);
       
        $('#fecha_nac').val(datos[0].fecha_nacimiento);
        $('#ed').val(datos[0].edad);
        $('#seguro').val(datos[0].seguro);
        $('#sexo').val(datos[0].sexo);
        $('#telefono').val(datos[0].telefono);
        $('#provincias').val(datos[0].provincia);
        $('#distritos').val(datos[0].distrito);
        $('#ocupacion').val(datos[0].ocupacion);
        $('#estado_civil').val(datos[0].estado_civil);
        $('#area_referencia').val(datos[0].referente);
        $('#hospedaje_direccion').val(datos[0].hospedaje);
        $('#add_navegacion').val(datos[0].navegacion);
        $('#correo_electronico').val(datos[0].correo_electronico);
        $('#nombre_contacto').val(datos[0].nombre_contacto);
        $('#telefono_contacto').val(datos[0].telefono_contacto);

        $('#alergia').val(datos[0].alergico);
        $('#medicamento_aler').val(datos[0].medicamento);
        $('#add_ahf').val(datos[0].ahf);
        $('#add_app').val(datos[0].app);
        $('#add_aqt').val(datos[0].aqt);
        // var lugar_trabajo = document.getElementById("lugar_trabajo").value;
    }
  });


});

btnHistorialClinico.addEventListener("click", function() {
  // Muestra el div de historial clínico y oculta los otros
  divInformacionPersonal.style.display = "none";
  divHistorialClinico.style.display = "block";
  divExamenesFisicos.style.display = "none";
  divlabgeneral.style.display="none";
  const data = {
    paciente_modificar : paciente_modificar,
  };
  
  $.ajax({
    type:"POST",
    url: '../../php/info_paciente/traer_datos_historial.php',
    contentType: 'application/json',  // Especificar el tipo de contenido
    dataType: 'json',
    data:JSON.stringify(data),
    // dataType: 'json',
    success: function(resultados) {
     
      $('#add_antec_cancer').val(resultados[0].antecedentes_cancer);
      $('#add_tipo_cancer').val(resultados[0].tipo_cancer_he);
      $('#add_heredo ').val(resultados[0].enfermedad_cronica);
      $('#add_diabetes').prop('checked', resultados[0].diabetes == 1);
      $('#add_hipertension').prop('checked', resultados[0].hipertension == 1);
      $('#add_enf_renal').prop('checked', resultados[0].enf_renal == 1);
      $('#add_cardiopatias').prop('checked', resultados[0].cardiopatias == 1);
$('#add_otro').val(resultados[0].otra);
$('#add_cancer_madre').val(resultados[0].madre);
$('#add_cancer_hermana ').val(resultados[0].hermana);
$('#add_cancer_abuela').val(resultados[0].abuela);
$('#add_cancer_prima ').val(resultados[0].prima);
$('#add_antec_cancer_pat ').val(resultados[0].antecendentes_cancer_pp);
$('#add_tipo_cancer_pat').val(resultados[0].tipo_cancer_pp);
$('#add_enfer_cronica_pat').val(resultados[0].enfermedad_cronica_pp);
$('#add_diabetes_pat').prop('checked', resultados[0].diabetes_pp == 1);
$('#add_hipertension_pat').prop('checked', resultados[0].hipertension_pp == 1);
$('#add_enf_renal_pat').prop('checked', resultados[0].enf_renal_pp == 1);
$('#add_cardiopatias_pat').prop('checked', resultados[0].cardiopatias_pp == 1);
$('#add_obesidad_pat').prop('checked', resultados[0].obesidad == 1);

$('#add_otro_pat').val(resultados[0].otra_pp);

$('#add_embarazos').val(resultados[0].embarazos);
$('#add_partos').val(resultados[0].partos);
$('#add_abortos').val(resultados[0].abortos);
$('#add_cesáreas').val(resultados[0].cesareas);
$('#add_menarquia').val(resultados[0].menarquia);
$('#add_ivsa').val(resultados[0].ivsa);
$('#add_ultimo_pap').val(resultados[0].ultimo_pap);
$('#add_vph').val(resultados[0].vacunacion_VPH);
$('#add_ultimo_parto').val(resultados[0].ultimo_parto);
$('#add_pecho').val(resultados[0].dio_pecho);
$('#add_fecha_menstruacion').val(resultados[0].ultima_menstruacion);
$('#add_menopausia').val(resultados[0].menopausia);
$('#add_tabaquismo').val(resultados[0].tabaquismo);
$('#add_anticonceptivos').val(resultados[0].anticonseptivos);
$('#add_estrogenos').val(resultados[0].estrogenos);
$('#add_provera').val(resultados[0].provera);
$('#add_biopsia_previa').val(resultados[0].biopsia_previa);
$('#add_quistes').val(resultados[0].quistes);
$('#add_fifroadenoma').val(resultados[0].fibroadenoma);
$('#add_cancer_mama').val(resultados[0].cancer_mama);



// const fechaMenstruacion = document.getElementById("").value;
// const menopausia = document.getElementById("").value;
// const tabaquismo = document.getElementById("").value;
// const anticonceptivos = document.getElementById("").value;
// const estrogenos = document.getElementById("").value;
// const provera = document.getElementById("").value;
// const biopsiaPrevia = $("# :selected").text();
// const quistes = $("# :selected").text();
// const fifroadenoma = $("# :selected").text();
// const cancerMama = $("# :selected").text();
    }
  });


});

btnExamenesFisicos.addEventListener("click", function() {
  // Muestra el div de exámenes físicos y oculta los otros

  divInformacionPersonal.style.display = "none";
  divHistorialClinico.style.display = "none";
  divExamenesFisicos.style.display = "block";
  divlabgeneral.style.display="none";
  const data = {
    paciente_modificar : paciente_modificar,
  };
  
  $.ajax({
    type:"POST",
    url: '../../php/info_paciente/fechas_examenes.php',
    contentType: 'application/json',  // Especificar el tipo de contenido
    dataType: 'json',
    data:JSON.stringify(data),
    // dataType: 'json',
    success: function(resultados) {
      var select = $("#opciones");
    $.each(resultados, function (index, value) {
        select.append($("<option>").text(value).val(value));
    })
    }
  })


});
btnlabgeneral.addEventListener("click", function() {
  // Muestra el div de exámenes físicos y oculta los otros
  divInformacionPersonal.style.display = "none";
  divHistorialClinico.style.display = "none";
  divExamenesFisicos.style.display = "none";
  divlabgeneral.style.display="block";
});

$(document).ready(function() {
  // MOSTRAR DATOS EN LA TABLA PRINCIPAL
    $.ajax({
        url: '../../php/info_paciente/info_paciente.php',
        // dataType: 'json',
        success: function(datos) {
          // Agrega la tabla al cuerpo de la tabla en el HTML
          $('#table_pac').html(datos);
        }
      });
// TRAER DATOS DE LA TABLA
   


    });
// BOTON AMARILLO PARA MODIFICAR DATOS
    function modificar(boton) {
      divInformacionPersonal.style.display = "none";
      divHistorialClinico.style.display = "none";
      divExamenesFisicos.style.display = "none";
      // Obtiene la cédula asociada al botón clicado
      paciente_modificar= $(boton).data("cedula");
      $('#add_antec_cancer').val('');
$('#add_tipo_cancer').val('');
$('#add_heredo').val('');
$('#add_otro').val('');
$('#add_cancer_madre').val('');
$('#add_cancer_hermana').val('');
$('#add_cancer_abuela').val('');
$('#add_cancer_prima').val('');
$('#add_antec_cancer_pat').val('');
$('#add_tipo_cancer_pat').val('');
$('#add_enfer_cronica_pat').val('');
$('#add_otro_pat').val('');
$('#add_embarazos').val('');
$('#add_partos').val('');
$('#add_abortos').val('');
$('#add_cesáreas').val('');
$('#add_menarquia').val('');
$('#add_ivsa').val('');
$('#add_ultimo_pap').val('');
$('#add_vph').val('');
$('#add_ultimo_parto').val('');
$('#add_pecho').val('');
$('#add_fecha_menstruacion').val('');
$('#add_menopausia').val('');
$('#add_tabaquismo').val('');
$('#add_anticonceptivos').val('');
$('#add_estrogenos').val('');
$('#add_provera').val('');
$('#add_biopsia_previa').val('');
$('#add_quistes').val('');
$('#add_fifroadenoma').val('');
$('#add_cancer_mama').val('');

// Unchecking checkboxes
$('#add_diabetes').prop('checked', false);
$('#add_hipertension').prop('checked', false);
$('#add_enf_renal').prop('checked', false);
$('#add_cardiopatias').prop('checked', false);
$('#add_diabetes_pat').prop('checked', false);
$('#add_hipertension_pat').prop('checked', false);
$('#add_enf_renal_pat').prop('checked', false);
$('#add_cardiopatias_pat').prop('checked', false);
$('#add_obesidad_pat').prop('checked', false);
$("#opciones").empty();
  };
 


  // BOITON PARA ACTULIZAR DATOS
  actualizar_pacientes.addEventListener("click", function() {

    Swal.fire({
      icon: "warning",
      title: "¿Seguro quiere modificar los datos?",
    
      showCancelButton: true,
      confirmButtonText: "Si",
     
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
    var cedula = document.getElementById("cedula").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("ape").value;
    const seguro = $("#seguro option:selected").val();
    const sexo = $("#sexo option:selected").val();
    const estado_civil = $("#estado_civil option:selected").val();
    var telefono = document.getElementById("telefono").value;
    var edad = document.getElementById("ed").value;
    var fecha_nac = document.getElementById("fecha_nac").value;
    // const provincia = $("#provincias option:selected").val();
    // const distrito = $("#distritos option:selected").val();
    var ocupacion = document.getElementById("ocupacion").value;
    // var lugar_trabajo = document.getElementById("lugar_trabajo").value;
    const area_referencia = $("#area_referencia option:selected").val();
    var hospedaje = document.getElementById("hospedaje_direccion").value;
    const navegacion = $("#add_navegacion option:selected").val();
    var correo = document.getElementById("correo_electronico").value;
    var nombre_contacto = document.getElementById("nombre_contacto").value;
    var telefono_contacto = document.getElementById("telefono_contacto").value;
    const alergia = $("#alergia option:selected").val();
    var ahf = document.getElementById("add_ahf").value;
    var app = document.getElementById("add_app").value;
    var aqt = document.getElementById("add_aqt").value;
    var medicamentos_alergicos =
    document.getElementById("medicamentos_aler").value;

    var datos = {
      paciente_modificar:paciente_modificar,
      cedula: cedula,
      nombre:nombre,
  apellido:apellido,
  seguro:seguro,
  sexo:sexo,
  estado_civil:estado_civil,
  telefono:telefono,
  edad:edad,
  fecha_nac:fecha_nac,
  ocupacion:ocupacion,
  area_referencia:area_referencia,
  hospedaje :hospedaje ,
  navegacion:navegacion,
  correo:correo,
  nombre_contacto:nombre_contacto,
  telefono_contacto:telefono_contacto,
  alergia:alergia,
  ahf:ahf,
  app:app,
  aqt:aqt,
  medicamentos_alergicos:medicamentos_alergicos,
  // fecha_ingreso:fecha_ingreso

// revisar uno por uno

    };

    $.ajax({
      type: "POST",
      url: "../../php/info_paciente/modificar_paciente.php",
      data: JSON.stringify(datos),
      success: function(respuesta){
    
      
    if (respuesta == 0) {

      Swal.fire({
        position: "center",
        icon: "success",
        title: "Datos Modificados",
        showConfirmButton: false,
        timer: 1000
        
      });
   
        // MOSTRAR DATOS EN LA TABLA PRINCIPAL
          $.ajax({
              url: '../../php/info_paciente/info_paciente.php',
              // dataType: 'json',
              success: function(datos) {
                // Agrega la tabla al cuerpo de la tabla en el HTML
                $('#table_pac').html(datos);
              }
            });
      // TRAER DATOS DE LA TABLA
         
      
      
        
      
    }
    else{
     
    }

  }
})
      } 
    });


  });


  modificar_historial.addEventListener("click", function() {

    Swal.fire({
      icon: "warning",
      title: "¿Seguro quiere modificar los datos?",
    
      showCancelButton: true,
      confirmButtonText: "Si",
     
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
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
        const provera = document.getElementById("add_provera").value;
        const biopsiaPrevia = $("#add_biopsia_previa :selected").val();
        const quistes = $("#add_quistes :selected").val();
        const fifroadenoma = $("#add_fifroadenoma :selected").val();
        const cancerMama = $("#add_cancer_mama :selected").val();
        
        // Objeto 'datos' construido con las variables
        const datos = {
          paciente_modificar:paciente_modificar,
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
          provera:provera,
          biopsiaprevia:biopsiaPrevia ,
          quistes:quistes,
          fifroadenoma:fifroadenoma,
          cancermama:cancerMama,
        };

$.ajax({
  type: "POST",
  url: "../../php/info_paciente/modificar_historial.php",
  data: JSON.stringify(datos),
  success: function(respuesta){
console.log(respuesta);
    if (respuesta == 0) {

      Swal.fire({
        position: "center",
        icon: "success",
        title: "Datos Modificados",
        showConfirmButton: false,
        timer: 1000
        
      });
   
        // MOSTRAR DATOS EN LA TABLA PRINCIPAL
  
      // TRAER DATOS DE LA TABLA
         
      
      
        
      
    }
    else{
     
    }

  }
})
      } 
 


  }); 
});

$("#opciones").on("change", function() {
  // Obtener el valor seleccionado
  var fecha = $(this).val();

  const data = {
    paciente_modificar:paciente_modificar,
    fecha:fecha,
  };

  $.ajax({
    type:"POST",
    url: '../../php/info_paciente/traer_datos_examenes.php',
    contentType: 'application/json',  // Especificar el tipo de contenido
    dataType: 'json',
    data:JSON.stringify(data),
    // dataType: 'json',
    success: function(resultados) {

      $('#add_motivo').val(resultados.motivo);
      $('#referir_a').val(resultados.referir);
      $('#add_tamaño_mama_izquierdo').val(resultados.tamaño_mama_izq);
      $('#add_tamaño_mama_derecho').val(resultados.tamaño_mama_dere);
      $('#add_consistencia_izquierdo').val(resultados.consistencia_izq);
      $('#add_consistencia_derecho').val(resultados.consistencia_dere);
      $('#add_pezon_izquierdo').val(resultados.pezon_izq);
      $('#add_pezon_derecho').val(resultados.pezon_dere);
      $('#add_piel_izquierdo').val(resultados.piel_izq);
      $('#add_piel_derecho').val(resultados.piel_dere);
      $('#add_axila_izquierdo').val(resultados.axila_izq);
      $('#add_axila_derecho').val(resultados.axila_derecha);
      $('#add_protesis_izquierdo').val(resultados.protesis_izq);
      $('#add_protesis_derecho').val(resultados.protesis_dere);
      $('#add_cuadrante').val(resultados.cuadrante);
      $('#add_radio').val(resultados.radio);
      $('#add_add_consitencia_nodulo').val(resultados.consistencia);
      $('#add_cicatriz_nodulo').val(resultados.cicatriz);
      $('#contiene_nodulo').val(resultados.noduloscol);
      // // falta imagen
      $('#add_tamaño').val(resultados.tamano);
      $('#ultrasonido_gabinete').val(resultados.ultrasonidos);
      $('#add_fecha_u').val(resultados.fecha_ultra);
      $('#add_freporte_u').val(resultados.reporte_ultra);
      $('#mamografia_gabinete').val(resultados.mamografia);
      $('#add_fecha_m').val(resultados.fecha_mamografia);
      $('#add_freporte_m').val(resultados.reporte_mamografia);
      $('#biopsia_gabinete').val(resultados.biopsia);
      $('#add_fecha_b').val(resultados.fecha_biopsia);
      $('#add_reporte_b').val(resultados.reporte_biopsia);
      $('#mamas_normales').val(resultados.mamas_normales);
      $('#add_absceso').val(resultados.abceso);
      $('#add_inflamatorio').val(resultados.inflamatorio);
      $('#add_nodulo_benigno').val(resultados.nodulo_benigno);
      $('#add_nodulo_sospechoso').val(resultados.nodulo_sospechoso);
      // $('#add_diabetes_pat').prop('checked', resultados[0].diabetes_pp == 1);
      $('#quera_seba').prop('checked',resultados.queretosis_seborreica== 1);
      $('#quera_act').prop('checked',resultados.queratosis_actinica== 1);
      $('#carci_baso').prop('checked',resultados.carcinoma_basocelular== 1);
      $('#carci_esca').prop('checked',resultados.celulas_escamosas== 1);
      $('#lunar_disp').prop('checked',resultados.lunar_diplastico== 1);
      $('#lunar_conge').prop('checked',resultados.lunar_congenito== 1);
      $('#Pterigion').prop('checked',resultados.pterigion== 1);
      $('#melanoma').prop('checked',resultados.melanoma== 1);
      $('#recomendacion').val(resultados.comentario);
      

$examen_lab=$datos['examen_lab']; //todavia no

// $data = $datos['data'];

// $add_neu=$datos['add_neu'];
// $add_lin=$datos['add_lin'];
// $add_mono=$datos['add_mono'];
// $add_eosi=$datos['add_eosi'];
// $add_baso=$datos['add_baso'];
// $add_hemo=$datos['add_hemo'];
// $add_glob=$datos['add_glob'];
// $add_glu=$datos['add_glu'];
// $add_cre=$datos['add_cre'];
// $add_nitro=$datos['add_nitro'];
// $add_urico=$datos['add_urico'];
// $add_sodio=$datos['add_sodio'];
// $add_potasio=$datos['add_potasio'];
// $add_coles=$datos['add_coles'];
// $add_ph=$datos['add_ph'];
// $add_prote=$datos['add_prote'];
// $add_glucosa=$datos['add_glucosa'];
// $add_leuco=$datos['add_leuco'];
// $add_oculta=$datos['add_oculta'];
// $add_creat=$datos['add_creat'];
// $add_vih=$datos['add_vih'];

    }
}); 
}); 

