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
    const examen_cito = document.getElementById("examen_cito").value;
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
        examen_cito:examen_cito,
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
  
  