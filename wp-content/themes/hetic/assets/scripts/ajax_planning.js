let filters = document.querySelectorAll('select.filters')
let basefilter = document.querySelector('.date_filters')
let planningContainer = document.querySelector('.planning_container')
let activeFilters = {
  date:basefilter.value,
  location:'',
  type:'',
}
for(let i=0; i<filters.length; i++){
  filters[i].addEventListener('change', (event) =>{ 
    console.log('memes')
   if(filters[i].dataset.filter == 'date'){ 
     activeFilters.date = filters[i].value
   }
   if(filters[i].dataset.filter == 'location'){ 
    activeFilters.location = filters[i].value
   }
   if(filters[i].dataset.filter == 'type'){ 
    activeFilters.type = filters[i].value
   }
  let eventRequest = new XMLHttpRequest();
  eventRequest.open('GET', 'wp-json/wp/v2/event?filter[jour]=' + activeFilters.date + '&filter[lieu]=' + activeFilters.location+ '&filter[type_event]=' + activeFilters.type);
  eventRequest.onload = function() {
    if (eventRequest.status >= 200 && eventRequest.status < 400) {
      data = (JSON.parse(eventRequest.responseText)) //renderHTML(eventData)
      console.log(data)
      renderHTML(data)
    } else {
      console.log("We connected to the server, but it returned an error.");
    }
  };
  eventRequest.onerror = function() {
    console.log("Connection error");
  };
  eventRequest.send();
})
}

basefilter.value = basefilter.querySelector('option').value//initialize event planning on page load
activeFilters.date = basefilter.value
let event = new Event('change');
basefilter.dispatchEvent(event);
const renderHTML = (data) => {

  let renderedString ='';

  for(let i = 0; i < data.length; i++){
    renderedString += '<div class="event_box"><a class="event_link" href="'+ data[i].link +'"><div class="event_img" style="background-image:url('+ data[i].acf.image_evenement.url +'")></div>'
    renderedString += '<h4 class="event_title">'+ data[i].title.rendered +'</h4>'
    renderedString += '<p class="event_hours">'+ data[i].acf.heure_evenement +'</p></a></div>'  
  }
  planningContainer.innerHTML = renderedString  
}
