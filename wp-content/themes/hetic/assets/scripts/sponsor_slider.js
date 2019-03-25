let next = document.querySelector('.sponsor-slider .next')
let previous = document.querySelector('.sponsor-slider .previous')
let slides =  document.querySelectorAll('.sponsor-slider .slide')
let slider =  document.querySelector('.sponsor-slider')




const sliderNav = () => {
slides[0].classList.add('active')

let i =0
previous.addEventListener('click', (event) =>
{
    event.stopPropagation()
    slides[i].classList.remove('active')
    if(i > 0){
      i-- 
    }else{
      i = slides.length -1
    }
    slides[i].classList.add('active')
})

next.addEventListener('click', (event) =>
{
    event.stopPropagation()
    slides[i].classList.remove('active')
    if(i < slides.length-1){
      i++
    }else{
      i = 0
    }
    slides[i].classList.add('active')
})
}
sliderNav();
//lol

