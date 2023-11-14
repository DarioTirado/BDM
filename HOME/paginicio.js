let datacontact;

document.addEventListener("DOMContentLoaded", function () {
    const popularProductsContainer = document.getElementById("productCarousel");

    if (popularProductsContainer) {
        const popularProducts = [
            {
                name: "Nombre del Producto Popular 1",
                price: "$50.00",
                image: "ruta-de-la-imagen-popular-1.jpg",
            },
            {
                name: "Nombre del Producto Popular 2",
                price: "$60.00",
                image: "ruta-de-la-imagen-popular-2.jpg",
            },
            {
                name: "Nombre del Producto Popular 3",
                price: "$70.00",
                image: "ruta-de-la-imagen-popular-3.jpg",
            },
            {
                name: "Nombre del Producto Popular 4",
                price: "$70.00",
                image: "ruta-de-la-imagen-popular-4.jpg",
            },
        ];

        const popularCarouselInner = document.createElement("div");
        popularCarouselInner.classList.add("carousel-inner");

        popularProducts.forEach((popularProduct, index) => {
            const card = createPopularProductCard(popularProduct);

            if (index === 0) {
                card.classList.add("carousel-item", "active");
            } else {
                card.classList.add("carousel-item");
            }

            popularCarouselInner.appendChild(card);
        });

        popularProductsContainer.innerHTML = ""; // Limpia el contenido original
        popularProductsContainer.appendChild(popularCarouselInner);

        function createPopularProductCard(popularProduct) {
            const card = document.createElement("div");
            card.classList.add("col-md-4");
            card.innerHTML = `
                <div class="card mb-4">
                    <img src="${popularProduct.image}" class="card-img-top" alt="${popularProduct.name}">
                    <div class="card-body">
                        <h5 class="card-title">${popularProduct.name}</h5>
                        <p class="card-text">Precio: ${popularProduct.price}</p>
                        <a href="#" class="btn btn-primary">Ver Producto</a>
                    </div>
                </div>
            `;
            return card;
        }
    }

    $.ajax({
        url: "../PHP/OBTENER_PRODUCTOS.php",
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
                                    <form method="POST" action="../PHP/INFO_PRODUCTO.php" enctype="multipart/form-data">
                                        <h5 name="nombre" class="card-title">${datacontact[i].NOMBRE}</h5>
                                        <p name="precio" class="card-text">Precio: ${datacontact[i].PRECIO}$</p>
                                        <p name="descripcion" class="card-text">Descripcion: ${datacontact[i].DESCRIPCION}</p>
                                        <input name="id" type="hidden" value="${datacontact[i].ID_PRODUCTO}">
                                        <input type="submit" value="Ver Producto" class="btn btn-primary">
                                        <a href="#" class="btn btn-primary" onclick="agregarAlCarrito(${i})">Agregar A Carrito</a>
                                    </form>
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
});

function agregarAlCarrito(index) {
    const producto = datacontact[index];

    // Verifica que el objeto producto tenga una propiedad ID_PRODUCTO
    if (producto && producto.ID_PRODUCTO) {
        // Enviar una solicitud POST al archivo Carrito.php con la información del producto
        $.ajax({
            url: "../PHP/Carrito.php",
            type: "POST",
            data: {
                index: producto.ID_PRODUCTO,
                idProducto: producto.ID_PRODUCTO,
                nombre: producto.NOMBRE,
                precio: producto.PRECIO
            },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    // Mostrar una alerta de éxito utilizando Swal
                    Swal.fire({
                        title: '¡Producto Agregado!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });

                    // Actualizar la información del carrito o realizar otras acciones necesarias
                    // Puedes llamar a funciones adicionales aquí según tus necesidades
                } else {
                    // Mostrar una alerta de error si la respuesta no es exitosa
                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);

                // Mostrar una alerta de error con el mensaje detallado
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al agregar el producto al carrito.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            }
        });
    } else {
        console.error("El objeto de producto no tiene un ID_PRODUCTO válido.");
    }
}
