import {ConstToast} from "../../dependencies.js";

const toogleBtn = document.getElementById('toggleButton')
const navItems = document.getElementById('navItems')
localStorage.setItem('show', 0)

const toggle = (value) => {

    if ( value == 0){

        localStorage.setItem('show', 1)
        navItems.classList.remove('hidden')

    }else {
        navItems.classList.add('hidden')
        localStorage.setItem('show', 0)
    }
}
document.addEventListener('DOMContentLoaded', function (){

    toogleBtn.addEventListener('click', () => {
        toggle(localStorage.getItem('show'))
    })
    console.info('header partials is loaded')
})

//ConstToast.fire({
//             icon:"warning",
//             iconColor:"orange",
//             text: 'Toggle button is clicked'
//         })
