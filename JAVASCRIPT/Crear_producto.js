
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
  });











