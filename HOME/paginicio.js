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
});


function openModal() {
    document.getElementById("modalOverlay").style.display = "block";
    document.getElementById("myModal").style.display = "block";
}

function closeModal() {
    document.getElementById("modalOverlay").style.display = "none";
    document.getElementById("myModal").style.display = "none";
}


window.onload = function() {
    // Verificar si hay un mensaje de éxito en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const successMessage = urlParams.get('success_message');

    if (successMessage) {
        // Mostrar una alerta con el mensaje de éxito
        alert(successMessage);
    }
}