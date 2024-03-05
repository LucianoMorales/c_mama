var weightInput = document.getElementById("add_peso");
var heightInput = document.getElementById("add_talla");
var imcResult = document.getElementById("imc");
var imctexto = document.getElementById("texto_imc");
weightInput.addEventListener("input", calculateBMI);
heightInput.addEventListener("input", calculateBMI);
function calculateBMI() {
    var weight = parseFloat(weightInput.value);
    var height = parseFloat(heightInput.value); // Convertir altura a metros
  
    if (weight && height) {
      var bmi = weight / (height * height);
      imcResult.textContent = bmi.toFixed(1);

      if( bmi <= 18.5){
        imcResult.style.color = "#5293dc";
        imctexto.textContent = "Peso Bajo";
        imctexto.style.color = "#5293dc";
      }
      else if(bmi>18.5 && bmi <=25.0){
        imcResult.style.color = "#69b70b";
        imctexto.textContent = "Peso Normal";
        imctexto.style.color = "#69b70b";
      }
      else if(bmi>25.0){
        imcResult.style.color = "#e5556b";
        imctexto.textContent = "Sobrepeso";
        imctexto.style.color = "#e5556b";
      }
    } else {
      imcResult.textContent = "";
    }
  }