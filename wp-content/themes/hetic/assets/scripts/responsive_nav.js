let hamb_button = document.querySelector('header .hamburger')
let responsive_menu = document.querySelector('.header_menu')

hamb_button.addEventListener('click', (event) =>
{
    hamb_button.classList.toggle('is-active')
    responsive_menu.classList.toggle('expanded')

})

