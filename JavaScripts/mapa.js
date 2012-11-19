var latlong = document.getElementById("latlongdiv").innerHTML;
		var result = latlong.split(",");
		var myCenter = new google.maps.LatLng(result[0],result[1]);
		var infoProduct=document.getElementById("descAbreviada");
		var marker;
		function initialize(){
			var mapProp = {
			center:myCenter,
			zoom:15,
			mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			marker=new google.maps.Marker({
			position:myCenter,
			animation:google.maps.Animation.BOUNCE
			});
			marker.setMap(map);
			//Si se le da clic al icono agrega su info
			var infowindowtype2 = new google.maps.InfoWindow({
			content:infoProduct
			});
			google.maps.event.addListener(marker, 'click', function() {
			infowindowtype2.open(map,marker);
			});
		}
		google.maps.event.addDomListener(window, 'load', initialize);