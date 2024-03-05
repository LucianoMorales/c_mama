//FUNCION PARA LIMPIAR LOS CAMPOS
function limpieza(){
   
  document.getElementById("cedula").value = " ";
  document.getElementById("nombre").value = "";
  document.getElementById("ape").value = "";
  $("#seguro").prop("selectedIndex", 0);
  $("#sexo").prop("selectedIndex", 0);
  $("#estado_civil").prop("selectedIndex", 0);
  document.getElementById("telefono").value = "";
  document.getElementById("ed").value = "";
  document.getElementById("fecha_nac").value = "";
  $("#provincias").prop("selectedIndex", 0);
  $("#distritos").prop("selectedIndex", 0);
  document.getElementById("ocupacion").value = "";
  document.getElementById("lugar_trabajo").value = "";
  $("#area_referencia").prop("selectedIndex", 0);
  $("#alergia").prop("selectedIndex", 0);
  document.getElementById("add_ahf").value = "";
  document.getElementById("add_app").value = "";
  document.getElementById("add_aqt").value = "";
  document.getElementById("medicamentos_aler").value = "";

   document.getElementById("hospedaje_direccion").value =" ";
 $("#add_navegacion ").prop("SelectedIndex", 0);
document.getElementById("correo_electronico").value="";
  document.getElementById("nombre_contacto").value="";
  document.getElementById("telefono_contacto").value="";

  document.getElementById("comunidad").value="";
  
  document.getElementById("telefono_celular").value="";
}

$(document).ready(function () {
    $("#datos_pacientes").click(function () {
      const fechaActual = new Date();
      const dia = fechaActual.getDate();
      const mes = fechaActual.getMonth() + 1;
      const anio = fechaActual.getFullYear();
  
      const fecha_ingreso = `${anio}/${mes}/${dia}`;
      var cedula = document.getElementById("cedula").value;
      var nombre = document.getElementById("nombre").value;
      var apellido = document.getElementById("ape").value;
      const seguro = $("#seguro option:selected").val();
      const sexo = $("#sexo option:selected").val();
      const estado_civil = $("#estado_civil option:selected").val();
      var telefono = document.getElementById("telefono").value;
      var edad = document.getElementById("ed").value;
      var fecha_nac = document.getElementById("fecha_nac").value;
      const provincia = $("#provincias option:selected").val();
      const distrito = $("#distritos option:selected").val();
      var ocupacion = document.getElementById("ocupacion").value;
      var lugar_trabajo = document.getElementById("lugar_trabajo").value;
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
      var comunidad = document.getElementById("comunidad").value;
      var medicamentos_alergicos = document.getElementById("medicamentos_aler").value;
      var telefono_celular = document.getElementById("telefono_celular").value
      if(cedula.length == ""  ){
        Swal.fire({
          icon: 'error',
          title: 'Acción inapropiada',
          text: 'El campo cédula se encuentra vacío',
          
        })
      }else{
      var datos = {
        cedula: cedula,
        nombre:nombre,
    apellido:apellido,
    seguro:seguro,
    sexo:sexo,
    estado_civil:estado_civil,
    telefono:telefono,
    edad:edad,
    fecha_nac:fecha_nac,
    provincia:provincia,
    distrito:distrito,
    ocupacion:ocupacion,
    lugar_trabajo:lugar_trabajo,
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
    fecha_ingreso:fecha_ingreso,
    comunidad:comunidad,
    telefono_celular:telefono_celular
  // revisar uno por uno
  
      };
      $.ajax({
        type: "POST",
        url: "../php/registro_paciente/registro_paciente.php",
        data: JSON.stringify(datos),
        success: function(respuesta){
      
        
      if (respuesta == 0) {
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
          title: 'Datos Guardados Correctamente'
        })
  
   limpieza();
      } 
      else {
      Swal.fire({
            icon: "error",
               title: "Error",
         text: respuesta,
             showConfirmButton: false,
            timer: 2000,
           });
        
          }
        }
      
      });
      }
    });
})