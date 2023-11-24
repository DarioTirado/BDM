
$.ajax({
    url: "../PHP/REPORTE_VENTAS.php",
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
                                    <h5 name="nombre" class="card-title"> NOMBRE: ${datacontact[i].NOMBRE}</h5>
                                    <p name="Total Por la Compra:" class="card-text">PRECIO UNITARIO: ${datacontact[i].PRECIO}$</p>
                                    <p name="Subtotal Por la Compra:" class="card-text">DESCRIPCION: ${datacontact[i].DESCRIPCION}</p>
                                    <p name="Estado De La compra:" class="card-text">EXISTENCIAS ACTUALES: ${datacontact[i].CANTIDAD}</p>
                                    <p name="descripcion De La Compra" class="card-text">UNIDADES VENDIDAS: ${datacontact[i].CANTIDAD_VENDIDOS}</p> 
                                    <p name="descripcion De La Compra" class="card-text">GANANCIAS: ${datacontact[i].CANTIDAD_VENDIDOS * datacontact[i].PRECIO} $</p>                             
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














