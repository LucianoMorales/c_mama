var img = new Image();

// Establecer la fuente (URL) de la imagen
img.src = '../image/ancec.png';

var se;
var numero;
$("#miSelect").on("change", function() {
    

    // Obtener el valor seleccionado con jQuery
     var valor= $(this).val();
     if(valor ==1){
se ="Informe de todos los pacientes";
numero=200;
     }
     if(valor == 'navegacion'){

se="Pacientes que fueron registrado en navegación";
numero=150;
     }
     if (valor=='masculino'){
        se ="Pacientes masculinos";
        numero=230;

     }
     if (valor=='femenino'){
        se ="Pacientes femeninos";
        numero=230;
     }
     if (valor=='seguro'){
        se ="Pacientes con seguro social";
        numero=210;
     }

  });

function imprimir() {

 
    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    var f = new Date();
    var data = (f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());

    var fe1 = $('#fecha_i').val();
    var fe2 = $('#fecha_f').val();
    var headers = ["Header 1", "Header 2"];
    var rows = [["Cell 1", "Cell 2"], ["Cell 1", "Cell 2"]];
    var pdf = new jsPDF('p', 'pt', 'letter');

    if (fe1.length == "" || fe2.length == "") {
        // Ajusta la posición vertical de la imagen
        pdf.addImage(img, 'PNG', 20, 10, 100, 100);
        

        // Ajusta la posición vertical de la fecha
        var fechaY = pdf.lastAutoTable.finalY - 80;
        pdf.setFontSize(10);
        pdf.text(data, 480, 20);

        // Ajusta la posición vertical del texto
        var textoY = fechaY + 10;
        pdf.setFontSize(14);
        pdf.text('Asociación Nacional Contra el Cáncer ', 180, 50);
        pdf.text('Capítulo de santiago provincia de veraguas ', 160, 70);
        pdf.text(se, numero, 90);

        // Ajusta la posición vertical de la tabla
        var startY = textoY + 10;

        pdf.autoTable({
            html: "#tabla-datos",
            startY: 200,
            margin: { top: 5 }
        });
    } else {
              // Ajusta la posición vertical de la imagen
              pdf.addImage(img, 'JPG', 10, 10, 100, 100);
        

              // Ajusta la posición vertical de la fecha
              var fechaY = pdf.lastAutoTable.finalY - 80;
              pdf.setFontSize(10);
              pdf.text(data, 480, 20);
      
              // Ajusta la posición vertical del texto
              var textoY = fechaY + 10;
              pdf.setFontSize(14);
              pdf.text('Asociación Nacional Contra el Cáncer ', 180, 50);
              pdf.text('Capítulo de santiago provincia de veraguas ', 160, 70);
              pdf.text(se, numero, 90);
              pdf.setFont("times");
                pdf.setFontSize(1);
              pdf.text('De: ', 180, 110);
              pdf.text(fe1,210 , 110);
              pdf.text('Hasta:', 300, 110);
              pdf.text(fe2,360 , 110);
              // Ajusta la posición vertical de la tabla
              var startY = textoY + 10;
      
              pdf.autoTable({
                  html: "#tabla-datos",
                  startY: 200,
                  margin: { top: 5 }
              });
    }

    pdf.save('donaciones_pacientes.pdf');
};


 

