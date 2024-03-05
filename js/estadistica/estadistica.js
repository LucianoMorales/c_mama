$("#download").click(function () {
    var mesAnioSeleccionado = $('#mesAnio').val();

    // Hacer una petición al servidor usando AJAX (jQuery)
    $.ajax({
      url: '../php/estadistica/estadistica.php',
      type: 'POST',
      data: { mesAnio: mesAnioSeleccionado },
      success: function(data) {
      console.log(data);

      var tabla = document.createElement('table');
      tabla.createCaption().innerHTML = "Resumen de Información";
      var thead = tabla.createTHead();
      var tbody = document.createElement('tbody');
   
      var tr = tbody.insertRow();
      tr.innerHTML = "<th colspan="+2+"><string><h3>Pacientes por sexo</h3></string></th>";

        var tr = tbody.insertRow();
      tr.innerHTML = "<th>Sexo</th><th>Cantidad</th>";
      data.consulta1.forEach(function (fila) {
        var tr = tbody.insertRow();
        tr.innerHTML = "<td>" + fila.sexo + "</td><td>" + fila.cantidad_pacientes + "</td>";
        tr.setAttribute('style', 'border: 1px solid black;');
    });
    var tr = tbody.insertRow();
    tr.innerHTML = "<td></td>";
    var tr = tbody.insertRow();
    tr.innerHTML = "<th colspan="+2+"><string><h3>Pacientes Asegurados</h3></string></th>";

    data.consulta2.forEach(function (fila) {
      var tr = tbody.insertRow();
      tr.innerHTML = "<td>" + fila.seguro + "</td><td>" + fila.cantidad + "</td>";
  });

  var tr = tbody.insertRow();
    tr.innerHTML = "<td></td>";
    var tr = tbody.insertRow();
    tr.innerHTML = "<th colspan="+2+"><string><h3>Pacientes Asegurados por sexo</h3></string></th>";
    data.consulta2_.forEach(function (fila) {
      var tr = tbody.insertRow();
      tr.innerHTML = "<td>" + fila.sexo + "</td><td>" + fila.cantidad + "</td>";
  });
  var tr = tbody.insertRow();
    tr.innerHTML = "<td></td>";
    var tr = tbody.insertRow();
    tr.innerHTML = "<th colspan="+2+"><string><h3>Pacientes Afiliados por edad</h3></string></th>";
    data.consulta3.forEach(function (fila) {
      var tr = tbody.insertRow();
      tr.innerHTML = "<td>" + fila.rango_edad + "</td><td>" + fila.cantidad + "</td>";
  }); var tr = tbody.insertRow();
  tr.innerHTML = "<td></td>";
  var tr = tbody.insertRow();
  tr.innerHTML = "<th colspan="+2+"><string><h3>Pacientes Afiliados por Estado Civil</h3></string></th>";
  data.consulta4.forEach(function (fila) {
    var tr = tbody.insertRow();
    tr.innerHTML = "<td>" + fila.estado_civil + "</td><td>" + fila.cantidad + "</td>";
});
var tr = tbody.insertRow();
tr.innerHTML = "<td></td>";
var tr = tbody.insertRow();
tr.innerHTML = "<th colspan="+2+"><string><h3>Pacientes Afiliados Referencia</h3></string></th>";
data.consulta5.forEach(function (fila) {
  var tr = tbody.insertRow();
  tr.innerHTML = "<td>" + fila.referente + "</td><td>" + fila.cantidad + "</td>";
});
var tr = tbody.insertRow();
tr.innerHTML = "<td></td>";
var tr = tbody.insertRow();
tr.innerHTML = "<th colspan="+2+"><string><h3>Pacientes Afiliados por Distritos</h3></string></th>";
data.consulta6.forEach(function (fila) {
  var tr = tbody.insertRow();
  tr.innerHTML = "<td>" + fila.distrito + "</td><td>" + fila.cantidad + "</td>";
});


//////////////////////////////////////////////////////////////////////////
var tabla2 = document.createElement('table');
tabla2.createCaption().innerHTML = "Resumen de Información";
var thead = tabla.createTHead();
var tbody1 = document.createElement('tbody');

var tr = tbody1.insertRow();
tr.innerHTML = "<tr><th colspan="+6+" ><string><h3>Cantidad de Diagnosticos realizados</h3></string></th></tr>";

  var tr = tbody1.insertRow();
tr.innerHTML = "<th>Queretosis Seborreica</th><th>Queratosis Actínica</th><th>Carcinoma Basocelular</th><th>Células Escamosas</th><th>Lunar Diplástico</th><th>Lunar Congénito</th><th>Pterigión</th><th>Melanoma</th></tr>";
data.consulta7.forEach(function (fila) {
  var tr = tbody1.insertRow();
  tr.innerHTML = "<td>" + fila.count_queretosis_seborreica+ "</td><td>" + fila.count_queratosis_actinica + "</td><td>" + fila.count_carcinoma_basocelular + "</td><td>" + fila.count_celulas_escamosas + "</td><td>" + fila.count_lunar_diplastico + "</td><td>" + fila.count_lunar_congenito + "</td><td>" + fila.count_pterigion+ "</td><td>" + fila.count_melanoma+ "</td>" ;
  tr.setAttribute('style', 'border: 1px solid black;');
});
var tr = tbody1.insertRow();
tr.innerHTML = "<td></td>";
var tr = tbody1.insertRow();
tr.innerHTML = "<th colspan="+5+"><string><h3>Cantidad de diagnosticos de cancer de mama realizados</h3></string></th>";
var tr = tbody1.insertRow();
tr.innerHTML ="<th>Car. Duc. Infiltrante</th><th>Car. Duc. Invasivo</th><th>Car. Medular</th><th>Coloide</th><th>Tubular</th><th>Tapilar</th><th>Lobulillar In Situ</th><th>Lobulillar Invasivo</th><th>Inflamatorio</th><th>Recurrente</th><th>Masculino</th><th>Piaget</th><th>Metastásico</th>";
data.consulta8.forEach(function (fila) {
var tr = tbody1.insertRow();
tr.innerHTML = "<td>" + fila.count_car_duc_in + "</td><td>" + fila.count_car_duc_invasivo + "</td><td>" + fila.count_car_medu + "</td><td>" + fila.count_coloide+ "</td><td>" + fila.count_tubular + "</td><td>" + fila.count_tapilar + "</td><td>" + fila.count_lobu_insita+ "</td><td>" + fila.count_lobu_invasivo + "</td><td>" + fila.count_inflamatorio+ "</td><td>" + fila.count_recurrente + "</td><td>" + fila.count_masculino+ "</td><td>" + fila.count_piaget + "</td><td>" + fila.count_metastasico + "</td>";
});

var tr = tbody1.insertRow();
tr.innerHTML = "<td></td>";
var tr = tbody1.insertRow();
tr.innerHTML = "<th colspan="+2+"><string><h3>Cant. Referencias de pacientes</h3></string></th>";
data.consulta9.forEach(function (fila) {
var tr = tbody1.insertRow();
tr.innerHTML = "<td>" + fila.referir_a + "</td><td>" + fila.cantidad + "</td>";
});
var tr = tbody1.insertRow();
tr.innerHTML = "<td></td>";
var tr = tbody1.insertRow();
tr.innerHTML = "<th colspan="+2+"><string><h3>Cant de mamografias</h3></string></th>";
data.consulta10.forEach(function (fila) {
var tr = tbody1.insertRow();
tr.innerHTML = "<td>" + fila.noduloscol + "</td><td>" + fila.cantidad + "</td>";
}); 







tabla2.appendChild(tbody1);
    tabla.appendChild(tbody);

    // Exportar a Excel
    var nombreArchivo = "Reporte_Afiliacion.xlsx";
    var hoja = XLSX.utils.table_to_sheet(tabla);
    var libro = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(libro, hoja, "Resumen de Información");
    var hoja2 = XLSX.utils.table_to_sheet(tabla2);
    // var libro2 = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(libro, hoja2, "Diagnosticos");
    XLSX.writeFile(libro, nombreArchivo);

      }
  });
})