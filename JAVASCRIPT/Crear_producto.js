
    function openModal() {
        document.getElementById("modalOverlay").style.display = "block";
        document.getElementById("myModal").style.display = "block";
    }
    
    function closeModal() {
        document.getElementById("modalOverlay").style.display = "none";
        document.getElementById("myModal").style.display = "none";
    }

    function openModal2() {
      document.getElementById("modalOverlay2").style.display = "block";
      document.getElementById("myModal2").style.display = "block";
  }
  
  function closeModal2() {
      document.getElementById("modalOverlay2").style.display = "none";
      document.getElementById("myModal2").style.display = "none";
  }

  function openModal3() {
    document.getElementById("modalOverlay3").style.display = "block";
    document.getElementById("myModal3").style.display = "block";
}

function closeModal3() {
    document.getElementById("modalOverlay3").style.display = "none";
    document.getElementById("myModal3").style.display = "none";
}


function esconderproductos() {
 
  document.getElementById("mydiv").style.display = "none";

}


    document.addEventListener("DOMContentLoaded", function() {
    });   

    window.onload = function() {
    // Verificar si hay un mensaje de éxito en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const successMessage = urlParams.get('success_message');

    if (successMessage) {
        // Mostrar una alerta con el mensaje de éxito
        alert(successMessage);
    }
    }


$(document).ready(function () {
    //Display de la tabla
    const action = "busquedatal";
    var datacontact = "";
    $.ajax({
      url: "../PHP/OBTENER_PRODUCTOS_PERFIL.php",
      type: "POST",
      async: true,
      data: {
        action_c: action,
      },
      beforeSend: function () { },
      success: function (response) {
        //console.log(response);
  
        if (response == "notData") {
          alert("Ups! Aguarda Al futuro de la Educacion");
        } else {
          const info = JSON.parse(response);
          //console.log(info);
          datacontact = info;
          jsonLength = datacontact.length;
          for (let i = 0; i < jsonLength; i++) {
            var html = "";

        
    
        html +=  `   <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">`;
        html +=  `         <div class="card-header">`+ datacontact[i].NOMBRE +`</div>`;
        html +=  `             <div class="card-body">`;
        html +=  `                   <form method="POST" action="../PHP/EDITAR_PRODUCTO.php" enctype="multipart/form-data">`;
        html +=  `                    <h5 name="nombre" class="card-title">`+ datacontact[i].DESCRIPCION +`</h5>`;
        html +=  `                    <input name="id" type="hidden" value="` + datacontact[i].ID_PRODUCTO + `">`;
        html +=  `                    <button class="btn btn-primary" >Editar</button>`;
        html +=  `                      </form>`;
        html +=  `                </div>`;
        html +=  `            </div>`;
      
     
        
         
            $("#photos").append(html);
          }
  
        }
      },
      error: function (error) {
        console.log(error);
      },
    });






    const action2 = "busquedatal2";
    var datacontact2 = "";
    $.ajax({
      url: "../PHP/OBTENER_LISTAS_PERFIL.php",
      type: "POST",
      async: true,
      data: {
        action_c2: action2,
      },
      beforeSend: function () { },
      success: function (response2) {
        //console.log(response);
  
        if (response2 == "notData") {
          alert("Ups! Aguarda Al futuro de la Educacion");
        } else {
          const info2 = JSON.parse(response2);
          //console.log(info);
          datacontact2 = info2;
          jsonLength2 = datacontact2.length;
          for (let j = 0; j < jsonLength2; j++) {
            var html2 = "";

        

        html2 +=  `               <form method="POST" action="../PHP/INFO_LISTA.php"`;
        html2 +=  `            <div class="card">  `;
        html2 +=  `           <div class="card-header">`;
        html2 +=  `                 <div class="card-body">`;
        html2 +=  `                      <h5 class="card-title" >` + datacontact2[j].NOMBRE_LISTA +` </h5>`;
        html2 +=  `                   <p class="card-text ">` + datacontact2[j].DESCRIPCION +`</p>`;
        html2 +=  `                    <input name="idlista" type="hidden" value="` + datacontact2[j].ID_LISTA + `">`;
        html2 +=  `                    <input name="nombrelista" type="hidden" value="` + datacontact2[j].NOMBRE_LISTA + `">`;
        html2 +=  `                    <input name="descripcionlista" type="hidden" value="` + datacontact2[j].DESCRIPCION + `">`;
        html2 +=  `                    <input type="submit" class="btn btn-primary" value="Ver Contenido">`;
        html2 +=  `                </div>`;
        html2 +=  `            </div>`;
        html2 +=  `            </form`;
      
     
        
         
            $("#photos2").append(html2);
          }
  
        }
      },
      error: function (error) {
        console.log(error);
      },
    });


  });
















