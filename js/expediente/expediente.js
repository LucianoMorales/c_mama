
var icono_select= document.getElementById("icono_select");
var pathOriginal = "m6.75 21 10.5-9-10.5-9v18Z";
var pathAlterno = "m4.594 8.912 6.553 7.646a1.126 1.126 0 0 0 1.708 0l6.552-7.646c.625-.73.107-1.857-.854-1.857H5.447c-.961 0-1.48 1.127-.853 1.857Z";
var isPathOriginal = true;
document.getElementById('btn-exp').addEventListener('click', function() {
    // Tu código a ejecutar cuando se hace clic en el SVG
    // element.classList.toggle('d-none');
    if (isPathOriginal) {
      icono_select.setAttribute("d", pathAlterno);
    //   icono_select.setAttribute("fill", "red");
    } else {
      icono_select.setAttribute("d", pathOriginal);
    //   icono_select.setAttribute("fill", "blue");
    }
    
    // Cambia el estado de isPathOriginal para el próximo clic
    isPathOriginal = !isPathOriginal;
  
    
  });

