var img_vulva=" ";
var img_trompa =" ";
var img_senos =" ";
var img_cito = " ";
var img_cito_gine =" "; 

var diagrama_cito_gine =" ";
var diagrama_cito=" " ;
var vulva=" " ;
var vagina=" " ;
var cuerpo=" " ;
var anexo =" ";
var resultado_frotis=" " ;
var resultado_pap=" " ;
var resultado_ivaa =" ";
var resultado_shiller =" ";
var resultado_biopsia=" ";
var resultado_colposcopia=" ";
var diagnostico_cito ="";


// FUNCIONES PARA PODER DIBUJAR DENTRO DE LAS IMAGENES
$(document).ready(function () {
  var img_citologia_gine= $('#img_citologia_gine');
  var _stage_gine = new Konva.Stage({
    container: 'img_citologia_gine',
    width: 380,
    height: 300
  });

  var _layer_gine = new Konva.Layer();
  _stage_gine.add(_layer_gine);

  var _isDrawing_gine = false;
  var _lastLine_gine;
  var _currentColor_gine = '#000000'; // Color inicial

  _stage_gine.on('mousedown touchstart', function (e) {
    _isDrawing_gine = true;
    var _pos_gine = _stage_gine.getPointerPosition();
    _lastLine_gine = new Konva.Line({
      stroke: _currentColor_gine,
      strokeWidth: 3,
      points: [_pos_gine.x, _pos_gine.y]
    });
    _layer_gine.add(_lastLine_gine);
  });

  _stage_gine.on('mousemove touchmove', function () {
    if (!_isDrawing_gine) {
      return;
    }
    var pos = _stage_gine.getPointerPosition();
    var newPoints = _lastLine_gine.points().concat([pos.x, pos.y]);
    _lastLine_gine.points(newPoints);
    _layer_gine.batchDraw();
  });

  _stage_gine.on('mouseup touchend', function () {
    _isDrawing_gine = false;
    _layer_gine.draw();
    _saveCanvas_gine()
  });

  $('#undoBtn_cito').on('click', function () {
    _undo_gine();
  });

  $('#clearBtn_cito').on('click', function () {
    _clearCanvas_gine();
  });
  $('#saveBtn_cito').on('click', function () {
    _saveCanvas_gine();
  });

  function _undo_gine() {
    var children = _layer_gine.children;
    if (children.length > 1) {
      children[children.length - 1].destroy();
      _layer_gine.draw();
    } else {
      _addImage_gine();
    }
  }

  function _clearCanvas_gine() {
    var children = _layer_gine.children.toArray();
    for (var i = 0; i < children.length; i++) {
      if (children[i] instanceof Konva.Line) {
        children[i].destroy();
      }
    }
    _layer_gine.draw();
    _addImage_gine();
  }

  function _addImage_gine() {
    var img = new Image();
    img.onload = function () {
      var _konvaImage_gine = new Konva.Image({
        image: img,
        width: 360, // Ajusta el ancho según sea necesario
        height: 300, // Ajusta la altura según sea necesario
       // Posición y en el lienzo
      });
      _layer_gine.add(_konvaImage_gine);
      _layer_gine.draw();
    };
    img.src = '../image/colposcopia.png';
    // Reemplaza la ruta con la de tu imagen
  }

  
  function _saveCanvas_gine() {
    html2canvas(img_citologia_gine[0]).then(function (canvas) {
      var imageData_gine = canvas.toDataURL("image/png");
      // Aquí puedes enviar la cadena base64 a tu servidor o almacenarla en tu base de datos
      img_cito_gine=imageData_gine;
    });
  }
  $('#colorPicker_cito').on('input', function (event) {
    _currentColor_gine = event.target.value;
    if (_lastLine_gine) {
      _lastLine_gine.stroke(_currentColor_gine);
      _layer_gine.draw();
    }
  });

  _addImage_gine();
});
// DIBUJO DENTRO DE CITOLOGIA
$(document).ready(function () {
  var img_citologia = $('#img_citologia');
  var _stage = new Konva.Stage({
    container: 'img_citologia',
    width: 380,
    height: 300
  });

  var _layer = new Konva.Layer();
  _stage.add(_layer);

  var _isDrawing = false;
  var _lastLine;
  var _currentColor = '#000000'; // Color inicial

  _stage.on('mousedown touchstart', function (e) {
    _isDrawing = true;
    var _pos = _stage.getPointerPosition();
    _lastLine = new Konva.Line({
      stroke: _currentColor,
      strokeWidth: 3,
      points: [_pos.x, _pos.y]
    });
    _layer.add(_lastLine);
  });

  _stage.on('mousemove touchmove', function () {
    if (!_isDrawing) {
      return;
    }
    var pos = _stage.getPointerPosition();
    var newPoints = _lastLine.points().concat([pos.x, pos.y]);
    _lastLine.points(newPoints);
    _layer.batchDraw();
  });

  _stage.on('mouseup touchend', function () {
    _isDrawing = false;
    _layer.draw();
    _saveCanvas_()
  });

  $('#undoBtn_cito').on('click', function () {
    _undo();
  });

  $('#clearBtn_cito').on('click', function () {
    _clearCanvas();
  });
  $('#saveBtn_cito').on('click', function () {
    _saveCanvas_();
  });

  function _undo() {
    var children = _layer.children;
    if (children.length > 1) {
      children[children.length - 1].destroy();
      _layer.draw();
    } else {
      _addImage();
    }
  }

  function _clearCanvas() {
    var children = _layer.children.toArray();
    for (var i = 0; i < children.length; i++) {
      if (children[i] instanceof Konva.Line) {
        children[i].destroy();
      }
    }
    _layer.draw();
    _addImage();
  }

  function _addImage() {
    var img = new Image();
    img.onload = function () {
      var _konvaImage = new Konva.Image({
        image: img,
        width: 360, // Ajusta el ancho según sea necesario
        height: 300, // Ajusta la altura según sea necesario
       // Posición y en el lienzo
      });
      _layer.add(_konvaImage);
      _layer.draw();
    };
    img.src = '../image/colposcopia.png';
    // Reemplaza la ruta con la de tu imagen
  }

  
  function _saveCanvas_() {
    html2canvas(img_citologia[0]).then(function (canvas) {
      var imageData_ = canvas.toDataURL("image/png");
      // Aquí puedes enviar la cadena base64 a tu servidor o almacenarla en tu base de datos
      img_cito=imageData_;
    });
  }
  $('#colorPicker_cito').on('input', function (event) {
    _currentColor = event.target.value;
    if (_lastLine) {
      _lastLine.stroke(_currentColor);
      _layer.draw();
    }
  });

  _addImage();
});





  // PARA LA IMAGEN DE LA VULVA

$(document).ready(function () {
  var vulv = $('#vulva');
  var stage = new Konva.Stage({
    container: 'vulva',
    width: 380,
    height: 300
  });

  var layer = new Konva.Layer();
  stage.add(layer);

  var isDrawing = false;
  var lastLine;
  var currentColor = '#000000'; // Color inicial

  stage.on('mousedown touchstart', function (e) {
    isDrawing = true;
    var pos = stage.getPointerPosition();
    lastLine = new Konva.Line({
      stroke: currentColor,
      strokeWidth: 3,
      points: [pos.x, pos.y]
    });
    layer.add(lastLine);
  });

  stage.on('mousemove touchmove', function () {
    if (!isDrawing) {
      return;
    }
    var pos = stage.getPointerPosition();
    var newPoints = lastLine.points().concat([pos.x, pos.y]);
    lastLine.points(newPoints);
    layer.batchDraw();
  });

  stage.on('mouseup touchend', function () {
    isDrawing = false;
    layer.draw();
    saveCanvas_();
  });

  $('#undoBtn').on('click', function () {
    undo();
  });

  $('#clearBtn').on('click', function () {
    clearCanvas();
  });
  $('#saveBtn').on('click', function () {
    saveCanvas_();
  });

  function undo() {
    var children = layer.children;
    if (children.length > 1) {
      children[children.length - 1].destroy();
      layer.draw();
    } else {
      addImage();
    }
  }

  function clearCanvas() {
    var children = layer.children.toArray();
    for (var i = 0; i < children.length; i++) {
      if (children[i] instanceof Konva.Line) {
        children[i].destroy();
      }
    }
    layer.draw();
    addImage();
  }

  function addImage() {
    var img = new Image();
    img.onload = function () {
      var konvaImage = new Konva.Image({
        image: img,
        width: 360, // Ajusta el ancho según sea necesario
        height: 300, // Ajusta la altura según sea necesario
       // Posición y en el lienzo
      });
      layer.add(konvaImage);
      layer.draw();
    };
    img.src = '../image/otros/VULVA.png';
    // Reemplaza la ruta con la de tu imagen
  }

  
  function saveCanvas_() {
    html2canvas(vulv[0]).then(function (canvas) {
      var _image_Data_ = canvas.toDataURL("image/png");
      // Aquí puedes enviar la cadena base64 a tu servidor o almacenarla en tu base de datos
      img_vulva=_image_Data_;
    });
  }
  $('#colorPicker').on('input', function (event) {
    currentColor = event.target.value;
    if (lastLine) {
      lastLine.stroke(currentColor);
      layer.draw();
    }
  });

  addImage();
});




// para la imagen de la trompa de falopio

$(document).ready(function () {

  var trompa = $('#trompa');
  
  var stage_ = new Konva.Stage({
    container: 'trompa',
    width: 450,
    height: 400
  });

  var layer_ = new Konva.Layer();
  stage_.add(layer_);

  var isDrawing_ = false;
  var lastLine_;
  var currentColor_ = '#000000'; // Color inicial

  stage_.on('mousedown touchstart', function (e) {
    isDrawing_ = true;
    var pos = stage_.getPointerPosition();
    lastLine_ = new Konva.Line({
      stroke: currentColor_,
      strokeWidth: 3,
      points: [pos.x, pos.y]
    });
    layer_.add(lastLine_);
  });

  stage_.on('mousemove touchmove', function () {
    if (!isDrawing_) {
      return;
    }
    var pos_ = stage_.getPointerPosition();
    var newPoints = lastLine_.points().concat([pos_.x, pos_.y]);
    lastLine_.points(newPoints);
    layer_.batchDraw();
  });

  stage_.on('mouseup touchend', function () {
    isDrawing_ = false;
    layer_.draw();
    saveCanvas() 
  });

  $('#undoBtn_trompa').on('click', function () {
    undo_();
  });

  $('#clearBtn_trompa').on('click', function () {
    clearCanvas_();
  });
  $('#saveBtn').on('click', function () {
    saveCanvas();
  });


  function undo_() {
    var children = layer_.children;
    if (children.length > 1) {
      children[children.length - 1].destroy();
      layer_.draw();
    } else {
      addImage_();
    }
  }

  function clearCanvas_() {
    var children_ = layer_.children.toArray();
    for (var i = 0; i < children_.length; i++) {
      if (children_[i] instanceof Konva.Line) {
        children_[i].destroy();
      }
    }
    layer_.draw();
    addImage_();
    img_trompa=" "
  }

  function addImage_() {
    var img_ = new Image();
    img_.onload = function () {
      var konvaImage = new Konva.Image({
        image: img_,
        width: 450,
        height: 400, // Ajusta la altura según sea necesario
      });
      layer_.add(konvaImage);
      layer_.draw();
    };
    img_.src = '../image/otros/trompa.png'; // Reemplaza la ruta con la de tu imagen
  }
  function saveCanvas() {
    html2canvas(trompa[0]).then(function (canvas) {
      var imageData = canvas.toDataURL("image/png");
      // Aquí puedes enviar la cadena base64 a tu servidor o almacenarla en tu base de datos
      img_trompa=imageData;
    });
  }
  $('#colorPicker_').on('input', function (event) {
    currentColor_ = event.target.value;
    if (lastLine_) {
      lastLine_.stroke(currentColor_);
      layer_.draw();
    }
  });

  addImage_();
});

// para la imagen de la teta

$(document).ready(function () {

  var tetas = $('#tetas');
  
  var stage_tetas= new Konva.Stage({
    container: 'tetas',
    width: 400,
    height: 350
  });

  var layer_tetas = new Konva.Layer();
  stage_tetas.add(layer_tetas);

  var isDrawing_tetas= false;
  var lastLine_tetas;
  var currentColor_tetas = '#000000'; // Color inicial

  stage_tetas.on('mousedown touchstart', function (e) {
    isDrawing_tetas = true;
    var pos = stage_tetas.getPointerPosition();
    lastLine_tetas = new Konva.Line({
      stroke: currentColor_tetas,
      strokeWidth: 3,
      points: [pos.x, pos.y]
    });
    layer_tetas.add(lastLine_tetas);

  });

  stage_tetas.on('mousemove touchmove', function () {
    if (!isDrawing_tetas) {
      return;
    }
    var pos_tetas = stage_tetas.getPointerPosition();
    var newPoints = lastLine_tetas.points().concat([pos_tetas.x, pos_tetas.y]);
    lastLine_tetas.points(newPoints);
    layer_tetas.batchDraw();
  });

  stage_tetas.on('mouseup touchend', function () {
    isDrawing_tetas = false;
    layer_tetas.draw();
    saveCanvas_senos() 
   
  });

  $('#undoBtn_tetas').on('click', function () {
    undo_tetas();
  });

  $('#clearBtn_tetas').on('click', function () {
    clearCanvas_tetas();
    img_senos =" "; 
  });
  // $('#saveBtn').on('click', function () {
  //   saveCanvas();
  // });

  function undo_tetas() {
    var children = layer_tetas.children;
    if (children.length > 1) {
      children[children.length - 1].destroy();
      layer_tetas.draw();
    } else {
      addImage_tetas();
    }
  }

  function clearCanvas_tetas() {
    var children_tetas = layer_tetas.children.toArray();
    for (var i = 0; i < children_tetas.length; i++) {
      if (children_tetas[i] instanceof Konva.Line) {
        children_tetas[i].destroy();
      }
    }
    layer_tetas.draw();
    addImage_tetas();
  }

  function addImage_tetas() {
    var img_tetas = new Image();
    img_tetas.onload = function () {
      var konvaImage = new Konva.Image({
        image: img_tetas,
        width: 400,
        height: 350, // Ajusta la altura según sea necesario
      });
      layer_tetas.add(konvaImage);
      layer_tetas.draw();
    };
    img_tetas.src = '../image/mamas/mamas.png'; // Reemplaza la ruta con la de tu imagen
  }
  function saveCanvas_senos() {
    html2canvas(tetas[0]).then(function (canvas) {
      var imageData = canvas.toDataURL("image/png");
      // Aquí puedes enviar la cadena base64 a tu servidor o almacenarla en tu base de datos
      img_senos=imageData;
    });
  }
  $('#colorPicker_tetas').on('input', function (event) {
    currentColor_tetas = event.target.value;
    if (lastLine_tetas) {
      lastLine_tetas.stroke(currentColor_tetas);
      layer_tetas.draw();
    }
  });

  addImage_tetas();
});



    // LABORATORIO
    let add_neu = " ";
    let add_lin = " ";
    let add_mono = " ";
    let add_eosi = " ";
    let add_baso = " ";
    let add_hemo = " ";
    let add_glob = " ";
    let add_glu = " ";
    let add_cre = " ";
    let add_nitro = " ";
    let add_urico = " ";
    let add_sodio = " ";
    let add_potasio = " ";
    let add_coles = " ";
    let add_ph = " ";
    let add_prote = " ";
    let add_glucosa = " ";
    let add_leuco = " ";
    let add_oculta=" ";
    let add_creat = " ";
    let add_vih = " ";
    
    // FUNCION PARA GUARDAR LOS CAMBIOS DE LABORATORIO 

    $("#guardar_cambios").click(function () {
       add_neu = document.getElementById("add_neu").value;
      add_lin = document.getElementById("add_lin").value;
      add_mono = document.getElementById("add_mono").value;
       add_eosi = document.getElementById("add_eosi").value;
       add_baso = document.getElementById("add_baso").value;
       add_hemo = document.getElementById("add_hemo").value;
       add_glob = document.getElementById("add_glob").value;
       add_glu = document.getElementById("add_glu").value;
       add_cre = document.getElementById("add_cre").value;
       add_nitro = document.getElementById("add_nitro").value;
       add_urico = document.getElementById("add_urico").value;
      add_sodio = document.getElementById("add_sodio").value;
       add_potasio = document.getElementById("add_potasio").value;
       add_coles = document.getElementById("add_coles").value;
      add_ph = document.getElementById("add_ph").value;
       add_prote = document.getElementById("add_prote").value;
       add_glucosa = document.getElementById("add_glucosa").value;
      add_leuco = document.getElementById("add_leuco").value;
      add_oculta= document.getElementById("add_oculta").value;
      add_creat = document.getElementById("add_creat").value;
      add_vih = $("#add_vih :selected").text();
     
    })
  
//FUNCION PARA GUARAR
$("#saveBtn_gine").click(function () {
  vulva = document.getElementById("vulva_gine").value;
  vagina = document.getElementById("vagina").value;
  cuerpo = document.getElementById("cuerpo_gine").value;
  anexo = document.getElementById("anexo_gine").value;
  var frotis = document.getElementsByName('frotis_option');
  var pap = document.getElementsByName('pap_option');
  var ivaa = document.getElementsByName('ivaa_option');
  var shiller = document.getElementsByName('shiller_option');
  var biopsia = document.getElementsByName('biopsia_option');
diagnostico_cito = document.getElementById('diagnostico_cito_gine').value;
  var colpo = document.getElementsByName('colposcopia_option');
  console.log(diagnostico_cito);
  frotis.forEach(function(radioButton) {
    if (radioButton.checked) {
      // Obtener el valor del radio button seleccionado
      resultado_frotis= radioButton.value;
    }
  });
  pap.forEach(function(radioButton) {
    if (radioButton.checked) {
      // Obtener el valor del radio button seleccionado
      resultado_pap= radioButton.value;
    }
  });
  ivaa.forEach(function(radioButton) {
    if (radioButton.checked) {
      // Obtener el valor del radio button seleccionado
      resultado_ivaa= radioButton.value;
    }
  });
  shiller.forEach(function(radioButton) {
    if (radioButton.checked) {
      // Obtener el valor del radio button seleccionado
      resultado_shiller= radioButton.value;
    }
  });
  biopsia.forEach(function(radioButton) {
    if (radioButton.checked) {
      // Obtener el valor del radio button seleccionado
      resultado_biopsia= radioButton.value;
    }
  });

    colpo.forEach(function(radioButton) {
      if (radioButton.checked) {
        // Obtener el valor del radio button seleccionado
        resultado_colposcopia = radioButton.value;
      }
    });
    $('#examen_gine').modal('hide');

    
})

//FUNCION PARA BUSCAR INFORMACION DEL PACIENTE 

$("#bsc_paciente").click(function () {
    const cedula = document.getElementById("cedula").value;
    if(cedula.length==0){
alert("ingrese la cédula, campo vacio")
    }
    else{
      const dato= {cedula:cedula};
      $.ajax({
        type:"POST",
        url:"../php/examenes/bsc_paciente.php",
        data:JSON.stringify(dato),
        success: function(resp){
          $('#tabla-datos tbody').html(resp);
        }
      })
    }
  })


  $("#send_date").click(function () {


    const cedula = document.getElementById("cedula").value;
    const add_peso = document.getElementById("add_peso").value;
    const add_talla = document.getElementById("add_talla").value;
    const add_pa  = document.getElementById("add_pa").value;
    const add_cintura = document.getElementById("add_cintura").value;
    // const add_motivo = document.getElementById("add_motivo").value;

    const add_tamaño_mama_derecho = $("#add_tamaño_mama_derecho :selected").val();
    const add_tamaño_mama_izquierdo = $("#add_tamaño_mama_izquierdo :selected").val();
    const add_consistencia_derecho = $("#add_consistencia_derecho :selected").val();
    const add_consistencia_izquierdo = $("#add_consistencia_izquierdo :selected").val();
    const add_pezon_derecho = $("#add_pezon_derecho  :selected").val();
    // ARREGLAR ID DE PIEL
    const add_pezon_izquierdo = $("#add_pezon_izquierdo :selected").val();
    const add_piel_derecho = $("#add_piel_derecho :selected").val();
    const add_piel_izquierdo = $("#add_piel_izquierdo :selected").val();
    const add_axila_derecho = $("#add_axila_derecho :selected").val();
    const add_axila_izquierdo = $("#add_axila_izquierdo :selected").val();
    const add_protesis_derecho = $("#add_protesis_derecho :selected").val();
    const add_protesis_izquierdo = $("#add_protesis_izquierdo :selected").val();

    const contiene_nodulo = $("#contiene_nodulo :selected").val();
    const add_cuadrante = document.getElementById("add_cuadrante").value;
    const add_radio = document.getElementById("add_radio").value;
    const add_tamaño = document.getElementById("add_tamaño").value;

    // ARREGLAR VALORES DE NODULO CONSITENCIA CICATRIZ 
    const add_consitencia_nodulo = $("#add_consistencia_nodulo :selected").val();
    const add_cicatriz_nodulo= $("#add_cicatriz_nodulo :selected").val();
    // *******************************************
  //  FALTA EL DIAGRAMA
// ***********************************************

const examen_lab = document.getElementById("cedula").value;
// FALTAN CADA UNO DE LOS LAB 

// ****************************************************
// ******************** GABINETE **********************************
// ***************************************************************
const ultrasonido_gabinete= $("#ultrasonido_gabinete :selected").val();
const add_fecha_u = document.getElementById("add_fecha_u").value;
const add_freporte_u = document.getElementById("add_reporte_u").value;
const mamografia_gabinete = $("#mamografia_gabinete :selected").val();
const add_fecha_m = document.getElementById("add_fecha_m").value;
const add_freporte_m = document.getElementById("add_reporte_m").value;
const biopsia_gabinete = $("#biopsia_gabinete :selected").val();
const add_fecha_b = document.getElementById("add_fecha_b").value;
const add_reporte_b = document.getElementById("add_reporte_b").value;

// ************************************************************************
// ******* DIAGNOSTICO CLINICO*********************************************
// ***********************************************************************
const mamas_normales = document.getElementById("mamas_normales").value;
const add_absceso = document.getElementById("add_absceso").value;
const add_inflamatorio = document.getElementById("add_inflamatorio").value;
const add_nodulo_benigno = document.getElementById("add_nodulo_benigno").value;
const add_nodulo_sospechoso = document.getElementById("add_nodulo_sospechoso").value;
 

    // **********************************************************
    // **** IMPRESION DIAGNOSTICA **************************
    // ******************************************************
    const quera_seba = document.getElementsByName("quera_seba")[0].checked ? 1 : 0;
    const quera_act = document.getElementsByName("quera_act")[0].checked ? 1 : 0;
    const carci_baso  = document.getElementsByName("carci_baso")[0].checked ? 1 : 0;
    const carci_esca = document.getElementsByName("carci_esca")[0].checked ? 1 : 0;
    const lunar_disp = document.getElementsByName("lunar_disp")[0].checked ? 1 : 0;
    const lunar_conge = document.getElementsByName("lunar_conge")[0].checked ? 1 : 0;
    const Pterigion = document.getElementsByName("pteri")[0].checked ? 1 : 0;
    const melanoma = document.getElementsByName("melanoma")[0].checked ? 1 : 0;

    const recomendacion = document.getElementById("recomendacion").value;
    const referir_a = document.getElementById("referir_a").value;

  // **********************************************************
    // **** IMPRESION DIAGNOSTICA CANCER DE MAMA **************************
    // ******************************************************
    const add_ductal_insito = document.getElementsByName("add_ductal_insito")[0].checked ? 1 : 0;
    const add_ductal_invasivo = document.getElementsByName("add_ductal_invasivo")[0].checked ? 1 : 0;    
    const add_mama_medular = document.getElementsByName("add_mama_medular")[0].checked ? 1 : 0;    
    const add_mama_coloide = document.getElementsByName("add_mama_coloide")[0].checked ? 1 : 0;  
    const add_mama_tubular = document.getElementsByName("add_mama_tubular")[0].checked ? 1 : 0;  
  const add_mama_papilar = document.getElementsByName("add_mama_papilar")[0].checked ? 1 : 0;    
  const add_labulillar_insito = document.getElementsByName("add_labulillar_insito")[0].checked ? 1 : 0;   
    const add_lobulillar_invasivo = document.getElementsByName("add_lobulillar_invasivo")[0].checked ? 1 : 0;   
  const add_mama_inflamatorio = document.getElementsByName("add_mama_inflamatorio")[0].checked ? 1 : 0;    
  const add_cancer_recurrente = document.getElementsByName("add_cancer_recurrente")[0].checked ? 1 : 0;    
  const add_piaget = document.getElementsByName("add_piaget")[0].checked ? 1 : 0;
    const add_mama_masculino = document.getElementsByName("add_mama_masculino")[0].checked ? 1 : 0;
    const add_metastasico = document.getElementsByName("add_metastasico")[0].checked ? 1 : 0;
    const  add_diag_gin = document.getElementById("add_diag_gin").value;
    const add_otros_pap = document.getElementById("add_otros_pap").value;

    const add_pulso  = document.getElementById("add_pulso").value;
    const add_frecuencia = document.getElementById("add_frecuencia").value;


    const datos = {
      cedula: cedula,
      add_peso: add_peso,
      add_talla: add_talla,
      add_pa: add_pa,
      add_cintura: add_cintura,
      // add_motivo: add_motivo,
      add_tamaño_mama_derecho: add_tamaño_mama_derecho,
      add_tamaño_mama_izquierdo: add_tamaño_mama_izquierdo,
      add_consistencia_derecho: add_consistencia_derecho,
      add_consistencia_izquierdo: add_consistencia_izquierdo,
      add_pezon_derecho: add_pezon_derecho,
      add_pezon_izquierdo: add_pezon_izquierdo,
      add_piel_derecho: add_piel_derecho,
      add_piel_izquierdo: add_piel_izquierdo,
      add_axila_derecho: add_axila_derecho,
      add_axila_izquierdo: add_axila_izquierdo,
      add_protesis_derecho: add_protesis_derecho,
      add_protesis_izquierdo: add_protesis_izquierdo,
      contiene_nodulo: contiene_nodulo,
      add_cuadrante: add_cuadrante,
      add_radio: add_radio,
      add_tamaño: add_tamaño,
      add_consitencia_nodulo:add_consitencia_nodulo,
      add_cicatriz_nodulo: add_cicatriz_nodulo,
      examen_lab: examen_lab,
      ultrasonido_gabinete: ultrasonido_gabinete,
      add_fecha_u: add_fecha_u,
      add_freporte_u: add_freporte_u,
      mamografia_gabinete: mamografia_gabinete,
      add_fecha_m: add_fecha_m,
      add_freporte_m: add_freporte_m,
      biopsia_gabinete: biopsia_gabinete,
      add_fecha_b: add_fecha_b,
      add_reporte_b: add_reporte_b,
      mamas_normales: mamas_normales,
      add_absceso: add_absceso,
      add_inflamatorio: add_inflamatorio,
      add_nodulo_benigno: add_nodulo_benigno,
      add_nodulo_sospechoso: add_nodulo_sospechoso,
      quera_seba: quera_seba,
      quera_act: quera_act,
      carci_baso: carci_baso,
      carci_esca: carci_esca,
      lunar_disp: lunar_disp,
      lunar_conge: lunar_conge,
      Pterigion: Pterigion,
      melanoma: melanoma,
      recomendacion: recomendacion,
      referir_a: referir_a,
      img_senos:img_senos,
 
      add_neu:add_neu,
      add_lin:add_lin, 
add_mono:add_mono, 
add_eosi:add_eosi,
add_baso:add_baso, 
add_hemo:add_hemo,
add_glob:add_glob,
add_glu:add_glu,
add_cre:add_cre,
add_nitro:add_nitro,
add_urico:add_urico,
add_sodio:add_sodio,
add_potasio:add_potasio,
add_coles:add_coles,
add_ph:add_ph,
add_prote:add_prote,
add_glucosa:add_glucosa,
add_leuco:add_leuco,
add_oculta:add_oculta,
add_creat:add_creat,
add_vih:add_vih,
add_ductal_insito:add_ductal_insito,
add_ductal_invasivo:add_ductal_invasivo,
add_mama_medular:add_mama_medular,
add_mama_coloide:add_mama_coloide,
add_mama_tubular:add_mama_tubular,
add_mama_papilar:add_mama_papilar,
add_labulillar_insito:add_labulillar_insito,
add_lobulillar_invasivo:add_lobulillar_invasivo,
add_mama_inflamatorio:add_mama_inflamatorio,
add_cancer_recurrente:add_cancer_recurrente , 
add_piaget:add_piaget,
add_mama_masculino:add_mama_masculino,
add_metastasico:add_metastasico,
add_diag_gin:add_diag_gin,
add_otros_pap:add_otros_pap,
add_pulso:add_pulso,
add_frecuencia:add_frecuencia,

vulva:vulva,
vagina:vagina,
cuerpo:cuerpo,
 anexo: anexo,
resultado_frotis:resultado_frotis,
resultado_pap:resultado_pap,
resultado_ivaa:resultado_ivaa,
resultado_shiller:resultado_shiller,
resultado_biopsia:resultado_biopsia,
resultado_colposcopia:resultado_colposcopia,
img_vulva:img_vulva,
img_trompa:img_trompa,
img_cito_gine:img_cito_gine,
diagnostico_cito:diagnostico_cito

    };
    
     
$.ajax({
  type:"POST",
  url:"../php/examenes/examenes.php",
  data:JSON.stringify(datos),
  success: function(resp){
    
    if (resp!=1) {
   console.log(resp);
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
        icon: 'error',
        title: resp
      })
    } else {
      // Borra cualquier mensaje de error anterior si la solicitud fue exitosa
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
    }


   
    }
  })
});
var miPath = document.getElementById("path_mama");
var diagnosticoPath = document.getElementById("diag");
var pathOriginal = "M12 2.25c-5.376 0-9.75 4.374-9.75 9.75s4.374 9.75 9.75 9.75 9.75-4.374 9.75-9.75S17.376 2.25 12 2.25Zm4.5 10.5h-3.75v3.75h-1.5v-3.75H7.5v-1.5h3.75V7.5h1.5v3.75h3.75v1.5Z";
var pathAlterno = "M12 2.25c-5.376 0-9.75 4.374-9.75 9.75s4.374 9.75 9.75 9.75 9.75-4.374 9.75-9.75S17.376 2.25 12 2.25Zm4.5 10.5h-3.75v3.75h.5v-3.75H7.5v-1.5h3.75V7.5v3.75h3.75v1.5Z";
var isPathOriginal = true;
const infoElement = document.getElementById('opciones_cancer_mama');
var pathOriginal_ = "M12 2.25c-5.376 0-9.75 4.374-9.75 9.75s4.374 9.75 9.75 9.75 9.75-4.374 9.75-9.75S17.376 2.25 12 2.25Zm4.5 10.5h-3.75v3.75h-1.5v-3.75H7.5v-1.5h3.75V7.5h1.5v3.75h3.75v1.5Z";
var pathAlterno_ = "M12 2.25c-5.376 0-9.75 4.374-9.75 9.75s4.374 9.75 9.75 9.75 9.75-4.374 9.75-9.75S17.376 2.25 12 2.25Zm4.5 10.5h-3.75v3.75h.5v-3.75H7.5v-1.5h3.75V7.5v3.75h3.75v1.5Z";
var isPathOriginal_ = true;
const element = document.getElementById('opcion_impresion');

document.getElementById('cancer_mama_op').addEventListener('click', function() {
  // Tu código a ejecutar cuando se hace clic en el SVG
  infoElement.classList.toggle('d-none');
    // Alterna entre los dos valores de path
    if (isPathOriginal) {
      miPath.setAttribute("d", pathAlterno);
      miPath.setAttribute("fill", "red");
    } else {
      miPath.setAttribute("d", pathOriginal);
      miPath.setAttribute("fill", "blue");
    }
    
    // Cambia el estado de isPathOriginal para el próximo clic
    isPathOriginal = !isPathOriginal;

});

document.getElementById('impre_diagnostica_op').addEventListener('click', function() {
  // Tu código a ejecutar cuando se hace clic en el SVG
  element.classList.toggle('d-none');
  if (isPathOriginal_) {
    diagnosticoPath.setAttribute("d", pathAlterno_);
    diagnosticoPath.setAttribute("fill", "red");
  } else {
    diagnosticoPath.setAttribute("d", pathOriginal_);
    diagnosticoPath.setAttribute("fill", "blue");
  }
  
  // Cambia el estado de isPathOriginal para el próximo clic
  isPathOriginal_ = !isPathOriginal_;

  
});
var radioButtons = document.getElementsByName('colposcopia_option');

  // Añadir un event listener para el cambio
  radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('change', function() {
      // Verificar cuál está marcado
      if (this.checked) {
        // Obtener el valor del radio button seleccionado
        var valorSeleccionado = this.value;
        console.log('Valor seleccionado:', valorSeleccionado);
      }
    });
  });


  // CITOLOGIA
  function obtenerFechaActual() {
    const hoy = new Date();
    const año = hoy.getFullYear();
    const mes = String(hoy.getMonth() + 1).padStart(2, '0');
    const dia = String(hoy.getDate()).padStart(2, '0');
    return `${dia}-${mes}-${año}`;
}

// Función para establecer la fecha actual en un elemento de entrada de tipo "date"
function establecerFechaActualEnInput() {
    const fechaInput = $('#fecha_toma_cita');
    fechaInput.val(obtenerFechaActual());
}

// Llamamos a la función cuando el DOM esté listo
$(document).ready(function () {
    establecerFechaActualEnInput();
});


$("#send_date_cito").click(function () {
    const apellido_paterno= document.getElementById("apellido_paterno").value;
    const apellido_materno = document.getElementById("apellido_materno").value;
    const conyuge= document.getElementById("conyuge").value;
    const primer_nombre = document.getElementById("primer_nombre").value;
    const  segundo_nombre= document.getElementById("segundo_nombre").value;
    const direccion_dom = document.getElementById("direccion_dom").value;
    const direccion_tra= document.getElementById("direccion_tra").value;
    const menarquia= document.getElementById("menarquia").value;
    const  relacion_sexual= document.getElementById("relacion_sexual").value;
    const s_s = document.getElementById("s_s").value;
    const ced = document.getElementById("ced").value;
    const telefono = document.getElementById("telefono").value;
    const parto = document.getElementById("parto").value;
    const menopausia = document.getElementById("menopausia").value;
    const fecha_toma_cita = document.getElementById("fecha_toma_cita").value;
    const edad_cito = document.getElementById("edad_cito").value;
    const ocupacion_cito = document.getElementById("ocupacion_cito").value;
    const estado_civil_cito = document.getElementById("estado_civil_cito").value;
    const fecha_ultima_menstruacion_cito = document.getElementById("fecha_ultima_menstruacion_cito").value;
    const anticonceptivos_cito = document.getElementById("anticonceptivos_cito").value;
    const grava_cito = document.getElementById("grava_cito").value;
    const conyuges_cito = document.getElementById("conyuges_cito").value;
    const examen_citolo = document.getElementById("examen_citolo").value;
    // const atendida_por_cito = document.getElementById("atendida_por_cito").value;
    // const fecha_proximo_examen_cito = document.getElementById("fecha_proximo_examen_cito").value;

      const dato= {apellido_paterno:apellido_paterno,
        apellido_materno:apellido_materno,
        conyuge:conyuge,
        primer_nombre:primer_nombre,
        segundo_nombre:segundo_nombre,
        direccion_dom:direccion_dom,
        direccion_tra:direccion_tra,
        menarquia:menarquia,
        relacion_sexual:relacion_sexual,
        s_s:s_s,
        ced:ced,
        telefono:telefono,
        parto:parto,
        menopausia:menopausia,
        fecha_toma_cita:fecha_toma_cita,
        edad_cito:edad_cito,
        ocupacion_cito:ocupacion_cito,
        estado_civil_cito:estado_civil_cito,
        fecha_ultima_menstruacion_cito:fecha_ultima_menstruacion_cito,
        anticonceptivos_cito:anticonceptivos_cito,
        grava_cito:grava_cito,
        conyuges_cito:conyuges_cito,
        examen_citolo:examen_citolo
        // atendida_por_cito:atendida_por_cito,
        // fecha_proximo_examen_cito:fecha_proximo_examen_cito
      };
      $.ajax({
        type:"POST",
        url:"../php/citologia/citologia.php",
        data:JSON.stringify(dato),
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
    
  })
  
  