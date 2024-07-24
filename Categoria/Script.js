document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('.toggle-sidebar');
    const sidebar = document.querySelector('nav.sidebar');

    // Alternar la visibilidad de la barra lateral
    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('open');
    });
});

