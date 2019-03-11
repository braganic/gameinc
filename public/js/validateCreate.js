$(document).ready(function() {
  $('input[type="file"]').change(function(e) {

    var fileName = e.target.files[0].name;
    var botonPerfil = document.getElementsByClassName("custom-file-upload")[0];
    var extension = fileName.split(".").pop();
    console.log(fileName);
    if (extension == "jpg" || extension == "jpeg" || extension == "png" || extension == "JPG" || extension == "JPEG" || extension == "PNG") {
      botonPerfil.innerHTML = fileName;
      botonPerfil.style.border = "1px solid green";
    } else {
      botonPerfil.innerHTML = "Solo se aceptan png, jpg o jpeg";
      botonPerfil.style.border = "1px solid red";
    }
  });
});
