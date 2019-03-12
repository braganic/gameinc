$(document).ready(function() {
  var countriesSelect = document.getElementById("country");
  var citiesSelect = document.getElementById("cities");
  var citiesCol = document.getElementById("citiesCol");
  var usernameInput = document.getElementById("register-name");
  var emailInput = document.getElementById("register-email");
  var passwordInput = document.getElementById("register-password");

  usernameInput.onblur = function() {
    var inputValue = this.value.trim();
    var alertMsg = this.parentElement.querySelector(".invalid-feedback");
    if (inputValue === "" || inputValue.length < 3) {
      this.classList.add("is-invalid");
      alertMsg.innerHTML = "El <b>nombre</b> no puede estar vacío";
    } else {
      this.classList.remove("is-invalid");
      this.classList.add("is-valid");
      alertMsg.innerHTML = "";
    }
  };

  var regexEmail = /\S+@\S+\.\S+/;

  emailInput.onblur = function() {
    var inputValue = this.value.trim();
    var alertMsg = this.parentElement.querySelector(".invalid-feedback");
    if (inputValue === "") {
      this.classList.add("is-invalid");
      alertMsg.innerHTML = "El <b>email</b> no puede estar vacío";
    } else if (!regexEmail.test(inputValue)) {
      this.classList.add("is-invalid");
      alertMsg.innerHTML = "El formato de email no es un email valido";
    } else {
      this.classList.remove("is-invalid");
      this.classList.add("is-valid");
      alertMsg.innerHTML = "";
    }
  };

  passwordInput.onblur = function() {
    var inputValue = this.value.trim();
    var alertMsg = this.parentElement.querySelector(".invalid-feedback");
    if (inputValue === "" || inputValue.length < 6) {
      this.classList.add("is-invalid");
      alertMsg.innerHTML =
        "La <b>contraseña</b> no puede estar vacía y debe tener al menos 6 caracteres";
    } else {
      this.classList.remove("is-invalid");
      this.classList.add("is-valid");
      alertMsg.innerHTML = "";
    }
  };

  function fetchCall(url, callback) {
    window
      .fetch(url)
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        callback(data);
      })
      .catch(function(error) {
        console.log(error);
      });
  }

  function fillCitiesSelect(data) {
    for (var oneCity of data) {
      citiesSelect.innerHTML += "<option>" + oneCity.state + "</option>";
    }
  }

  function fillCountrySelect(data) {
    for (var oneCountrie of data) {
      countriesSelect.innerHTML += "<option>" + oneCountrie.name + "</option>";
    }
  }

  fetchCall("https://restcountries.eu/rest/v2/all", fillCountrySelect);

  countriesSelect.onchange = function() {
    if (this.value === "Argentina") {
      citiesCol.classList.remove("d-none");
      fetchCall(
        "https://dev.digitalhouse.com/api/getProvincias",
        fillCitiesSelect
      );
    } else {
      citiesCol.classList.add("d-none");
      citiesSelect.innerHTML = "";
    }
  };

  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    var botonPerfil = document.getElementsByClassName("custom-file-upload")[0];
    var extension = fileName.split(".").pop();

    if (
      extension == "jpg" ||
      extension == "jpeg" ||
      extension == "png" ||
      extension == "JPEG" ||
      extension == "JPG" ||
      extension == "PNG"
    ) {
      botonPerfil.innerHTML = fileName;
      botonPerfil.style.border = "1px solid green";
    } else {
      botonPerfil.innerHTML = "Solo se aceptan png, jpg o jpeg";
      botonPerfil.style.border = "1px solid red";
    }
  });
});
