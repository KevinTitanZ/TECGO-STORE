function validateForm() {
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const phoneNumber = document.getElementById('phoneNumber').value;
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirm_password').value;

  if (!name || !email || !phoneNumber || !password || !confirmPassword) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Por favor, complete todos los campos.',
    });
    return false;
  }

  if (phoneNumber.length !== 10) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Por favor, ingrese un número de teléfono válido de 10 dígitos.',
    });
    return false;
  }

  if (password !== confirmPassword) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Las contraseñas no coinciden. Por favor, inténtelo de nuevo.',
    });
    return false;
  }

  // Aquí podrías agregar la lógica para enviar los datos del formulario al servidor

  Swal.fire({
    icon: 'success',
    title: 'Registro exitoso',
    text: 'Su cuenta ha sido creada con éxito.',
  }).then(() => {
    // Redirigir al usuario a la página de inicio de sesión o a otra página
    window.location.href = '../Login/index.html';
  });

  return false; // Evitar la recarga de la página
}