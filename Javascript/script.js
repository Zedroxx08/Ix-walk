const Flag = document.getElementById('France')
const Lang = document.getElementById('Flag')
const croix = document.getElementById('Croix')

Flag.addEventListener("click", display)
croix.addEventListener("click", display2)

function display(){
    Lang.style.display = 'block'
}
function display2(){
    Lang.style.display = 'none'
}