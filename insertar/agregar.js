var cont = 1;
var limit = 20;
function addInput(divName){
     if (cont == limit)  {
          alert("Alcanzo el limite de " + cont + " habilidades");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Habilidad " + (cont + 1) + " <br><input type='text' name='habilidades[]'>";
          document.getElementById(divName).appendChild(newdiv);
          cont++;
     }
}