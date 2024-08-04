document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.toggle');
    const sidebar = document.querySelector('.sidebar');
    const home = document.querySelector('.home');
    
    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('close');
        home.classList.toggle('expanded');
    });
});
