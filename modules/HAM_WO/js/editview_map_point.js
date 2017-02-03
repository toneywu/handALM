var searchService,map,markersArray = [];
//TODO SearchOnMap 和 Rewrite Address都不能正确的被php翻译，需要在Javascript中调用翻译

function initMap() { //被loadMapScript调用
	var default_zoom_level;
	default_zoom_level=parseInt($("#map_zoom").val());
	if(isNaN(default_zoom_level)||default_zoom_level==""){
		$("#map_zoom").val(15);
		default_zoom_level=15;
	}
	var myOptions = {
		zoom: default_zoom_level,
		mapTypeId: qq.maps.MapTypeId.ROADMAP
	};
	map = new qq.maps.Map(document.getElementById("cuxMap"), myOptions);

	var current_lat=$("#map_lat").val();
	var current_lng=$("#map_lng").val();
	//alert(current_lat);
	var current_latlng = new qq.maps.LatLng(current_lat,current_lng);

	if ((current_lat!="") && (current_lng!="") && (current_lng!="0.00000000")) { //如果当前有数据，则显示一个固定的点做为原点
		map.setCenter(current_latlng);
		map.panTo(current_latlng);

		var marker_org=new qq.maps.Marker({
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
		citylocation.searchLocalCity();//如果当前没有数据，则显示当前IP所在的城市，没有原点
	}

	//加载点选的地图点
	var markerPicking=new qq.maps.Marker({
		//position:event.latLng,
		animation:qq.maps.MarkerAnimation.BOUNCE,
		map:map
	});

	//加载点击定位事件
	qq.maps.event.addListener(map, 'click', function(event) {

		geocoder = new qq.maps.Geocoder({
			complete:function(result){
				$("#map_search_text").val(result.detail.address);
				if( $("#chk_rewrite_address").is(':checked')){ //如果返写将地址返回文本框
					$("#map_address").val($("#map_search_text").val());
				}
				map.setCenter(event.latLng);
				map.panTo(event.latLng);
				markerPicking.setPosition(event.latLng);
			}
		});
		geocoder.getAddress(event.latLng);
		$("#map_lat").val((event.latLng.getLat()).toFixed(5));
		$("#map_lng").val((event.latLng.getLng()).toFixed(5));
	});
	//加载搜索事件
	var latlngBounds = new qq.maps.LatLngBounds();
	searchService = new qq.maps.SearchService({
		complete : function(results){
			var pois = results.detail.pois;
			for(var i = 0,l = pois.length;i < l; i++){
				var poi = pois[i];
				latlngBounds.extend(poi.latLng);
				var marker = new qq.maps.Marker({
					map:map,
					position: poi.latLng
				});

				marker.setTitle(i+1);
				markersArray.push(marker);
			}
			map.fitBounds(latlngBounds);
		}
	});

	//按坐标(lat&lng)查询
	geocoder_byLatLng = new qq.maps.Geocoder({
		complete : function(result){
			//map.setCenter(result.detail.location);
			map.panTo(result.detail.location);
			markerPicking.setPosition(result.detail.location);
		}
	});
	//放大缩小，标记到默认放大尺寸
	qq.maps.event.addListener(map,'zoom_changed',function() {
		$("#map_zoom").val(map.getZoom());
	});
}


function loadMapScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://map.qq.com/api/js?v=2.exp&callback=initMap"; //调用了initMap
	$("#cuxMap").css("height","250px");
	//$("#cuxMap").css("cursor","crosshair");
	document.body.appendChild(script);
}

$(document).ready(function(){
	//$("#map_c_label").hide();
	$('#map_enabled').change(function(){
		if( $(this).is(':checked')) {
			$("#map_type").closest("div.panel").show();
			loadMapScript();
		} else {
			$("#map_type").closest("div.panel").hide();
		}
	});

	$('#map_enabled').change();

	$("#map_zoom").attr("readonly",true);
	$("#map_zoom").css("background-color","#efefef");
	$("#map_search_text").val($("#map_address").val());
	$("#map_address").change(function(){
		$("#map_search_text").val($("#map_address").val());
	});
	$("#map_lat").change(function(){
		codeLatLng(parseFloat($("#map_lat").val()),parseFloat($("#map_lng").val()));
	});
	$("#map_lng").change(function(){
		codeLatLng(parseFloat($("#map_lat").val()),parseFloat($("#map_lng").val()));
	});
	$('#map_search_text').bind('keypress',function(event){//输入时直接按回车搜索
		if(event.keyCode == "13") {
			searchKeyword();
		}
	});//TODO 这里有个BUG，回车会SubmitForm，所以不会搜索

	$("#btn_map_search").click(function() {searchKeyword()} );//点搜索按钮

	function searchKeyword() {
		var keyword = $("#map_search_text").val();
		//var region = document.getElementById("region").value;
		clearOverlays(markersArray);
		//searchService.setLocation(region);
		searchService.search(keyword);
	}
	function clearOverlays(overlays){
		if (overlays) {
			for (i in overlays) {
				overlays[i].setMap(null);
			}
		}
	}
	function codeLatLng(lat,lng) {
		//获取经纬度数值   按照,分割字符串 取出前两位 解析成浮点数
		//clearOverlays(markersArray);
		var latLng = new qq.maps.LatLng(lat, lng);
		//调用信息窗口
		//var info = new qq.maps.InfoWindow({map: map});
		//调用获取位置方法
		geocoder_byLatLng.getAddress(latLng);
	}
});