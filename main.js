function getElementByName(name) {
  return document.getElementsByName(name)[0];
}

function warning(elem) {
  $(elem).addClass("alert");
  $(elem).click(function() {
    $(elem).removeClass("alert");
  });
}

function validate() {
  var success = true;
  
  var nom = getElementByName("nom");
  
  
  if (nom.value.length < 3) {
    success = false;
    warning(nom);
    
  }
  
  var prenom = getElementByName("prenom");
  if (prenom.value.length < 3) {
    success = false;
    warning(prenom);
  }
  
  var naissance = getElementByName("naissance");
  var date = new Date(naissance.value);
  var age = new Date().getYear() - date.getYear();
  
  if ((isNaN(date.getTime())) || (age > 120)) {
    success = false;
    warning(naissance);
  }
  
  return success;
}



