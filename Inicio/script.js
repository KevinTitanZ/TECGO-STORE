$(document).ready(function() {
    // Efecto acordeón
    $('.accordion').accordion();

    // Animaciones de entrada
    $('.element-a').addClass('animate__fadeInLeft');
    $('.element-b').addClass('animate__fadeInRight');
    // ... otras animaciones ...

    // Animaciones en hover
    $('.hover-element').hover(
        function() {
            $(this).addClass('animate__pulse');
        },
        function() {
            $(this).removeClass('animate__pulse');
        }
    );

    // Obtener datos del clima (ejemplo con API OpenWeatherMap)
    $.ajax({
        url: 'https://api.openweathermap.org/data/2.5/weather?q=Buenos+Aires&appid=TU_CLAVE_API',
        success: function(data) {
            $('#clima').html('Temperatura: ' + data.main.temp + 'K');
        }
    });
});
