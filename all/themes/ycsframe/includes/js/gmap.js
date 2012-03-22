 function getGoogleMap(lat, lng, school) {
		    var myLatlng = new google.maps.LatLng(lat, lng);
        var mySchool = school;
		    var myOptions = {
		      zoom: 14,
		      center: myLatlng,
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		
			var marker = new google.maps.Marker({
			      position: myLatlng,
			      title: mySchool
		});
		marker.setMap(map)
		}
		
		function getNoMap(){
			myHtml = "<h3>We're sorry, but no map could be found</h3>";
			document.getElementById("map_canvas").innerHTML = myHtml;
		}
