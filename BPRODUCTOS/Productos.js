$(document).ready(function () {
    // Manejar el envío del formulario de búsqueda
    $("#busquedaForm").submit(function (event) {
        event.preventDefault();
        realizarBusqueda();
    });

    // Cargar todos los productos al cargar la página
    cargarTodosProductos();
});

function cargarTodosProductos() {
    $.ajax({
        url: "../PHP/OBTENER_PRODUCTOS2.php",
        type: "POST",
        data: {
            action_c: "busquedatal"
        },
        dataType: "json",
        success: function (response) {
            mostrarProductos(response.data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function realizarBusqueda() {
    const nombre = $("#nombre").val();

    console.log("Nombre:", nombre);

    $.ajax({
        url: "../PHP/OBTENER_PRODUCTOS2.php",
        type: "POST",
        data: {
            action_c: "busquedatal",
            nombre: nombre
        },
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                mostrarProductos(response.data);
            } else if (response.status === 'no_results') {
                // Mostrar un mensaje cuando no hay resultados
                const noResultsMessage = `<p>${response.message}</p>`;
                $("#list-container").html(noResultsMessage);
            } else {
                // Manejar otros casos de error
                console.log(response.message);
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}


function mostrarProductos(productos) {
    const listContainer = $("#list-container");
    listContainer.empty();

    if (productos.length === 0) {
        const noResultsMessage = `<p>No se encontraron resultados.</p>`;
        listContainer.append(noResultsMessage);
    } else {
        productos.forEach(producto => {
            const html = `
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" action="../PHP/INFO_PRODUCTO.php" enctype="multipart/form-data">
                                <h5 name="nombre" class="card-title">${producto.NOMBRE}</h5>
                                <p name="precio" class="card-text">Precio: ${producto.PRECIO}$</p>
                                <p name="descripcion" class="card-text">Descripción: ${producto.DESCRIPCION}</p>
                                <input name="id" type="hidden" value="${producto.ID_PRODUCTO}">
                                <input type="submit" value="Ver Producto" class="btn btn-primary">
                                <a href="#" class="btn btn-primary" onclick="agregarAlCarrito(${producto.ID_PRODUCTO})">Agregar A Carrito</a>
                            </form>
                        </div>
                    </div>
                </div>`;
            listContainer.append(html);
        });
    }
}
