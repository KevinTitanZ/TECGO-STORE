// main.js
const togglePassword = button => {
    button.classList.toggle("showing");

    const input = document.getElementById("password");

    input.type = input.type === "password" ? "text" : "password";
};



function validateLoginForm() {
    var username = document.querySelector('input[type="text"]').value;
    var password = document.querySelector('input[type="password"]').value;
    
    if (username.trim() === '' || password.trim() === '') {
        alert('Por favor, llena todos los campos.');
        return false; // Evita que el formulario se envíe
    }
    
    // Si todo está bien, el formulario se enviará normalmente
    return true;
}