function limitareLungime(input, length) {
  var lungime = length;
  if (input.value.length > lungime)
    input.value = input.value.substring(0, lungime);
}
function filtreazaNumere(e) {
  var unicode = e.charCode ? e.charCode : e.keyCode;
  if (unicode != 8) {
    //daca tasta apasata nu e backspace
    if (unicode < 48 || unicode > 57)
      //si nu e nici numar
      return false; //nu se poate apasa
  }
  return true;
}
function esteEmail(strMail) {
  var regExpEmail = /^.+\@.+\..+$/; // expresia regulata pentru verificare email
  return regExpEmail.test(strMail);
}
function esteNumar(strNr) {
  var regExpNumber = /^\d+$/; // expresia regulata pentru verificare numar

  return regExpNumber.test(strNr);
}
function esteData(dataString) {
  var valid = true;
  var regExpData = /^\d{1,2}\/\d{1,2}\/\d{4}$/; // expresia regulata pentru verificare data
  if (regExpData.test(dataString)) {
    var d = dataString.split("/");
    var zi = d[0];
    var luna = d[1];
    var an = d[2];
    if (zi < 1 || zi >= 31) {
      valid = false;
    } else if (luna < 1 || luna > 12) {
      valid = false;
    } else if (an < 1900) {
      valid = false;
    }
  } else {
    valid = false;
  }
  return valid;
}
