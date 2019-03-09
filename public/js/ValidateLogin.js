$(document).ready(function() {
  var emailInput = document.getElementById("login-email");
  var passwordInput = document.getElementById("login-password");

  var regexEmail = /\S+@\S+\.\S+/;

 emailInput.onblur = function () {
 	var inputValue = this.value.trim();
 	var alertMsg = this.parentElement.querySelector('.invalid-feedback');
 	if (inputValue === '') {
 		this.classList.add('is-invalid');
 		alertMsg.innerHTML = 'El <b>email</b> no puede estar vacío';
 	} else if (!regexEmail.test(inputValue)) {
 		this.classList.add('is-invalid');
 		alertMsg.innerHTML = 'El formato de <b>email<b> no es valido';
 	} else {
 		this.classList.remove('is-invalid');
 		this.classList.add('is-valid');
 		alertMsg.innerHTML = '';
 	}
 };

  passwordInput.onblur = function () {
    var inputValue = this.value.trim();
    var alertMsg = this.parentElement.querySelector('.invalid-feedback');
    if (inputValue === '' || inputValue.length < 6) {
      this.classList.add('is-invalid');
      alertMsg.innerHTML = 'La <b>contraseña</b> no puede estar vacía y debe tener al menos 6 caracteres';
    } else {
      this.classList.remove('is-invalid');
      this.classList.add('is-valid');
      alertMsg.innerHTML = '';
    }
  };

});
