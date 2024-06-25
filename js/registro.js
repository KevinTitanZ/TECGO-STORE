
// Función para validar la coincidencia de la contraseña
function validatePassword() {
  var password = document.getElementById("password");
  var confirm_password = document.getElementById("confirm_password");

  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("No coincide");
  } else {
    confirm_password.setCustomValidity('');
  }
}

document.getElementById("password").addEventListener("change", validatePassword);
document.getElementById("confirm_password").addEventListener("change", validatePassword);
