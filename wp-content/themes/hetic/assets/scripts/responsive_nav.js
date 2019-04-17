let hamb_button = document.querySelector('header .hamburger')
let responsive_menu = document.querySelector('.header_menu')

hamb_button.addEventListener('click', (event) =>
{
    hamb_button.classList.toggle('is-active')
    responsive_menu.classList.toggle('expanded')

})


const showMenu = () => {
   let toDisplay = document.querySelectorAll('.header_menu > div')
   console.log('memes')
   for ( let i = 0; i< toDisplay.length; i++){
    toDisplay[i].style.display = 'block'
       console.log('memes')
   }
}
showMenu()
