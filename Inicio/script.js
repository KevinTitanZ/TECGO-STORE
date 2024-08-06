$(document).ready(function() {
    // Ocultar elementos inicialmente
    $(".fade-in").hide();
    
    // Aplicar animaciones de entrada
    $(".fade-in").each(function(index) {
        $(this).delay(500 * index).fadeIn(1000);
    });
});