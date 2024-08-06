// Añade un evento que se activa cuando el contenido del DOM está completamente cargado
document.addEventListener('DOMContentLoaded', () => {
    // Selecciona todos los iconos y el contenedor del tooltip
    const icons = document.querySelectorAll('.icon');
    const tooltipContainer = document.getElementById('tooltip-container');

    let currentIcon = null;

    // Itera sobre cada icono para añadir eventos
    icons.forEach(icon => {
        const tooltipText = icon.getAttribute('data-tooltip');

        // Muestra el tooltip al pasar el ratón sobre el icono
        icon.addEventListener('mouseover', () => {
            if (currentIcon !== icon) {
                tooltipContainer.textContent = tooltipText;
                tooltipContainer.classList.add('show-tooltip');
            }
        });

        // Oculta el tooltip al mover el ratón fuera del icono
        icon.addEventListener('mouseout', () => {
            if (currentIcon !== icon) {
                tooltipContainer.classList.remove('show-tooltip');
            }
        });

        // Mantiene el tooltip visible al hacer clic en el icono
        icon.addEventListener('click', () => {
            currentIcon = icon;
            tooltipContainer.textContent = tooltipText;
            tooltipContainer.classList.add('show-tooltip');
        });
    });

    // Oculta el tooltip al hacer clic fuera de los iconos
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.icon')) {
            tooltipContainer.classList.remove('show-tooltip');
            currentIcon = null;
        }
    });

    // Script adicional para animaciones y efectos
    document.addEventListener('DOMContentLoaded', function () {
        // Desplazamiento suave al cargar la página
        window.scrollTo({ top: 0, behavior: 'smooth' });

        // Efecto de rotación y pulsación en los iconos del pie de página
        const footerIcons = document.querySelectorAll('.footer-item i');
        footerIcons.forEach(icon => {
            icon.addEventListener('mouseover', () => {
                icon.style.transform = 'rotate(20deg) scale(1.2)';
                icon.style.transition = 'transform 0.3s ease';
            });
            icon.addEventListener('mouseout', () => {
                icon.style.transform = 'rotate(0) scale(1)';
            });
        });
    });
});





