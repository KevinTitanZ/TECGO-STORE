// Script.js

document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.querySelector('.toggle');
    const sidebar = document.querySelector('.sidebar');

    // Función para alternar la visibilidad de la barra lateral
    toggleButton.addEventListener('click', function() {
        sidebar.classList.toggle('active');

        // Cambia el ícono según el estado de la barra lateral
        if (sidebar.classList.contains('active')) {
            toggleButton.classList.remove('bx-chevron-right');
            toggleButton.classList.add('bx-chevron-left');
        } else {
            toggleButton.classList.remove('bx-chevron-left');
            toggleButton.classList.add('bx-chevron-right');
        }
    });

    // Función para hacer la barra lateral responsive
    window.addEventListener('resize', function() {
        if (window.innerWidth < 768) { // Ajusta el ancho según tus necesidades
            sidebar.classList.add('active');
            toggleButton.classList.remove('bx-chevron-right');
            toggleButton.classList.add('bx-chevron-left');
        } else {
            sidebar.classList.remove('active');
            toggleButton.classList.remove('bx-chevron-left');
            toggleButton.classList.add('bx-chevron-right');
        }
    });
     // Funcionalidad de los carritos de compra
     document.querySelectorAll('.cart-icon').forEach(cartIcon => {
        cartIcon.addEventListener('click', () => {
            let count = parseInt(cartIcon.getAttribute('data-count'));
            cartIcon.setAttribute('data-count', count + 1);
        });
    });
});