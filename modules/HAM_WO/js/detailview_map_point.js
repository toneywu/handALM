function initMap() {
					  //var myLatlng = new qq.maps.LatLng(-34.397, 150.644);
	var default_zoom_level;
	default_zoom_level=parseInt($("#map_zoom").text());
	if(isNaN(default_zoom_level)||default_zoom_level==""){
		$("#map_zoom").val(15);
		default_zoom_level=15;
	}
	//alert(default_zoom_level);
	var myOptions = {
						zoom: default_zoom_level,
						mapTypeId: qq.maps.MapTypeId.ROADMAP
					  };
					  var map = new qq.maps.Map(document.getElementById("cuxMap"), myOptions);

					var current_lat=$("#map_lat").text();
					var current_lng=$("#map_lng").text();
					//alert(document.getElementById("location_map_lat").value);
					var current_latlng = new qq.maps.LatLng(current_lat,current_lng);

					if ((current_lat!="") && (current_lng!="") && (current_lng!="0.00000000")) {
							map.setCenter(current_latlng);
							map.panTo(current_latlng);

							var marker=new qq.maps.Marker({
								position:(current_latlng),
								animation:qq.maps.MarkerAnimation.DROP,
								map:map
							});
					} else { //if lat and lng is empty, load current city as the default position on map
						citylocation = new qq.maps.CityService({
								complete : function(result){
									map.setCenter(result.detail.latLng);
								}
							});
						citylocation.searchLocalCity();
					}
}

function loadMapScript() {
					  var script = document.createElement("script");
					  script.type = "text/javascript";
					  script.src = "http://map.qq.com/api/js?v=2.exp&callback=initMap";
					  $("#cuxMap").css("height","250px");//style="height:250px";
	                  $("#cuxMap").css("width","100%");
					  document.body.appendChild(script);
					}

$(document).ready(function(){
		if($("#map_enabled").is(':checked')) {
			$("#map_type").closest("div.panel").show();
			loadMapScript();
			//alert(document.getElementById("map_lat").innerHTML);
		} else {
			$("#map_type").closest("div.panel").hide();
		}
	});