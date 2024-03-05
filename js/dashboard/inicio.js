$(document).ready(function() {
  $.ajax({
    type:"GET",
    url: '../php/dashboard/datos_diarios.php',
    dataType: 'json',
 
    success: function(datos) {
  
      $('#cant_infor_diarios').html(datos.informe);
      $('#cant_pacie_diarios').html(datos.paciente);
    
    }
  });
})


// **********************************************************
// ****** TABLA PRINCIPAL DE LOS PACIENTES ******************
// ***********************************************************

$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: "../php/dashboard/informes_diarios.php",
    dataType: "json",
  })
  .done(function(datoss) {
    console.log(datoss);
  
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log("Error en la solicitud AJAX: " + textStatus + ", " + errorThrown);
  });
});


$(document).ready(function() {
    $.ajax({
        url: '../php/dashboard/inicio.php',
        // dataType: 'json',
        success: function(datos) {
          // Agrega la tabla al cuerpo de la tabla en el HTML
          $('#tabla-datos tbody').html(datos);
        }
      });

    var miInput = document.getElementById("bsc_paciente");
    miInput.addEventListener("input", function() {
        if (miInput.value.length > 0) {
            $.ajax({
                url: "../php/dashboard/tabla_dinamica.php",
                type: "POST",
                data: { miInput:miInput.value },
                success: function(datos) {
               
                    
                    // Agrega la tabla al cuerpo de la tabla en el HTML
                    $('#tabla-datos tbody').html(datos);
               
                }
              });
        } else {
            $.ajax({
                url: '../php/dashboard/inicio.php',
                // dataType: 'json',
             
                success: function(datos) {
          
                  
                  // Agrega la tabla al cuerpo de la tabla en el HTML
                  $('#tabla-datos tbody').html(datos);
                }
              });
        }
      });


   
  });



  $(document).ready(function() {

    var fecha = new Date().toLocaleDateString('en-CA');

    $.ajax({
        url: '../php/dashboard/pacientes_dia.php',
        // dataType: 'json',
        type: 'POST',
        data: { fecha: fecha },
        success: function(datoss) {
          // Construye la tabla con los datos recibidos
        //   var tabla1 = '';
        //   $.each(datoss, function(i, item) {
        //     tabla1 += '<tr>';
        //     tabla1 += '<td>' + item.cedula + '</td>';
        //     tabla1 += '<td>' + item.nombre + item.apellido + '</td>';
   
        //     tabla1 += '<td>' + item.telefono + '</td>';
        
        //     tabla1 += '</tr>';
        //   });
          
          // Agrega la tabla al cuerpo de la tabla en el HTML
          $('#info').html(datoss);
        }
      });
  });




  $(document).ready(function() {

    var fecha = new Date().toLocaleDateString('en-CA');

    $.ajax({
        url: '../php/dashboard/pacientes_dia.php',
        // dataType: 'json',
        type: 'POST',
        data: { fecha: fecha },
        success: function(datoss) {
  
          
          // Agrega la tabla al cuerpo de la tabla en el HTML
          $('#info').html(datoss);
        }
      });
  });


  
  $(document).ready(function() {
    $("#btn-add-new").click(function(e) {
      e.preventDefault();
      var cedula= document.getElementById("bsc_paciente").value;

      $.ajax({
        url: '../php/dashboard/add-nuevo.php',
        // dataType: 'json',
        type: 'POST',
        data: { cedula:cedula },
        success: function(respuesta) {
  console.log(respuesta);
          if (respuesta==0){
            window.location.href = "../pages/registro_paciente.php";
          }
          else{
                 Swal.fire({
              title: '<strong>Paciente Encontrado</strong>',
              icon: 'info',
              html:
               respuesta +
               '<p>y fue registrado desde el sistema de Cáncer de piel </p>'
              +
                '<p style="font-size:14px"><strong>¿Desea registrar al paciente para ser utilizado en nuestro sistema?</strong></p>',
              showCloseButton: true,
              showCancelButton: true,
              focusConfirm: false,
              confirmButtonText:
                'Aceptar',
            
              cancelButtonText:
                'Regresar',
          
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                        $.ajax({
        url: '../php/dashboard/update_paciente.php',
        // dataType: 'json',
        type: 'POST',
        data: { cedula:cedula },
        success: function(resp) {
if(resp == 1){
 Swal.fire('Paciente guardado', '', 'success');
 // **********************************************************
// ****** TABLA PRINCIPAL DE LOS PACIENTES ******************
// ***********************************************************

$(document).ready(function() {


    $.ajax({
        url: '../php/dashboard/inicio.php',
        // dataType: 'json',
        success: function(datos) {
          // Agrega la tabla al cuerpo de la tabla en el HTML
          $('#tabla-datos tbody').html(datos);
        }
      });

      
      
    var miInput = document.getElementById("bsc_paciente");
    miInput.addEventListener("input", function() {
        if (miInput.value.length > 0) {
            $.ajax({
                url: "../php/dashboard/tabla_dinamica.php",
                type: "POST",
                data: { miInput:miInput.value },
                success: function(datos) {
               
                    
                    // Agrega la tabla al cuerpo de la tabla en el HTML
                    $('#tabla-datos tbody').html(datos);
               
                }
              });
        } else {
            $.ajax({
                url: '../php/dashboard/inicio.php',
                // dataType: 'json',
             
                success: function(datos) {
          
                  
                  // Agrega la tabla al cuerpo de la tabla en el HTML
                  $('#tabla-datos tbody').html(datos);
                }
              });
        }
      });


   
  });
}
else{
  console.log(resp);
}
        }
      })


               
              } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
              }
            })
          }
          // Agrega la tabla al cuerpo de la tabla en el HTML
        
        }
      });

    }
  )

})
var bootstrapDiv
 
function infoPaciente(idPaciente) {


var valor = idPaciente;
  const dato= {valor:valor};
  $.ajax({
    type:"POST",
    url:"../php/dashboard/info_paciente.php",
    dataType: 'json', 
    data:JSON.stringify(dato),
    success: function(resp){
     respuesta = resp;
      bootstrapDiv = `
      <!-- Tu contenido HTML -->
    `;
    
    // Agregar el nuevo contenido al elemento
    $('#cuerpo_info').html(bootstrapDiv);
     bootstrapDiv = `
     <div id="todo" style="">
      <div class="col-md-12 my-2" style="background: #D0F4C3; height:30px;"> </div>
      <div class="container" >
        <div class="row">
        
        <div class="col-md-4">
        <img src="../image/logoancec.png" height="80px" alt="">
        </div>
        <div class="col-md-8" >
        <h1 class="modal-title fs-5 " id="staticBackdropLabel" ><h2>Información del paciente</h2></h1>
        </div>
     </div>

      <div class="row" >
      <div class="col-md-12 text-center justify-left my-2"> 
      <h3>`+resp[0].nombre+` `+resp[0].apellido+`</h3>
      </div>
      </div>
          <div class="row  text-center">
              <div class="col-md-4 my-2 text-start"> <strong>cédula del paciente: </strong> `+resp[0].cedula+` </div>
              <div class="col-md-4 my-2 text-start"> <strong> Fecha de nacimiento: </strong>`+resp[0].fecha_nacimiento+`</div>
              <div class="col-md-4 my-2 text-start"> <strong> Edad: </strong>`+resp[0].edad+`</div>
              <div class="col-md-4 my-2 text-start"> <strong> Sexo: </strong>`+resp[0].sexo+`</div>
              <div class="col-md-4 my-2 text-start"> <strong> Estado Civil: </strong>`+resp[0].estado_civil+`</div>
              <div class="col-md-4 my-2 text-start"> <strong> Ocupación: </strong>`+resp[0].ocupacion+`</div>
              <div class="col-md-4 my-3 text-start"> <strong> Área de referencia: </strong>`+resp[0].referente+`</div>

          </div>
         
      <div class="row ">
      <div class="col-md-4 my-2 text-start"> <strong>Teléfono: </strong> `+resp[0].telefono+` </div>
      <div class="col-md-4 my-2 text-start"> <strong> Correo electrónico: </strong>`+resp[0].correoelectronico+`</div>
      <div class="col-md-4 my-2 text-start"> <strong>Provincia: </strong> `+resp[0].provincia+` </div>
      <div class="col-md-4 my-2 text-start"> <strong>Distrito: </strong>`+resp[0].distrito+`</div>
      <div class="col-md-4 my-2 text-start"> <strong>Comunidad: </strong>`+resp[0].comunidad+`</div>
  </div>

  <div class="row ">
  <div class="col-md-5 my-2 text-start"> <h4> Contacto de emergencia</h4></div>
  <div class="col-md-7 my-2 text-start"> <h4><hr></h4> </div>

</div>
<div class="row ">
<div class="col-md-4 my-2 text-start"> <strong>Nombre: </strong> `+resp[0].nombre_contacto+` </div>
<div class="col-md-4 my-2 text-start"> <strong>Teléfono: </strong>`+resp[0].telefono_contacto+`</div>

</div>
</div>
</div>
      `;
      $('#cuerpo_info').append(bootstrapDiv);
    }
  })
 
}


function imprimir() {
  var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  var f = new Date();
  var data = (f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());

  var pdf = new jsPDF('p', 'pt', 'letter');

  // Ajusta la posición vertical de la imagen
  pdf.addImage(img, 'PNG', 20, 10, 100, 100);

  // Ajusta la posición vertical de la fecha
  var fechaY = pdf.lastAutoTable.finalY - 80;
  pdf.setFontSize(10);
  pdf.text(data, 480, 20);

  // Ajusta la posición vertical del texto
  pdf.setFontSize(14);
  pdf.text('Asociación Nacional Contra el Cáncer ', 180, 50);
  pdf.text('Capítulo de Santiago, provincia de Veraguas ', 160, 70);
  pdf.setFont("times");
  pdf.setFontSize(11);
  pdf.text('Paciente: ', 230, 90);
  pdf.text(respuesta[0].nombre, 300, 90);
  pdf.text(respuesta[0].apellido, 370, 90);

  pdf.text('Cedúla: ', 35, 140);
  pdf.text(respuesta[0].cedula, 90, 140);

  pdf.text('Fecha de nacimiento: ', 220, 140);
  pdf.text(respuesta[0].fecha_nacimiento, 320, 140);

  pdf.text('Edad: ', 460, 140);
  pdf.text(respuesta[0].edad, 520, 140);

  pdf.text('Sexo: ', 35, 160);
  pdf.text(respuesta[0].sexo, 90, 160);

  pdf.text('Estado civil: ', 220, 160);
  pdf.text(respuesta[0].estado_civil, 320, 160);

  pdf.text('Ocupación: ', 460, 160);
  pdf.text(respuesta[0].ocupacion, 520, 160);
 

  pdf.text('Área de referencia: ', 35, 180);
  pdf.text(respuesta[0].referente, 130, 180);


  pdf.setFont("times");
  pdf.setFontSize(15);

  pdf.text('Información de contacto ', 35, 220);


  pdf.setFont("times");
  pdf.setFontSize(11);
  pdf.text('Teléfono de casa: ', 35, 250);
  pdf.text(respuesta[0].telefono, 120, 250);

  pdf.text('Correo: ', 420, 250);
  pdf.text(respuesta[0].correoelectronico, 460, 250);

  pdf.text('Provincia: ', 35, 270);
  pdf.text(respuesta[0].provincia, 90, 270);
  35, 270
  pdf.text('Distrito: ', 220, 270);
  pdf.text(respuesta[0].distrito, 260, 270);


  pdf.setFont("times");
  pdf.setFontSize(15);

  pdf.text('Contacto para emergencia ', 35, 310);


  pdf.setFont("times");
  pdf.setFontSize(11);
  pdf.text('Nombre ', 35, 340);
  pdf.text(respuesta[0].nombre_contacto, 100, 340);

  pdf.text('Teléfono', 220, 340);
  pdf.text(respuesta[0].telefono_contacto, 280, 340);



  // Utiliza html2canvas para convertir el contenido del div en una imagen
  pdf.save('donaciones_pacientes.pdf');
};

