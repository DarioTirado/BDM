document.addEventListener("DOMContentLoaded", function () {
    // Mostrar los productos del carrito en la página
    const carritoContainer = document.getElementById('carrito-container');
    const totalPagarElement = document.getElementById('total-pagar');

     // Obtener el contenido del carrito desde la base de datos usando una petición AJAX
     $.ajax({
        url: "../PHP/CARRITO2.php",
        type: "POST",
        dataType: "html",
        success: function (response) {
            carritoContainer.innerHTML = response;
            // Calcular y mostrar el total a pagar después de cargar el carrito
            actualizarTotalPagar();
        },
        error: function (error) {
            console.log(error);
        }
    });


    // Función para calcular y mostrar el total a pagar
    function actualizarTotalPagar() {
        // Calcular el total a pagar sumando los precios de los productos en el carrito
        const totalPagar = [...document.querySelectorAll('.precio-producto')].reduce((total, elemento) => {
            return total + parseFloat(elemento.textContent);
        }, 0);

        // Mostrar el total a pagar en el elemento correspondiente
        totalPagarElement.textContent = `$${totalPagar.toFixed(2)}`;
    }
});

function createCarritoProductCard(producto, index) {
    const card = document.createElement("div");
    card.classList.add("card", "mb-4", "custom-card-body");

    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    cardBody.innerHTML = `
        <h5 class="card-title">${producto.NOMBRE_PRODUCTO}</h5>
        <p class="card-text">Precio: ${producto.PRECIO}$</p>
        <p class="card-text">Descripción: ${producto.DESCRIPCION}</p>
        <button class="btn btn-danger" data-index="${index}">Eliminar</button>
    `;

    // Agregar un escuchador de eventos al botón de eliminar
    const eliminarButton = cardBody.querySelector('button');
    eliminarButton.addEventListener('click', () => confirmarEliminarProducto(index));

    card.appendChild(cardBody);

    return card;
}
