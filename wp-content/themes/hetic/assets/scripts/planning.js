let filters = document.querySelectorAll('select.filters')
let planningContainer = document.querySelector('.planning_container')
let eventboxes = document.querySelectorAll('.event_box')
let eventDayTitles = document.querySelectorAll('h5.day_title')

let activeFilters = {
  date:'',
  location:'',
  type:'',
  tags:[]
}

let arrayComparator = (arr, target) => target.every(v => arr.includes(v))

const displayEventBoxes = (box) =>{
  box.style.display='none';
  box.offsetHeight;
  box.style.opacity = 0
 if(box.getAttribute('date') == activeFilters.date || activeFilters.date ==''){
 if(box.getAttribute('location') == activeFilters.location || activeFilters.location =='' ){
if(box.getAttribute('type') ==activeFilters.type || activeFilters.type ==''){
if( arrayComparator(((box.getAttribute('tags')).split(",")),activeFilters.tags) || (activeFilters.tags).length ==0){
//check if activeFilters.tags is present is tag attribute
  box.style.display='flex';
  box.offsetHeight;
  box.style.opacity = 1
  
  
}
   }
  
   
 }
}
}
const displayEventDayTitles = (day_title,index) =>{
 

  if(activeFilters.date ==''){
    day_title.style.display='block';
    day_title.offsetHeight;
    day_title.style.opacity = 1
  }
 let b = document.querySelectorAll('.planning_container:nth-of-type('+ (index + 1) +') .event_box')
 let c = Array.from(b)
 let mapC = c.map(x => x.style.display);
  if(mapC.indexOf('flex') == -1){

    day_title.style.display='none';
    day_title.offsetHeight;
    day_title.style.opacity = 0
  }
  if(activeFilters.date !=''){
    day_title.style.display='none';
    day_title.offsetHeight;
    day_title.style.opacity = 0
  }
  
  
}

for(let l = 0; l<eventboxes.length; l++){

  displayEventBoxes(eventboxes[l]);

 }  
for(let h = 0; h<eventDayTitles.length; h++){

  displayEventDayTitles (eventDayTitles[h],h);

}  


for(let i=0; i<filters.length; i++){
  filters[i].addEventListener('change', (event) =>{ 
    document.querySelectorAll('active_eventbox')
    activeFilters.date = filters[0].value
    activeFilters.location = filters[1].value
    activeFilters.type = filters[2].value

    for(let j=0; j<eventboxes.length; j++){

           displayEventBoxes(eventboxes[j]);
        
          }
    for(let h=0; h<eventDayTitles.length; h++){

           displayEventDayTitles (eventDayTitles[h],h);

          }      
   }
      
 )}

let addTag = document.querySelector('.add_tag')
let tagsBox = document.querySelector('.tags_box')
let tags = tagsBox.querySelectorAll('div')
let activeTagsContainer = document.querySelector('.active_tags')
let deleteTags = document.querySelectorAll('.cross-svg')

const checkActiveTags = () =>{
 let activeTags = activeTagsContainer.querySelectorAll('div')
 activeFilters.tags=[]
 for(let i = 1; i < activeTags.length; i++){
   (activeFilters.tags).push(activeTags[i].innerText)
 }
 
}

 addTag.addEventListener('click', (event) =>{ 
    event.stopPropagation();
    tagsBox.classList.add('tags_box-active')
 })
document.addEventListener('click', (event) =>{ 
    tagsBox.classList.remove('tags_box-active')
 })
 for( let tag of tags ){
   tag.addEventListener('click', (event) =>{ 
    event.stopPropagation();
    let div = document.createElement('div')
    div.innerHTML = tag.innerText+"<img class='cross-svg'src='../../wp-content/themes/hetic/assets/images/cross.svg'>"
    addTag.parentNode.append(div)
    deleteTags = document.querySelectorAll('.cross-svg')
    for( let deleteTag of deleteTags ){
    deleteTag.addEventListener('click', (event) =>{ 
    event.stopPropagation();
    deleteTag.parentNode.remove()
    checkActiveTags()
    for(let l = 0; l<eventboxes.length; l++){

    displayEventBoxes(eventboxes[l]);

     }  
    for(let h = 0; h<eventDayTitles.length; h++){

    displayEventDayTitles (eventDayTitles[h],h);

     }  

 })
 
 }
    checkActiveTags()
    for(let l = 0; l<eventboxes.length; l++){

    displayEventBoxes(eventboxes[l]);

     }  
    for(let h = 0; h<eventDayTitles.length; h++){

    displayEventDayTitles (eventDayTitles[h],h);

     }  

 })
 
 }

 


 //<div>memes <img class='cross-svg'src='<?echo (IMAGES_URL . '/cross.svg') ?>'></div>