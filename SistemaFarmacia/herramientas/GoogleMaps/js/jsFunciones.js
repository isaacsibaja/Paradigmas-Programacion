/*
 * Si quieren que se muestre el mapa, solo descomentan todo.
 */

function initMap() {
	var directionsDisplay = new google.maps.DirectionsRenderer;
	var directionsService = new google.maps.DirectionsService;
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom :  7 , 
		center :  { lat :  0 , lng :  0 }
	});
		
	directionsDisplay.setPanel(document.getElementById('directions-panel'));
	
	//directionsDisplay.setMap(map);
	//var control = document.getElementById('control');
	//control.style.display = 'block';
	//map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

	var onChangeHandler = function() {
		calculateAndDisplayRoute(directionsService, directionsDisplay);
	};
				
	document.getElementById('start').addEventListener('change', onChangeHandler);
	document.getElementById('end').addEventListener('change', onChangeHandler);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
	var start = document.getElementById('start').value;
	var end = document.getElementById('end').value;
	  
	directionsService.route({
		origin: start,
		destination: end,
		travelMode: google.maps.TravelMode.DRIVING
	}, 
	function(response, status) {
		if (status === google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(response);
		}
	});
}