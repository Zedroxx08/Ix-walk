const AffichePlus = document.getElementById('afficheplus')
const AfficheMoins = document.getElementById('affichemoins')
const autre = document.getElementsByClassName('Autres')[0]
const Cacher = document.getElementsByClassName('Cacher')

AffichePlus.addEventListener("click",display3)
AfficheMoins.addEventListener("click",display4)

function display3(){
    for (let i = 0; i < Cacher.length; i++) {
        Cacher[i].style.display = 'block'
    }
    AfficheMoins.style.display = 'inline-block'
    AffichePlus.style.display = 'none'
    autre.style.height = '210vh'
    autre.style.gridTemplateRows = '100px repeat(4,50vh)'
}
function display4(){
    for (let i = 0; i < Cacher.length; i++) {
        Cacher[i].style.display = 'none'
    }
    AfficheMoins.style.display = 'none'
    AffichePlus.style.display = 'inline-block'
    autre.style.height = '60vh'
    autre.style.gridTemplateRows = '100px 50vh'
}