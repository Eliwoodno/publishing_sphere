let hamb_button = document.querySelector('header .hamburger')
let responsive_menu = document.querySelector('.header_menu')

hamb_button.addEventListener('click', (event) =>
{
    hamb_button.classList.toggle('is-active')
    responsive_menu.classList.toggle('expanded')

})


const showMenu = () => {
   let toDisplay = document.querySelectorAll('.header_menu > div')
   for ( let i = 0; i< toDisplay.length; i++){
    toDisplay[i].style.display = 'block'
       
   }
}
showMenu()


$('button.hamburger').on('click', () => {
    $('.overlay').toggleClass('overlay-visible')
    
})
$('.overlay').on('click', () => {
    $('.overlay').toggleClass('overlay-visible')
    $('button.hamburger').toggleClass('is-active')
    $('.header_menu').toggleClass('expanded')
})
$(window).on('resize', () => {
    if($(window).width() > 992)
    {
    $('.overlay').removeClass('overlay-visible')
    $('button.hamburger').removeClass('is-active')
    $('.header_menu').removeClass('expanded')
    }
})
