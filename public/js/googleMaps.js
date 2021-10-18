var isLoad = false;
var map = null;
 
// loadMap function 
function loadMap(latlan) {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 9,
    maxZoom: 18,
    minZoom: 6,
    scrollwheel: true,
    center: latlan
  });
}
// end loadMap function 
// add markers function 
function addMarke(latlan, map) {
  var marker = new google.maps.Marker({
    position: latlan.latlng ,
    title:latlan.title,
    map: map,
  });
   
}
// end markers function 

 


// initial function (main function) 
function initMap() {
  $(document).ready(function () {
    // lodad map
 
    $("#map-btn").click(function () {

      if (!isLoad) {
        var latlan =markR[0].latlng;
        loadMap(latlan);
        markR.forEach(latlan => {
          addMarke(latlan, map);
           
        });

        
 
         
        isLoad = true;
      }
      $("#mapContainer").slideToggle("slow");

    });
    // end load map 
    












  });

}
// end initial function


