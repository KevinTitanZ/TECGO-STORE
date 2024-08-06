document.addEventListener("DOMContentLoaded", function() {
    // Obtener todos los botones de detalles de producto
    const detailsButtons = document.querySelectorAll(".details-button");

    // Obtener el modal y el botón de cierre del modal
    const modal = document.getElementById("product-details");
    const span = document.getElementsByClassName("close-button")[0];

    // Obtener los elementos dentro del modal para mostrar la información del producto
    const productName = document.getElementById("product-name");
    const productDescription = document.getElementById("product-description");
    const productPrice = document.getElementById("product-price");

    // Añadir un evento click a cada botón de detalles
    detailsButtons.forEach(button => {
        button.addEventListener("click", function() {
            // Obtener los atributos de datos del botón clicado
            const name = this.getAttribute("data-name");
            const description = this.getAttribute("data-description");
            const price = this.getAttribute("data-price");

            // Establecer el contenido del modal con la información del producto
            productName.textContent = name;
            productDescription.textContent = description;
            productPrice.textContent = price;

            // Mostrar el modal
            modal.style.display = "block";
        });
    });

    // Configurar el evento click en el botón de cierre para ocultar el modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Configurar el evento click en cualquier parte fuera del modal para cerrarlo
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Cargar el contenido del archivo nav.html en el contenedor con id 'nav-container'
    fetch('../Nav/nav.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('nav-container').innerHTML = data;
        });
});
