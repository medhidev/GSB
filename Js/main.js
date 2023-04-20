/* Script pour visualiser sont mot de passe */

const eye = document.querySelector(".feather-eye");
const eyeoff = document.querySelector(".feather-eye-off");
const passwordField = document.querySelector("input[type=password]");


eye.addEventListener("click", () => {
  eye.style.display = "none";
  eyeoff.style.display = "block";
  passwordField.type = "text";
});

eyeoff.addEventListener("click", () => {
  eyeoff.style.display = "none";
  eye.style.display = "block";
  passwordField.type = "password";
});

function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  var eyeIcon = document.getElementById("eye").querySelector("i");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.classList.remove("fa-eye-slash");
    eyeIcon.classList.add("fa-eye");
  } else {
    passwordInput.type = "password";
    eyeIcon.classList.remove("fa-eye");
    eyeIcon.classList.add("fa-eye-slash");
  }
}

/* Verification si le champ du formulaire est vide (amelioration pour éviter de refresh la page) */

function emptyField(event){

  var login = document.getElementById("login").value;
  var mdp = document.getElementById("password").value;

  if(!login || !mdp){
    alert("L'un des champs du formulaire");
    console.error('Formulaire vide');
  }
  else{
    console.log('connection au script');
  }
}
