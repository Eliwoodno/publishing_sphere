let filters = document.querySelectorAll('select.filters')
let planningContainer = document.querySelector('.planning_container')
let eventboxes = document.querySelectorAll('.event_box')
let eventDayTitles = document.querySelectorAll('h5.day_title')

let activeFilters = {
  date:'',
  location:'',
  type:'',
  tags:{}
}

const displayEventBoxes = (box) =>{
  box.style.display='none';
  box.offsetHeight;
  box.style.opacity = 0
 if(box.getAttribute('date') == activeFilters.date || activeFilters.date ==''){
 if(box.getAttribute('location') == activeFilters.location || activeFilters.location =='' ){
if(box.getAttribute('type') ==activeFilters.type || activeFilters.type ==''){
  box.style.display='flex';
  box.offsetHeight;
  box.style.opacity = 1
  
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
 console.log(b)
 let c = Array.from(b)
 console.log(c)
 let mapC = c.map(x => x.style.display);
 console.log(mapC)
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



