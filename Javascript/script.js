const Flag = document.getElementById('France')//Flag est une variable qui récupère l'élément html où id est France
const Lang = document.getElementById('Flag')
const croix = document.getElementById('Croix')

Flag.addEventListener("click", display)//Déclenche la fonction display au click de la variable Flag expliqué aau dessus
croix.addEventListener("click", display2)

function display(){
    Lang.style.display = 'block'//Change la propriété css display de Lang
}
function display2(){
    Lang.style.display = 'none'
}
