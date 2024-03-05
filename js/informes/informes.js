var valor_select;

$("#miSelect").on("change", function() {
    // Obtener el valor seleccionado con jQuery
    var valor = $(this).val();
valor_select=valor;
    // Mostrar el valor seleccionado en un elemento HTML
    const dato= {valor:valor};
    $.ajax({
      type:"POST",
      url:"../php/informes/informes.php",
      data:JSON.stringify(dato),
      success: function(resp){
        $('#tabla-datos tbody').html(resp);
      }
    })
  });

  $("#ingresar").on("click", function() {
    // var fecha_i= document.getElementById("fecha_i");
    var fecha_i= $("#fecha_i").val();
    var fecha_f= $("#fecha_f").val();

    // Obtener el valor seleccionado con jQuery
 
    // Mostrar el valor seleccionado en un elemento HTML
    const dato= {valor_select:valor_select, fecha_i:fecha_i,fecha_f:fecha_f};
    $.ajax({
      type:"POST",
      url:"../php/informes/informes_fechas.php",
      data:JSON.stringify(dato),
      success: function(resp){
        $('#tabla-datos tbody').html(resp);
      }
    })
  });

