var elementoOculto = document.getElementById("botones");

$("#send_date_evo").click(function () {
  const cedula = document.getElementById("cedula").value;
  const agg_peso = document.getElementById("agg_peso").value;
  const agg_talla = document.getElementById("agg_talla").value;
  const agg_pa = document.getElementById("agg_pa").value;
  const agg_pulso = document.getElementById("agg_pulso").value;
  const agg_fre_cardiaca = document.getElementById("agg_fre_cardiaca").value;
  const agg_temperatura = document.getElementById("agg_temperatura").value;
  const add_hallazgo = document.getElementById("add_hallazgo").value;
  const add_tratamiento = document.getElementById("add_tratamiento").value;
  const add_recomendacion = document.getElementById("add_recomendacion").value;



  if(cedula.length==0){
alert("ingrese la cédula, campo vacio")

  }
  else{
    const dato= {cedula:cedula,
      agg_peso:agg_peso,
agg_talla:agg_talla,
agg_pa:agg_pa,
agg_pulso:agg_pulso,
agg_fre_cardiaca:agg_fre_cardiaca,
agg_temperatura:agg_temperatura,
add_hallazgo:add_hallazgo,
add_tratamiento:add_tratamiento,
add_recomendacion:add_recomendacion
    };
    $.ajax({
      type:"POST",
      url:"../php/evolucion_paciente/evolucion_paciente.php",
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
  }
})



$("#bsc_paciente").click(function () {
    const cedula = document.getElementById("cedula").value;
    if(cedula.length==0){
alert("ingrese la cédula, campo vacio")

    }
    else{
      const dato= {cedula:cedula};
      $.ajax({
        type:"POST",
        url:"../php/evolucion_paciente/bsc_paciente.php",
        data:JSON.stringify(dato),
        success: function(resp){
          $('#tabla-datos tbody').html(resp);
       
         
        }

      })
    }
  })

    $("#btn_clinic").click(function() {
      const cedula1 = document.getElementById("cedula").value;
      const dato= {cedula:cedula1};
     
      $.ajax({
        type:"POST",
        contentType: 'application/json',
        url:"../php/evolucion_paciente/contenido_historia_c.php",
        dataType: 'json', 
        data:JSON.stringify(dato),
        success: function(respuesta){
   
          if(respuesta[0].diabetes_heredo==1){
            var diabetes = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" checked disabled></input>`
          }
          else{
            diabetes = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" disabled ></input>`
          }
          if(respuesta[0].hipertension_heredo==1){
            var hipertension = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" checked disabled></input>`
          }
          else{
            hipertension= `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" disabled ></input>`
          }
          if(respuesta[0].enf_renal_heredo==1){
            var enf_renal = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" checked disabled></input>`
          }
          else{
            enf_renal= `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" disabled ></input>`
          }
          if(respuesta[0].cardiopatias_heredo==1){
            var cardiopatias = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" checked disabled></input>`
          }
          else{
            cardiopatias= `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" disabled ></input>`
          }

          if(respuesta[0].diabetes_==1){
            var diabetes_ecc = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" checked disabled></input>`
          }
          else{
            diabetes_ecc = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" disabled ></input>`
          }
          if(respuesta[0].hipertension_ecc==1){
            var hipertension_ecc = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" checked disabled></input>`
          }
          else{
            hipertension_ecc= `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" disabled ></input>`
          }
          if(respuesta[0].enf_renal_ecc==1){
            var enf_renal_ecc = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" checked disabled></input>`
          }
          else{
            enf_renal_ecc= `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" disabled ></input>`
          }
          if(respuesta[0].cardiopatias_ecc==1){
            var cardiopatias_ecc = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" checked disabled></input>`
          }
          else{
            cardiopatias_ecc= `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" disabled ></input>`
          }
          if(respuesta[0].obesidad_ecc==1){
            var obesidad = `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" checked disabled></input>`
          }
          else{
            obesidad= `<input class="form-check-input" type="checkbox" value="" id="add_diabetes" name="add_diabetes" disabled ></input>`
          }

          var bootstrapDiv =`
            
          </div>


          <div class="row">

          <div class="col-md-2 text-center">
          <img src="../image/ancec.png" class="" height="160" >
          </div>
          <div class="col-md-8 text-center my-5">
          <div >
          <p class="mb-0" style="font-size:28px;
          font-family: Homer Simpson UI">Asociación Nacional contra el cáncer</p>
          <p style="font-size:28px;
          font-family: Homer Simpson UI">Capítulo de Santiago</p></div>
          <p style="font-size:18px;"> Informe historial clínico</p>
          </div>
          <div class="col-md-2 text-center">
          
          </div>
          </div>`;    
         bootstrapDiv += `




<div class="row" id="cuerpo">

<div class="container">
<div class="list-group">
<li  class="list-group-item " aria-current="true">
<div class="d-flex w-100 justify-content-between">
<h6 class="mb-0 fw-semibold">Antecedentes HeredoFamiliar</h6>
</div>
</li>

<li  class="list-group-item ">

<form class="row g-3 mb-3" >
  <div class="col-md-3">
    <label for="validationCustom01" class="form-label"><strong>¿Antecedentes de cáncer? </strong></label>
 <div>`+respuesta[0].antecedentes_cancer+`</div>
  </div>
  <div class="col-md-3 " id="container_tipo_cancer">
    <label for="validationCustom02" class="form-label"><strong>Tipo de cáncer</strong></label>
    <div>`+respuesta[0].tipo_cancer+`</div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom02" class="form-label"><strong>¿Alguna enfermedad cronica?</strong></label>
    <div>`+respuesta[0].enfermedad_cronica+`</div>
  </div>


 

  <div class="col-md-3 " id="container_heredo" >
    <label for="validationCustom01" class="form-label"><strong>¿Cuales?</strong></label>
 

    <div class="container">
        <div class="row">
        <div class="form-check">
        `+diabetes+`
<label class="form-check-label" for="flexCheckDefault">
Diabetes
</label>

</div>
<div class="form-check">
`+hipertension+`
<label class="form-check-label" for="flexCheckChecked"> 
Hipertensión
</label>
</div>
<div class="form-check">
`+enf_renal+`
<label class="form-check-label" for="flexCheckChecked">

Enf. Renal
</label>
</div>
<div class="form-check">
`+cardiopatias+`
<label class="form-check-label" for="flexCheckChecked">
Cardiopatias
</label>
</div>

        </div>
    </div>
    <div>`+respuesta[0].otros_heredo+`</div>
  </div>




  <div class="container">
<div class="row no-gutters">
  <div class="col-md-3">
    <label for="validationCustom02" class="form-label"></label>
    <p>  <strong> Cáncer de mama en la </strong></p>
  </div>
  <div class="col-md-2">
    <label for="validationCustom02" class="form-label"> <strong>Madre</strong> </label>
    <div>`+respuesta[0].madre+`</div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom02" class="form-label"> <strong>Hermana</strong> </label>
    <div>`+respuesta[0].hermana+`</div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom02" class="form-label"> <strong>Abuela</strong> </label>
    <div>`+respuesta[0].abuela+`</div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom02" class="form-label"> <strong>Prima</strong> </label>
    <div>`+respuesta[0].prima+`</div>
  </div>
  </div>
  </div>
</form>


</li>

<li  class="list-group-item ">
<div class="d-flex w-100 justify-content-between">
<h6 class="mb-0 fw-semibold"> <strong>Antecedentes Personales Patologicos</strong> </h6>

</div>

</li>

<li  class="list-group-item ">
<!-- FORMULARIOS -->
<form class="row g-3 mb-3" >
  <div class="col-md-3">
    <label for="validationCustom01" class="form-label"> <strong>¿Antecedentes de cáncer?</strong> </label>
    <div>`+respuesta[0].antecendentes_cancer_pe+`</div>
  </div>
  <div class="col-md-3 " id="container_tipo_cancer_pat">
    <label for="validationCustom02" class="form-label"> <strong>Tipo de cáncer</strong> </label>
    <div>`+respuesta[0].tipo_cancer_pe+`</div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom02" class="form-label"> <strong>¿Alguna enfermedad cronica?</strong> </label>
    <div>`+respuesta[0].enfermedad_cronica_pe+`</div>
  </div>




  <div class="col-md-3 " id="container_enfe_cronica_pat">
    <label for="validationCustom01" class="form-label"><strong>¿Cuales?</strong></label>
    <div class="container">
        <div class="row">
        <div class="form-check">
        `+diabetes_ecc+`
<label class="form-check-label" for="flexCheckDefault">
<strong>Diabetes</strong>
</label>
</div>
<div class="form-check">
`+hipertension_ecc+`
<label class="form-check-label" for="flexCheckChecked">

<strong>Hipertensión</strong>
</label>
</div>
<div class="form-check">
`+enf_renal_ecc+`
<label class="form-check-label" for="flexCheckChecked">

<strong>Enf. Renal</strong>
</label>
</div>
<div class="form-check">
`+cardiopatias_ecc+`
<label class="form-check-label" for="flexCheckChecked">

<strong>Cardiopatias</strong>
</label>
</div>
<div class="form-check">
`+obesidad+`
<label class="form-check-label" for="flexCheckChecked">

<strong>Obesidad</strong>
</label>
</div>
        </div>
    </div>
    <div>`+respuesta[0].otra+`</div>
  </div>
</form>
</li>

<li  class="list-group-item ">
<div class="d-flex w-100 justify-content-between">
<h6 class="mb-0 fw-semibold">Antecedentes Gineco-obstétricos</h6>

</div>

</li>

<li  class="list-group-item ">

<form class="row g-3 mb-3" >
<div class="col-md-2">
    <label for="validationCustom01" class="form-label"> <strong>Embarazos</strong> </label>
    <div>`+respuesta[0].embarazos+`</div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom02" class="form-label"> <strong>Partos</strong> </label>
    <div>`+respuesta[0].partos+`</div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom03" class="form-label"> <strong>Abortos </strong> </label>
    <div>`+respuesta[0].abortos+`</div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom01" class="form-label"> <strong>Cesareas </strong> </label>
    <div>`+respuesta[0].cesareas+`</div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom01" class="form-label"> <strong>Menarquia</strong> </label>
    <div>`+respuesta[0].menarquia+`</div>
  </div>
<div class="col-md-2">
    <label for="validationCustom01" class="form-label"> <strong>IVSA </strong> </label>
    <div>`+respuesta[0].ivsa+`</div>
  </div>

  <div class="col-md-2">
    <label for="validationCustom02" class="form-label"> <strong>Fecha del último PAP</strong> </label>
    <div>`+respuesta[0].ultimo_pap+`</div>
  </div>

  <div class="col-md-2 my-3">
    <label for="validationCustom05" class="form-label"
      > <strong>Vacunación por VPH</strong> </label
    >
    <div>`+respuesta[0].vacunacion_VPH+`</div>
  </div>

  <div class="col-md-2">
    <label for="validationCustom02" class="form-label"> <strong>Fecha del último parto</strong> </label>
    <div>`+respuesta[0].ultimo_parto+`</div>
  </div>




  <div class="col-md-2 my-3">
    <label for="validationCustom05" class="form-label"
      > <strong>Dio Pecho</strong> </label
    >
    <div>`+respuesta[0].dio_pecho+`</div>
  </div>

  <div class="col-md-2">
    <label for="validationCustom04" class="form-label"
      > <strong>Ultima menstruación</strong> </label>
      <div>`+respuesta[0].ultima_menstruacion+`</div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom01" class="form-label"> <strong>Menopausia</strong> </label>
    <div>`+respuesta[0].menopausia+`</div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom01" class="form-label"> <strong>Tabaquismo </strong> </label>
    <div>`+respuesta[0].tabaquismo+`</div>
  </div>

  <div class="col-md-2 my-3">
    <label for="validationCustom05" class="form-label"
      > <stong>Usa Anticonceptivos</stong> </label>
      <div>`+respuesta[0].anticonseptivos+`</div>
  </div>

  <div class="col-md-2 my-3">
    <label for="validationCustom05" class="form-label"
      > <strong>Usa Estrógenos</strong> </label>
      <div>`+respuesta[0].estrogenos+`</div>
  </div>

  <div class="col-md-2 my-3">
    <label for="validationCustom05" class="form-label"
      > <strong>Biopsia previa</strong> </label>
      <div>`+respuesta[0].biopsia_previa+`</div>
  </div>
  <div class="col-md-3 my-3" style="background-color: #F2F4F4;"  id="seleccionBiopsia">
  <label for="validationCustom05" class="form-label "
    > <strong>Fecha:</strong> </label>
    <div>`+respuesta[0].fecha_biopsia_gine+`</div>
<label for="validationCustom05" class="form-label my-3"
    > <strong>Resultado:</strong> </label>
    <div>`+respuesta[0].resultado_gine+`</div>
</div>
  <div class="col-md-3 my-3">
    <label for="validationCustom05" class="form-label"
      > <strong>¿Ha tenido quistes?</strong> </label>
      <div>`+respuesta[0].quistes+`</div>
  </div>
 
  <div class="col-md-3 my-3">
    <label for="validationCustom05" class="form-label"
      > <strong>¿Ha tenido Fifroadenoma?</strong> </label>
      <div>`+respuesta[0].fibroadenoma+`</div>
      </div>
  <div class="col-md-5 my-3">
    <label for="validationCustom05" class="form-label"
      > <strong>¿Ha tenido cáncer de mama?</strong> </label>
      <div>`+respuesta[0].cancer_mama+`</div>
  </div>


  <div class="col-md-12 my-3" id="container_tipo_cancer_pat">
    <label for="validationCustom02" class="form-label"> <strong>¿Motivo de su visita?</strong> </label>
    <div>`+respuesta[0].motivo_consultas+`</div>
  </div>
</div>
</form>
</li>



</div>



    <!-- boton final -->

</div>
`;

$('#cuerpo_historial').html(bootstrapDiv);
  }
})

        }
      )
     
      // var imcResult="";
      // var imctexto="";
      // var bmi;
      // var weight ;
      // var height;

      $("#examen_fisico").click(function() {
        var imgElement = document.createElement('img');
        var vulva = document.createElement('img');
        var trompa= document.createElement('img');
        var colpo = document.createElement('img');
        // Establecer el atributo src con los datos Base64 de la imagen
    
    
        const cedula1 = document.getElementById("cedula").value;

        const dato= {cedula:cedula1};
       
        $.ajax({
          type:"POST",
          contentType: 'application/json',
          url:"../php/evolucion_paciente/contenido_examen.php",
          dataType: 'json', 
          data:JSON.stringify(dato),
          success: function(respuesta){ 
       
            var info =`
            
            </div>


            <div class="row">

            <div class="col-md-2 text-center">
            <img src="../image/ancec.png" class="" height="160" >
            </div>
            <div class="col-md-8 text-center my-5">
            <div >
            <p class="mb-0" style="font-size:28px;
            font-family: Homer Simpson UI">Asociación Nacional contra el cáncer</p>
            <p style="font-size:28px;
            font-family: Homer Simpson UI">Capítulo de Santiago</p></div>
            <p style="font-size:18px;"> Informe del examen fisico</p>
            </div>
            <div class="col-md-2 text-center">
            
            </div>
            </div>`;




            for (var i = 0; i < respuesta.length; i++) {
              // weight = respuesta[i].peso
              // height = respuesta[i].talla
            
              // bmi = weight / (height * height);
              // imcResult.text(bmi.toFixed(1));
         
              //     console.log(bmi);
              imgElement.src = respuesta[i].img_mama;
              vulva.src =respuesta[i].img_cuerpo;
              trompa.src =respuesta[i].img_vagina;
              colpo.src=respuesta[i].img_colposcopia;
              // Añadir la imagen al documento (por ejemplo, al cuerpo)
     

              if (respuesta[i].noduloscol == "Si"){
         
              var nodulos = `   <table class="table">
              <thead>
                <tr> </tr>
              </thead>
              <tbody>
                <tr>
      
                  <td>
                    <!-- CUADRANTE -->
      
                    <label for="inputPassword" class="col-sm-4 col-form-label">Cuadrante: </label>
                  </td>
                  <td>
                  <span>`+respuesta[i].cuadrante+ `</span>
      
      
                  </td>
                </tr>
                <!-- RADIO -->
                <tr>
                  <td>
                    <label for="inputPassword" class="col-sm-4 col-form-label">Radio: </label>
                  </td>
                  <td>
                  <span>`+respuesta[i].radio+ `</span>
                  </td>
                </tr>
                <!-- TAMAÑO -->
                <tr>
                  <td> <label for="inputPassword" class="col-sm-4 col-form-label">Tamaño: </label></td>
            <td>
            <span>`+respuesta[i].tamano+ `</span>
                  </td>
                </tr>
                <!-- CONSISTENCIA -->
                <tr>
                  <td><label for="">Consistencia: </label></td>
                  <td><span>`+respuesta[i].consistencia+ `</span></td>
      
                </tr>
      
                <!-- ///////////////////////////////////////////// -->
                <!-- CICATRIZ  -->
                <!-- /////////////////////////////////////////////////// -->
                <tr>
                  <td> <label>Cicatriz por: </label> </td>
                  <td><span>`+respuesta[i].cicatriz+ `</span></td>
      
                </tr>
              </tbody>
            </table>`
         var diagrama= `  <div class="col-md-6 my-3">
         
      
    
         <div class="row g-2 my-2"  id="tetas"  >
         ${imgElement.outerHTML}
     </div>
     
         </div>
         </div>`      
              }
              else{
                var nodulos=" "
                var diagrama =" "
              }

           
 info += `

  <div class=" container">

  <div class="row" >

  <div class="row">
  <div class="col-auto">
  <strong>Doctor (a): </strong>
  </div>
  <div class="col-auto">
<div>`+respuesta[i].registro_examen_fisico+`</div>
  </div>
 
  <div class="col-auto">
<strong>Fecha del informe</strong>
</div>
<div class="col-auto">
<div>`+respuesta[i].fecha_examen_fisico+`</div>
  </div></div>

<div class="row" id="cuerpo">


  <!-- PARTE INACTIVA  -->
  <!-- ********************************************************************************************** -->
  <!-- ***************************  DATOS BIOMETRICOS  ******************************************* -->
  <!-- ******************************************************************************************* -->
  <!-- FORMULARIOS -->
  <form class="row my-1  ">
    <div class="section">
      <h6>Datos Biométricos</h6>
  
    </div>
    <div class="col-md-2">
      <label for="add_peso" class="form-label"><strong>Peso </strong></label>
      <div class="input-group">

        <span>`+respuesta[i].peso+ ` &nbsp </span>
        <span class="" id="peso">Kg</span>
      </div>


    </div>




    <div class="col-md-2">

      <label for="add_talla" class="form-label"><strong>Talla</strong></label>
      <div class="input-group">
      <span>`+respuesta[i].talla+ ` &nbsp </span>
        <span class="" id="talla">M</span>
      </div>

    </div>
    <div class="col-md-2">
      <label for="add_pa" class="form-label"> <strong>P/A</strong></label>


      <div class="input-group">
      <span>`+respuesta[i].presion+ ` &nbsp </span>
        <span class="" id="talla">mmHg</span>
      </div>
      
      
    </div>




    <div class="col-md-2 my-3">
      <label for="add_cintura" class="form-label"> <strong>Cintura</strong></label>


      <div class="input-group">
      <span>`+respuesta[i].cintura+ ` &nbsp </span>
        <span class="" id="talla">cm</span>
      </div>
    </div>
    
    <div class="col-md-2 my-3">
      <label for="add_cintura" class="form-label"><strong>Pulso</strong></label>
      <div class="input-group">
      <span>`+respuesta[i].pulso+ ` &nbsp </span>
        <span class="" id="talla">ppm</span>
      </div>
    </div>

    <div class="col-md-2 my-3">
      <label for="add_cintura" class="form-label"><strong>Frecuencia Cardiaca</strong></label>


      <div class="input-group">
      <span>`+respuesta[i].frecuencia + ` &nbsp </span>
        <span class="" id="talla">ppm</span>
      </div>
    </div>

    
    <div class="col-md-3">
      <div class="form-check">

      </div>
    </div>


  </form>


  <div class="col-md-12" style="background: #CDD1D1;">
    <h6>Examen físico de mamas</h6>

  </div>
  <div class="col-md-12 ">
    <!-- ********************************************************************************** -->
    <!-- **********************   MOTIVO  ************************************************* -->
    <!-- ********************************************************************************** -->

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Signos</th>
          <th scope="col" colspan="2" class="text-center">Hallazgo</th>

        </tr>
      </thead>
      <tbody>
        <tr style="text-align: center;" >
          <th scope="row" ></th>
          <td> <strong>Derecha</strong> </td>
          <td> <strong>Izquierda</strong> </td>

        </tr>
        <!-- /////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- TAMAÑO DE MAMA -->
        <!-- ///////////////////////////////////////////////////////////////////////////////////// -->

        <tr>
          <th scope="row">Tamaño de la mama</th>
          <td><span>`+respuesta[i].tamaño_mama_dere + ` </span></td>
          <td><span>`+respuesta[i].tamaño_mama_izq + ` </span></td>

        </tr>
        <!-- ///////////////////////////////////////////////////////////////////////// -->
        <!-- CONSISTENCIA -->
        <!-- ///////////////////////////////////////////////////////////////////////////////// -->

        <tr>
          <th scope="row">Consistencia</th>
          <td><span>`+respuesta[i].consistencia_dere + ` </span></td>
          <td><span>`+respuesta[i].consistencia_izq + ` </span></td>
        </tr>
        <!-- //////////////////////////////////////////////////////// -->
        <!-- PEZON  -->
        <!-- ///////////////////////////////////////////////////////////// -->
        <tr>
          <th scope="row">Pezón</th>
          <td><span>`+respuesta[i].pezon_dere + ` </span></td>
          <td><span>`+respuesta[i].pezon_izq + ` </span></td>
        </tr>
        <!-- /////////////////////////////////////////////////////// -->
        <!-- PIEL -->
        <!-- ///////////////////////////////////////////////////////////////// -->
        <tr>
          <th scope="row">Piel</th>
          <td><span>`+respuesta[i].piel_dere + ` </span></td>
          <td><span>`+respuesta[i].piel_izq + ` </span></td>
        </tr>
        <!-- ////////////////////////////////////////////////////////////// -->
        <!-- AXILA -->
        <!-- ////////////////////////////////////////////////////////////////////////// -->
        <tr>
          <th scope="row">Axila</th>
          <td><span>`+respuesta[i].axila_derecha + ` </span></td>
          <td><span>`+respuesta[i].axila_izq + ` </span></td>
        </tr>


        <tr>
          <th scope="row">Protesis </th>
          <td><span>`+respuesta[i].protesis_dere + ` </span></td>
          <td><span>`+respuesta[i].protesis_izq + ` </span></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- *****************************************************************************************************-->
  <!-- *************************************  FIN DEL TABLE ************************************************-->
  <!-- ***************************************************************************************************** -->
  <div class="col-md-4 my-3">
    <label for=""> <strong>Tiene nódulo</strong> </label>
  
  </div>

  <!-- ************************************************************************************************ *****-->
  <!-- *************************************** NODULO *******************************************************  -->
  <!-- ******************************************************************************************************* -->
  <div class="row my-3" id="informacion_nodulo">

    <div class="col-md-5">
      <label for="validationCustomUsername" class="form-label"><strong>Nódulo</strong></label>
      <span>`+respuesta[i].noduloscol+ `</span>
   `+nodulos+`
    </div>
    <!-- ******************************************************************** -->
    <!-- ******************** DIAGRAMA ************************************ -->
    <!-- ****************************************************************** -->
    `+diagrama+`
  </div>

  




  <div class="col-md-12 my-1"  style="background: #CDD1D1;" >
    <span>
      <h6>Examen Ginecológico</h6>
    </span>
    
  </div>
  <div class="col-md-12 my-3">
    <div class="row my-3">
      <div class="col-md-8">
      <div class="row g-2 my-2">
        <h6><strong>VULVA</strong></h6>
        <span>`+respuesta[i].vulva+ `</span>
      </div>
      <div class="row g-2 my-2">
        <h6><strong>VAGINA</strong></h6>
        <span>`+respuesta[i].vagina+ `</span>
      </div>
                    
      
      <div class="row g-2 my-2">
<div class="col-md">
<h6><strong>CUELLO</strong></h6>
</div>
<div class="col-md">
<div class="col-sm-12">
<span>FROTIS</span>
</div>
<div class="col-sm-12">
<span>`+respuesta[i].protis+ `</span>

</div>
</div>
<div class="col-md">
<div class="col-sm-12">
<span>PAP</span>
</div>
<div class="col-sm-12">

<span>`+respuesta[i].pap+ `</span>
</div>
</div>
<div class="col-md">
<div class="col-sm-12">
<span>I.V.A.A</span>
</div>
<div class="col-sm-12">
<span>`+respuesta[i].ivaa+ `</span>

</div>
</div>


<div class="col-md">
<div class="col-sm-12">
<span>SHILLER</span>
</div>
<div class="col-sm-12">

<span>`+respuesta[i].ochiller+ `</span>
</div>
</div>
<div class="col-md">
<div class="col-sm-12">
<span>BIOPSIA</span>
</div>
<div class="col-sm-12">
<span>`+respuesta[i].Biopsia+ `</span>

</div>
</div>
<div class="col-md">
<div class="col-sm-12">
<span>COLPOSCOPIA</span>
</div>
<div class="col-sm-12">
<span>`+respuesta[i].colposcopia+ `</span>

</div>
</div>

</div>
      </div>

      <div class="col-md-4"  >

<div class="row">

    
  
<img src="${vulva.src}" class="img-fluid" alt="">
      </div>
           


 
      </div>
  </div>
  <div class="row my-3">
    <div class="col-md-6">
    <div class="row g-2 my-2">
      <h6><strong>CUERPO</strong></h6>
      <span>`+respuesta[i].cuerpo+ `</span>
    </div>
    <div class="row g-2 my-2">
      <h6><strong>ANEXOS Y PARAMETROS</strong></h6>
      <span>`+respuesta[i].anexos+ `</span>
    </div>
                  
     </div>
     <div class="col-md-6"  >

<div class="row">

 
<img src="${trompa.src}" class="img-fluid" alt="">
    </div>
    </div>


    
</div>









  </div>

<div></div>
  <div class="container mt-5" id="funcion_citologia" >
   <div class="row">
   <div class="col-md-7">   
    <div class="row ">
      <div class="col-md-5 text-center"><strong>HALLAZGO</strong></div>
      <div class="col-md-2 text-center"><strong>SIGLA</strong></div>
      <div class="col-md-5 text-center"><strong>DIBUJO</strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>ESCAMOSO</strong></div>
      <div class="col-md-2 border text-center"><strong>0 </strong></div>
      <div class="col-md-5 border"><strong></strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>ECTTOPIA</strong></div>
      <div class="col-md-2 border text-center"><strong>E</strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/E.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>U. ESCAMO CEULAR VISIBLE</strong></div>
      <div class="col-md-2 border text-center"><strong>U </strong></div>
      <div class="col-md-5 border"><strong></strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border "><strong>COLPITIS CONDILOMATOSA</strong></div>
      <div class="col-md-2 border text-center"><strong>CC </strong></div>
      <div class="col-md-5 border"><strong></strong></div>
    </div>
    <div class="row my-1">
      <div class="col-md-5 border"><strong>EPITELIO BLANCO</strong></div>
      <div class="col-md-2 border text-center"><strong>EB </strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/EB.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border "><strong>PUNTEADO</strong></div>
      <div class="col-md-2  border text-center"><strong>P </strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/P.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border"><strong>MOSAICO</strong></div>
      <div class="col-md-2 border text-center"><strong>M</strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/M.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border" ><strong>LEUCOPLASIA</strong></div>
      <div class="col-md-2  border text-center"><strong>L </strong></div>
      <div class="col-md-5 border "><img src="../image/tramas/L.png" class="img-fluid" alt="..."></div>
    </div>
    <div class="row my-3">
      <div class="col-md-5 border" ><strong>ORIFICIOS GLANDULARES COR.</strong></div>
      <div class="col-md-2 border "><strong>OGC </strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/OGC.png" class="img-fluid" alt="..."></div>
     
    </div>
    <div class="row my-3 border ">
      <div class="col-md-5 border" ><strong>VASOS ATÍPICOS</strong></div>
      <div class="col-md-2 border"><strong>VA</strong></div>
      <div class="col-md-5 border"><img src="../image/tramas/VA.png" class="img-fluid" alt="..."></div>
    
    </div>
    <div class="row my-3">
      <div class="col-md-5 border" ><strong>TEST DE SHILLER</strong></div>
      <div class="col-md-2 border"><strong>YODO</strong></div>
      <div class="col-md-5 border text-center"><strong> + / -</strong></div>
   
    </div>
 </div>
   <div class="col-md-5">
   <div class="row">


          <div class="row g-2 my-2"  >
          <img src="${colpo.src}" class="img-fluid" alt="">
</div>
          </div>
   </div>
   </div>
   <div class="col-sm-12">
   <h6><strong>DIAGNOSTICO</strong></h6>
   <span>`+respuesta[i].descripcion+ `</span>
</div>
    </div>




  <div class="col-md-12 " style="background: #CDD1D1;" >
    <span>
      <h6> Estudio de Gabinete</h6>
    </span>
 
  </div>
    <div class="col-md-6">
 
      <div class="row g-3">
        <!-- //////////////////////////////// -->
        <!-- ULTRASONIDOS -->
        <!-- ////////////////////////////////////// -->
        <div class="col-md-3 my-3">
          <label for="">Ultrasonidos</label>
          <span>`+respuesta[i].ultrasonidos+ `</span>
        </div>
        <div class="col-md-4 " id="add_fecha_ul">
          <label for="">Fecha</label>
          <span>`+respuesta[i].fecha_ultra+ `</span>
        </div>

        <div class="col-md-5 " id="add_reporte_ul">
          <label for="">Reporte</label>
          <span>`+respuesta[i].reporte_ultra+ `</span>
        </div>
      </div>


      <!-- *************************************************************************-->
      <!-- ***********************  MAMOGRAFIA ************************************* -->
      <!-- ************************************************************************-->


      <div class="row g-3">
        
        <div class="col-md-3 my-3">
          <label for="">Mamografía</label>
          <span>`+respuesta[i].mamografia+ `</span>
       
        </div>
        <div class="col-md-4 " id="add_fecha_ma">
          <label for="">Fecha</label>
          <span>`+respuesta[i].fecha_mamografia+ `</span>
         
        </div>
        
        <div class="col-md-5 " id="add_reporte_ma">
          <label for="">Reporte</label>
          <span>`+respuesta[i].reporte_mamografia+ `</span>

        </div>
      </div>
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
      <!-- ///////////////////////////   BIOPSIA ///////////////////////////////////////////-->
      <!-- ///////////////////////////////////////////////////////////////////////////////// -->
      <div class="row g-3">
        
        <div class="col-md-3 my-3">
          <label for="">Biopsia</label>
          <span>`+respuesta[i].biopsia+ `</span>
       
        </div>
        <div class="col-md-4 " id="add_fecha_bi">
          <label for="">Fecha</label>
          <span>`+respuesta[i].fecha_biopsia+ `</span>
        </div>
        
        <div class="col-md-5 " id="add_reporte_bi">
          <label for="">Reporte</label>
          <span>`+respuesta[i].reporte_biopsia+ `</span>
        </div>
      </div>
    </div>

 


  <!-- ************************************************************************************************ ********* -->
  <!-- *************************** DIAGNOSTICO CLINICO *********************************************************  -->
  <!-- ********************************************************************************************************* -->
  
  <div class="row my-3">
    <div class="col-md-6">
      <label for="validationCustomUsername" class="form-label">
        <strong>Diagnóstico Clínico</strong>
      </label>
   
    
  

    <!-- MAMAS NORMALES -->

    <div class="row g-3">
      <div class="col-md-6"><label for="">Mamas normales</label></div>
    <div class="col-md-6" >
    <span>`+respuesta[i].mamas_normales+ `</span>


    </div>
    </div>
       
<!-- ABCESO -->

<div class="row g-3">
      <div class="col-md-6"><label for="">Abceso</label></div>
    <div class="col-md-6" >
    <span>`+respuesta[i].abceso+ `</span>


    </div>
    </div>

<!-- INFLAMATORIO HORMONAL -->


<div class="row g-3">
      <div class="col-md-6"><label for="">Inflamatorio / Hormonal</label></div>
    <div class="col-md-6" >
    <span>`+respuesta[i].inflamatorio+ `</span>


    </div>
    </div>


<!-- BENIGNO -->



<div class="row g-3">
      <div class="col-md-6"><label for=""> Nódulo Benigno</label></div>
    <div class="col-md-6" >
    <span>`+respuesta[i].nodulo_benigno+ `</span>


    </div>
    </div>
     
<!-- ******************************************************************************* -->
<!-- *************************** NODULO SOSPECHOSO  ********************************** -->
<!-- ******************************************************************************** -->


<div class="row g-3">
      <div class="col-md-6"><label for=""> Nódulo sospechoso</label></div>
    <div class="col-md-6" >
    <span>`+respuesta[i].nodulo_sospechoso+ `</span>
    </div>
    </div>
    
    <div class="row g-3">
      <div class="col-md-6"><label for=""> Diagnóstico ginecológico</label></div>
    <div class="col-md-6" >
    <span>`+respuesta[i].diagnostico_ginecologico+ `</span>
    </div>
    </div>
    <div class="row g-3">
      <div class="col-md-6"><label for=""> Otros Diagnósticos (PAP)</label></div>
    <div class="col-md-6" >
    <span>`+respuesta[i].otros_diagnosticos+ `</span>
    </div>
    </div>


    </div>




    <div class="col-md-6">
      <label for="validationCustomUsername" class="form-label">
      <svg id="impre_diagnostica_op" width="25" height="25" fill="#002afa" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path id="diag" d="M12 2.25c-5.376 0-9.75 4.374-9.75 9.75s4.374 9.75 9.75 9.75 9.75-4.374 9.75-9.75S17.376 2.25 12 2.25Zm4.5 10.5h-3.75v3.75h-1.5v-3.75H7.5v-1.5h3.75V7.5h1.5v3.75h3.75v1.5Z"></path>
</svg>
 
        <strong>Impresión diagnóstica</strong></label>
    <!-- IMPRESION DIAGNOSTICO -->
    <div class="row g-3 " id="opcion_impresion" >
   
    <div class="col-md-6 ">
          <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="quera_seba" name="quera_seba"
              ${respuesta[i].queretosis_seborreica === 1 ? 'checked' : ''}>
              <label class="form-check-label" for="flexCheckDefault">
                  Queratosis Sebarréica
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="quera_act" name="quera_act" 
              ${respuesta[i].queratosis_actinica === 1 ? 'checked' : ''}>
              <label class="form-check-label" for="flexCheckChecked">
                  Queratosis Actínica
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="carci_baso" name="carci_baso"
              ${respuesta[i].carcinoma_basocelular === 1 ? 'checked' : ''}>
              <label class="form-check-label" for="flexCheckDefault">
                  Carcinoma Basocelular
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="carci_esca" name="carci_esca" ${respuesta[i].celulas_escamosas === 1 ? 'checked' : ''}>
              <label class="form-check-label" for="flexCheckChecked">
                  Carcinoma de células escamosas
              </label>
            </div>

        </div>

        
        <div class="col-md-4  mb-5">
          <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="lunar_disp" name="lunar_disp"
              ${respuesta[i].lunar_diplastico === 1 ? 'checked' : ''}> 
              <label class="form-check-label" for="flexCheckDefault">
                  Lunar Displástico
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="lunar_conge" name="lunar_conge"
              ${respuesta[i].lunar_congenito === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                  Lunar Congénito
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="pterigion" name="pteri" 
              ${respuesta[i].pterigion === 1 ? 'checked' : ''}>
              <label class="form-check-label" for="flexCheckDefault">
                  Pterigion
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="melanoma" name="melanoma"
              ${respuesta[i].melanoma === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                  Melanoma
              </label>
            </div>

        </div>
        </div>
 
        <!-- CANCER DE MAMAA -->
        <!-- OTROS DIAGNOSTICOS MAS  -->
        <div class="col-md-6">
        <label for="validationCustomUsername" class="form-label">
        <svg id="cancer_mama_op" width="25" height="25" fill="#002afa" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path id="path_mama" d="M12 2.25c-5.376 0-9.75 4.374-9.75 9.75s4.374 9.75 9.75 9.75 9.75-4.374 9.75-9.75S17.376 2.25 12 2.25Zm4.5 10.5h-3.75v3.75h-1.5v-3.75H7.5v-1.5h3.75V7.5h1.5v3.75h3.75v1.5Z"></path>
</svg>


  
        <strong>Cáncer de mama</strong></label>
    <!-- IMPRESION DIAGNOSTICO -->
    </div>

    <div class="row g-3 " id="opciones_cancer_mama" >
   
    <div class="col-md-6 ">
          <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_ductal_insito" name="add_ductal_insito"
              ${respuesta[i].car_duc_in=== 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckDefault">
                  Carcinoma ductal in sito
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_ductal_invasivo" name="add_ductal_invasivo"  ${respuesta[i].car_duc_invasivo === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                  Carcinoma ductal invasivo
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_mama_medular" name="add_mama_medular" 
              ${respuesta[i].car_medu === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckDefault">
                  Carcinoma mama medular
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_mama_coloide" name="add_mama_coloide" 
              ${respuesta[i].coloide === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                  Carcinoma mama coloide
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_mama_tubular" name="add_mama_tubular"
              ${respuesta[i].tubular === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                  Carcinoma mama tubular
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_mama_papilar" name="add_mama_papilar" 
              ${respuesta[i].tapilar === 1 ? 'checked' : ''} > 
              <label class="form-check-label" for="flexCheckDefault">
                  Carcinoma mama Papilar
              </label>
            </div>
        </div>

        
        <div class="col-md-6 ">
      
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_labulillar_insito" name="add_labulillar_insito" ${respuesta[i].lobu_insita === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                  Car. Lobulillar in sito
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_lobulillar_invasivo" name="add_lobulillar_invasivo" ${respuesta[i].lobu_invasivo === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckDefault">
                  Car. Lobulillar invasivo
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_mama_inflamatorio" name="add_mama_inflamatorio" ${respuesta[i].inflamatorio === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                 Cán. mama Inflamatorio
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_cancer_recurrente" name="add_cancer_recurrente" ${respuesta[i].recurrente === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                  Cáncer de mama recurrente
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_mama_masculino" name="add_mama_masculino" 
              ${respuesta[i].masculino === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                  Cáncer de mama Maculino
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_piaget" name="add_piaget" 
              ${respuesta[i].piaget === 1 ? 'checked' : ''} >
              <label class="form-check-label" for="flexCheckChecked">
                  Enf. de Piaget Mamaria
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="add_metastasico" name="add_metastasico"
              ${respuesta[i].metastasico === 1 ? 'checked' : ''}  >
              <label class="form-check-label" for="flexCheckChecked">
                  Metastasico
              </label>
            </div>
        </div>
        </div>
        </div>
      </div>
  

  <div class="row g-3">
    <div class="col-md-6">
    <label for="">Recomendación</label>
    <span>`+respuesta[i].recomendacion+ `</span>
    </div>
    <div class="col-md-4">
      <label for="">Referia a:</label>
      <span>`+respuesta[i].referir_a+ `</span>
    </div>
  </div>
    </div>



    </div>
</div>
<span> </span>
<span> </span>
<br>
<br>
  `;
}
            $('#cuerpo_examen').html(info);
 
  }
  })
  
          }
        )
        var datos_histo
        $("#historial_evolucion").click(function() {
     
          // Establecer el atributo src con los datos Base64 de la imagen
      
      
          const cedula1 = document.getElementById("cedula").value;
  
          const dato= {cedula:cedula1};
         
          $.ajax({
            type:"POST",
            contentType: 'application/json',
            url:"../php/evolucion_paciente/contenido_evolucion.php",
            dataType: 'json', 
            data:JSON.stringify(dato),
            success: function(respuesta){ 
              var suma
              var total
    //           <div class="col-md-12 text-end" style="background:#528FD5">
    //           <div class="container">   <span style="color:#EAEAEA" >Descargar Archivo en formato pdf</span>
    //           <svg width="25" height="25" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    // <path d="M22.158 8.883c-.739-.469-1.698-.787-2.747-.916-.311-1.833-1.135-3.4-2.403-4.56C15.663 2.178 13.885 1.5 12 1.5c-1.657 0-3.188.52-4.424 1.5a7.017 7.017 0 0 0-2.123 2.832c-1.437.203-2.671.685-3.595 1.406C.642 8.195 0 9.542 0 11.138 0 14.296 2.621 16.5 6.375 16.5h4.875V9.75h1.5v6.75h5.813c3.405 0 5.437-1.605 5.437-4.294 0-1.408-.637-2.558-1.842-3.323Z"></path>
    // <path d="M11.25 19.66 9 17.39l-1.06 1.08L12 22.5l4.061-4.031-1.06-1.078-2.25 2.27V16.5h-1.5v3.16Z"></path>
    // </svg></div>
              // console.log(respuesta.length);
              datos_histo =`
            
              </div>


              <div class="row">

              <div class="col-md-2 text-center">
              <img src="../image/ancec.png" class="" height="160" >
              </div>
              <div class="col-md-8 text-center my-5">
              <div >
              <p class="mb-0" style="font-size:28px;
              font-family: Homer Simpson UI">Asociación Nacional contra el cáncer</p>
              <p style="font-size:28px;
              font-family: Homer Simpson UI">Capítulo de Santiago</p></div>
              <p style="font-size:18px;"> Informe del historial de evolución</p>
              </div>
              <div class="col-md-2 text-center">
              
              </div>
              </div>`;
              for (var i = 0; i < respuesta.length; i++) {
                suma = i + 1;
                total = respuesta.length +1
                datos_histo += `
              <div class="col-md-12" style="background: #CDD1D1;">
              pagina `+ suma +` de `+ respuesta.length +` 
              </div>
              <div class="row">
              <div class="col-md-6">
              <strong>Doctor:</strong>
              <strong><span>`+respuesta[i].medico+ `</span></strong>
              </div>
              <div class="col-md-6">
              <strong>Fecha de informe:</strong>
              <strong><span>`+respuesta[i].fecha_informe+ `</span></strong>
              </div>
              </div>
              <div class="row" id="cuerpo">


              <!-- PARTE INACTIVA  -->
           
           
              <!-- FORMULARIOS -->
              <form class="row g-3 needs-validation" novalidate>
                <div class="col-md-2">
                  <label for="validationCustom01" class="form-label"> <strong>Peso:</strong> </label>
                  <span>`+respuesta[i].peso+ `&nbsp</span>
                
                </div>
                <div class="col-md-2">
                  <label for="validationCustom02" class="form-label"> <strong>Talla: </strong> </label>
                  <span>`+respuesta[i].talla+ ` &nbsp</span>
                </div>
                <div class="col-md-2">
                  <label for="validationCustom02" class="form-label"> <strong>P/A: </strong></label>
                  <span>`+respuesta[i]['p/a']+` &nbsp</span>
                </div>
              
      
      
      
                <div class="col-md-2">
                  <label for="validationCustom01" class="form-label"><strong>Pulso</strong></label>
                  <span>`+respuesta[i].pulso+ `&nbsp</span>
                </div>
                <div class="col-md-2">
                  <label for="validationCustom01" class="form-label"><strong>Frec. Cardiaca: </strong></label>
                  <span>`+respuesta[i].frecuencia_cardiaca+ `&nbsp</span>
                </div>
                <div class="col-md-2">
                  <label for="validationCustom01" class="form-label"><strong>Temperatura: </strong></label>
                  <span>`+respuesta[i].temperatura+ `&nbsp</span>
                </div>
              </form>
      
      
            
              <div class="row">
              <div class="col-12 ">
                <label for="validationCustomUsername" class="form-label"><strong>Hallazgo</strong></label>
              </div>
              <div class="col-12 my-3">
              <span>`+respuesta[i].hallazgo+ `</span>
            </div>
              </div>
              <div class="col-12 ">
                <label for="validationCustomUsername" class="form-label"
                  ><strong>Tratamiento</strong></label
                >
              </div>
              <div class="col-12 my-3">
              <span>`+respuesta[i].tratamiento+ `</span>
            </div>
        
              <div class="col-12">
                <label for="validationCustomUsername" class="form-label"
                  ><strong>Recomendación</strong></label
                >
               
              </div>
              <div class="col-12 my-3">
              <span>`+respuesta[i].recomendacion+ `</span>
            </div>
      
              `;
            
              }
              $('#cuerpo_evolucion').html(datos_histo);
            }
          })
        })
       


        document.addEventListener("DOMContentLoaded",()=>{
          const $boton = document.querySelector("#btn-pdf");
          $boton.addEventListener("click", () => {
          
              const $elemento = document.querySelector("#cuerpo_evolucion");
              html2pdf()
              .set({
                  margin:1,
                  filename: 'Evolucion.pdf',
                  imagen:{
                      type:'jpeg',
                      quality:0.98
                  },
                  html2canvas:{
                      scale:3,
                      letteRendering:true,
                  },
                  jsPDF:{
                      unit:'cm',
                      format:"a3",
                      orientation:'portrait',
                      marginTop: 1,
                  }
              })
              .from($elemento)
              .save()
              .catch(err=>console.log(err));
          })
      
      
      })


      document.addEventListener("DOMContentLoaded",()=>{
        const $boton = document.querySelector("#btn-pdf_examen");
        $boton.addEventListener("click", () => {
        
            const $elemento = document.querySelector("#cuerpo_examen");
            html2pdf()
            .set({
                margin:1,
                filename: 'Evolucion.pdf',
                imagen:{
                    type:'jpeg',
                    quality:0.98
                },
                html2canvas:{
                    scale:3,
                    letteRendering:true,
                },
                jsPDF:{
                    unit:'cm',
                    format:"a3",
                    orientation:'portrait',
                    marginTop: 1,
                }
            })
            .from($elemento)
            .save()
            .catch(err=>console.log(err));
        })
    
    
    })


    document.addEventListener("DOMContentLoaded",()=>{
      const $boton = document.querySelector("#btn-pdf_historial");
      $boton.addEventListener("click", () => {
      
          const $elemento = document.querySelector("#cuerpo_historial");
          html2pdf()
          .set({
              margin:1,
              filename: 'Evolucion.pdf',
              imagen:{
                  type:'jpeg',
                  quality:0.98
              },
              html2canvas:{
                  scale:3,
                  letteRendering:true,
              },
              jsPDF:{
                  unit:'cm',
                  format:"a3",
                  orientation:'portrait',
                  marginTop: 1,
              }
          })
          .from($elemento)
          .save()
          .catch(err=>console.log(err));
      })
  
  
  })