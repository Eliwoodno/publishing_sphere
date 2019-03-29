let filters = document.querySelectorAll('select.filters')
let planningContainer = document.querySelector('.planning_container')
let eventboxes = document.querySelectorAll('.event_box')

let activeFilters = {
  date:document.querySelector('.date_filter option:first-of-type').value,
  location:'',
  type:'',
}

const displayeventboxes = (box) =>{
  box.style.display='none';
  box.offsetHeight;
  box.style.opacity = 0
 if(box.getAttribute('date') == activeFilters.date){
 if(box.getAttribute('location') == activeFilters.location || activeFilters.location =='' ){
if(box.getAttribute('type') ==activeFilters.type || activeFilters.type ==''){
  box.style.display='flex';
  box.offsetHeight;
  box.style.opacity = 1
  
  }
  
   }
  
   
 }
}

for(let l=0; l<eventboxes.length; l++){

  displayeventboxes(eventboxes[l]);

 }  


for(let i=0; i<filters.length; i++){
  filters[i].addEventListener('change', (event) =>{ 
    document.querySelectorAll('active_eventbox')
    activeFilters.date = filters[0].value
    activeFilters.location = filters[1].value
    activeFilters.type = filters[2].value

    for(let j=0; j<eventboxes.length; j++){

           displayeventboxes(eventboxes[j]);
        
          }    
      }
      
      )}



