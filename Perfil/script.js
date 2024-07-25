// script.js

document.addEventListener('DOMContentLoaded', function () {
    // Animación de desplazamiento al cargar la página
    window.scrollTo({ top: 0, behavior: 'smooth' });

    // Efecto de elevación en los contenedores al pasar el ratón
    const profileContainers = document.querySelectorAll('.profile-left .account-details, .profile-left .address-view');
    profileContainers.forEach(container => {
        container.addEventListener('mouseover', () => {
            container.style.transform = 'translateY(-10px)';
            container.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.2)';
            container.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
        });
        container.addEventListener('mouseout', () => {
            container.style.transform = 'translateY(0)';
            container.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
        });
    });

    // Efecto de rotación en los iconos del pie de página
    const footerIcons = document.querySelectorAll('.footer-item i');
    footerIcons.forEach(icon => {
        icon.addEventListener('mouseover', () => {
            icon.style.transform = 'rotate(20deg)';
            icon.style.transition = 'transform 0.3s ease';
        });
        icon.addEventListener('mouseout', () => {
            icon.style.transform = 'rotate(0)';
        });
    });

    // Efecto de pulsación en los iconos del pie de página
    footerIcons.forEach(icon => {
        icon.addEventListener('mouseover', () => {
            icon.style.transform = 'scale(1.2)';
            icon.style.transition = 'transform 0.3s ease';
        });
        icon.addEventListener('mouseout', () => {
            icon.style.transform = 'scale(1)';
        });
    });
});
