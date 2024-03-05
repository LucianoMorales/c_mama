document.addEventListener("DOMContentLoaded",()=>{
    const $boton = document.querySelector("#btn-pdf");
    $boton.addEventListener("click", () => {
       
        const $elemento = document.querySelector("#todo");
        html2pdf()
        .set({
            margin:1,
            filename: 'paciente.pdf',
            imagen:{
                type:'jpeg',
                quality:0.98
            },
            html2canvas:{
                scale:3,
                letteRendering:true,
            },
            jsPDF:{
                unit:'in',
                format:"a3",
                orientation:'portrait',
               
            }
        })
        .from($elemento)
        .save()
        .catch(err=>console.log(err));
    })
})