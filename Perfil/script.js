document.addEventListener('DOMContentLoaded', () => {
    const icons = document.querySelectorAll('.icon');
    const tooltipContainer = document.getElementById('tooltip-container');

    let currentIcon = null;

    icons.forEach(icon => {
        const tooltipText = icon.getAttribute('data-tooltip');

        icon.addEventListener('mouseover', () => {
            if (currentIcon !== icon) {
                tooltipContainer.textContent = tooltipText;
                tooltipContainer.classList.add('show-tooltip');
            }
        });

        icon.addEventListener('mouseout', () => {
            if (currentIcon !== icon) {
                tooltipContainer.classList.remove('show-tooltip');
            }
        });

        icon.addEventListener('click', () => {
            currentIcon = icon;
            tooltipContainer.textContent = tooltipText;
            tooltipContainer.classList.add('show-tooltip');
        });
    });

    // Make sure tooltip hides when clicking outside of any icon
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.icon')) {
            tooltipContainer.classList.remove('show-tooltip');
            currentIcon = null;
        }
    });
});




