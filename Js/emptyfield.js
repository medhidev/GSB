/*VERIFICATION FORMULAIRE CONNECTION*/
function emptyField(event){

    var login = document.getElementById("login").value;
    var mdp = document.getElementById("password").value;
  
    if(!login || !mdp){
      alert("L'un des champs du formulaire");
      console.error('Formulaire vide');
    }
  }