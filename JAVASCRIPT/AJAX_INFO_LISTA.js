$(document).ready(function () {
var action = document.getElementById("IDLISTA").value;;

     

const action2 = "busquedatal";
var datacontact2 = "";
$.ajax({
  url: "../PHP/OBTENER_PRODUCTOS_LISTA.php",
  type: "POST",
  async: true,
  data: {
    action_c2: action2,
    action_c: action,
  },
  beforeSend: function () { },
  success: function (response2) {
    console.log(response2);

    if (response2 == "notData") {
      alert("Ups! Aguarda Al futuro de la Educacion");
    } else {
      const info2 = JSON.parse(response2);
      //console.log(info);
      datacontact2 = info2;
      jsonLength2 = datacontact2.length;
      for (let i = 0; i < jsonLength2; i++) {
        var html = `
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="../PHP/INFO_PRODUCTO.php" enctype="multipart/form-data">
                        <h5 name="nombre" class="card-title">${datacontact2[i].NOMBRE}</h5>
                        <p name="precio" class="card-text">Precio: ${datacontact2[i].PRECIO_PROD}$</p>
                        <p name="descripcion" class="card-text">Descripcion: ${datacontact2[i].DESCRIPCION_PRODUCTO}</p>
                        <input name="id" type="hidden" value="${datacontact2[i].ID_PRODUCTO}">         
                    </form>
                </div>
            </div>
        </div>`;
      
        $("#pedidos").append(html);
      }

    }
  },
  error: function (error) {
    console.log(error);
  },
});
}
);

   



























