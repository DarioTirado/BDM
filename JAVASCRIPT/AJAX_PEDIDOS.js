

$.ajax({
    url: "../PHP/OBTENER_PEDIDOS.php",
    type: "POST",
    async: true,
    data: { action_c: "busquedatal" },
    beforeSend: function () { },
    success: function (response) {
        if (response == "notData") {
            alert("Ups! Aguarda Al futuro de la Educacion");
        } else {
            const info = JSON.parse(response);
            datacontact = info;
            jsonLength = datacontact.length;
            for (let i = 0; i < jsonLength; i++) {
                var html = `
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">     
                                    <h5 name="nombre" class="card-title"> Identificador: ${datacontact[i].RANID}</h5>
                                    <p name="Total Por la Compra:" class="card-text">Total Por la Compra: ${datacontact[i].TOTAL}$</p>
                                    <p name="Subtotal Por la Compra:" class="card-text">Subtotal Por la Compra: ${datacontact[i].SUBTOTAL}</p>
                                    <p name="Estado De La compra:" class="card-text">Estado De La compra: ${datacontact[i].ESTADO}</p>
                                    <p name="descripcion De La Compra" class="card-text">Descripcion De La Compra: ${datacontact[i].PRODUCTOS}</p>                            
                            </div>
                        </div>
                    </div>`;
                $("#list-container").append(html);
            }
        }
    },
    error: function (error) {
        console.log(error);
    },
});





















