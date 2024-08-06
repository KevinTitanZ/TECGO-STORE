// Script.js

// Espera a que el contenido del DOM se haya cargado completamente
document.addEventListener("DOMContentLoaded", function() {
    // Selecciona el botón de alternancia y la barra lateral
    const toggleButton = document.querySelector('.toggle');
    const sidebar = document.querySelector('.sidebar');

    // Función para alternar la visibilidad de la barra lateral
    toggleButton.addEventListener('click', function() {
        // Alterna la clase 'active' en la barra lateral
        sidebar.classList.toggle('active');

        // Cambia el ícono del botón de alternancia según el estado de la barra lateral
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
        // Si el ancho de la ventana es menor a 768px, muestra la barra lateral y cambia el ícono
        if (window.innerWidth < 768) {
            sidebar.classList.add('active');
            toggleButton.classList.remove('bx-chevron-right');
            toggleButton.classList.add('bx-chevron-left');
        } else {
            // Si el ancho de la ventana es mayor o igual a 768px, oculta la barra lateral y cambia el ícono
            sidebar.classList.remove('active');
            toggleButton.classList.remove('bx-chevron-left');
            toggleButton.classList.add('bx-chevron-right');
        }
    });
});
