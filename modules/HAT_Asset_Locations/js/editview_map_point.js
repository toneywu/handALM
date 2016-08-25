var searchService,map,markersArray = [];

function setMapLayerPopupReturn(popupReplyData){
	set_return(popupReplyData);
	LoadMapType();
}

function LoadMapType() { //根据不同地图类型，加载
	var map_type = $("#map_type");
	var map_suppanel=$("#LBL_EDITVIEW_PANEL_GIS").closest('div')

	if( map_type.val()=='TENCENT') {
		map_suppanel.show();
		$("#map_search_area_label").parent().show();
		$("#map_layer_label").parent().hide();
		$("#map_zoom_label").parent().show();
		$("#map_display_area_label").parent().show();
		loadMapScript();
	} else if( map_type.val()=='CUX') {
		map_suppanel.show();
		$("#map_search_area_label").parent().hide();
		$("#map_layer_label").parent().show();

		//如果自定义地图已经加载，则开始加载。否则在选择后重新调用LoadMapType
		if ($("#map_layer_id").val()==null || $("#map_layer_id").val()=="" || $("#map_layer_url").val()=="") {
			$("#map_zoom_label").parent().hide();
			$("#map_display_area_label").parent().hide();
		} else {
			$("#map_zoom_label").parent().show();
			$("#map_display_area_label").parent().show();
			loadMapScript();
		}
	} else {
		map_suppanel.hide();
	}
}





function initMap() { //被loadMapScript调用

	map = null;
	$("#cuxMap").html="";
	var LCobj = '',
	default_zoom_level,
	maker_type = $("#map_marker_type").val(),
	marker_data = $("#map_marker_data").val();

	default_zoom_level=parseInt($("#map_zoom").val());
	if(isNaN(default_zoom_level)||default_zoom_level==""){
		$("#map_zoom").val(15);
		default_zoom_level=15;
	}
	if ($("#map_type").val()=='TENCENT') {
		var myOptions = {
			zoom: default_zoom_level,
			mapTypeId: qq.maps.MapTypeId.ROADMAP
		};
		map = new qq.maps.Map(document.getElementById("cuxMap"), myOptions);
		if(marker_data != "") {
			if(maker_type == "POINT"){
				var Ob = JSON.parse(marker_data);
				//console.log(Ob.data);
				var lnglat = Ob.data.split(",");
				var position = new qq.maps.LatLng(lnglat[0],lnglat[1]);
				var marker = new qq.maps.Marker({
					position: position,
					map: map
				});
			}else if(maker_type == "CIRCLE"){
				var Ob = JSON.parse(marker_data);
				var lnglat = Ob.center.split(",");
				var position = new qq.maps.LatLng(lnglat[0],lnglat[1]);
				var circle=new qq.maps.Circle({
					map:map,
					center:position,
					radius:parseFloat(Ob.radius),
					strokeWeight:2
				});
			}else{
				var larr = new Array();
				var path = new Array();
				var Ob = JSON.parse(marker_data);
				larr = Ob.data.split("|");
				for(var i=0;i<larr.length;i++){
					var lnglat = larr[i].split(",");
					path[i] = new qq.maps.LatLng(lnglat[0],lnglat[1]);
				}
				//console.log(path);
				if(maker_type == "POLYLINE") {
					var polyline = new qq.maps.Polyline({
						path: path,
						strokeColor: '#D00',
						strokeWeight: 2,
						editable: false,
						map: map
					});
				}else{
					var polygon = new qq.maps.Polygon({
						path:path,
						strokeColor: '#D00',
						strokeWeight: 2,
						map: map
					});
				}
			}
		}
		var drawingManager = new qq.maps.drawing.DrawingManager({
			drawingMode: qq.maps.drawing.OverlayType.MARKER,
			drawingControl: true,
			drawingControlOptions: {
				position: qq.maps.ControlPosition.TOP_RIGHT,
				drawingModes: [
					qq.maps.drawing.OverlayType.MARKER
				]
			}
		});
		drawingManager.setMap(map);
		//自定义按钮监听事件
		var controlStyle = "width: 50px;margin: 5px 8px 0 0;color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 13px; -webkit-user-select: none; padding: 1px 6px; direction: ltr; overflow: hidden; text-align: center; line-height: 20px; border: 1px solid rgb(113, 123, 135); box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px;background-color: rgb(255, 255, 255);";
		var defaultcStyle = "width: 50px;margin: 5px 8px 0 0;font-family: Arial, sans-serif; font-size: 13px; -webkit-user-select: none; padding: 1px 6px; direction: ltr; overflow: hidden; text-align: center; line-height: 20px; border: 1px solid rgb(113, 123, 135); box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px;background-color:rgb(38, 154, 234);color: rgb(255, 255, 255);font-weight:bold;";
		var leftControl = document.createElement("div");
		leftControl.style.cssText = defaultcStyle;
		leftControl.id = "mt_btn1";
		leftControl.innerHTML = "点";
		leftControl.index = 3;

		var rightControl = document.createElement("div");
		rightControl.style.cssText = controlStyle;
		rightControl.id = "mt_btn2";
		rightControl.innerHTML = "线";
		rightControl.index = 2;

		var middleControl = document.createElement("div");
		middleControl.style.cssText = controlStyle;
		middleControl.id = "mt_btn3";
		middleControl.innerHTML = "区域";
		middleControl.index = 1;
		map.controls[qq.maps.ControlPosition.TOP_RIGHT].push(rightControl);
		map.controls[qq.maps.ControlPosition.TOP_RIGHT].push(middleControl);
		map.controls[qq.maps.ControlPosition.TOP_RIGHT].push(leftControl);
		qq.maps.event.addListener(leftControl, 'click', function() {
			$(this).css({'background-color':'rgb(38, 154, 234)','color': 'rgb(255, 255, 255)','font-weight':'bold'});
			$("#mt_btn2,#mt_btn3").css({'background-color':'rgb(255, 255, 255)','color': 'rgb(0, 0, 0)','font-weight':'normal'});
			drawingManager.setOptions({
				drawingMode: qq.maps.drawing.OverlayType.MARKER,
				drawingControl: true,
				drawingControlOptions: {
					position: qq.maps.ControlPosition.TOP_RIGHT,
					drawingModes: [
						qq.maps.drawing.OverlayType.MARKER
					]
				}
			});
		});
		qq.maps.event.addListener(rightControl, 'click', function() {
			$(this).css({'background-color':'rgb(38, 154, 234)','color': 'rgb(255, 255, 255)','font-weight':'bold'});
			$("#mt_btn1,#mt_btn3").css({'background-color':'rgb(255, 255, 255)','color': 'rgb(0, 0, 0)','font-weight':'normal'});
			drawingManager.setOptions({
				drawingMode: qq.maps.drawing.OverlayType.POLYLINE,
				drawingControl: true,
				drawingControlOptions: {
					position: qq.maps.ControlPosition.TOP_RIGHT,
					drawingModes: [
						qq.maps.drawing.OverlayType.POLYLINE
					]
				},
				polylineOptions : {
					strokeWeight: 5
				}
			});
		});
		qq.maps.event.addListener(middleControl, 'click', function() {
			$(this).css({'background-color':'rgb(38, 154, 234)','color': 'rgb(255, 255, 255)','font-weight':'bold'});
			$("#mt_btn2,#mt_btn1").css({'background-color':'rgb(255, 255, 255)','color': 'rgb(0, 0, 0)','font-weight':'normal'});
			drawingManager.setOptions({
				drawingMode: qq.maps.drawing.OverlayType.RECTANGLE,
				drawingControl: true,
				drawingControlOptions: {
					position: qq.maps.ControlPosition.TOP_RIGHT,
					drawingModes: [
						qq.maps.drawing.OverlayType.CIRCLE,
						qq.maps.drawing.OverlayType.POLYGON,
						qq.maps.drawing.OverlayType.RECTANGLE
					]
				}
			});
		});
		qq.maps.event.addListener(drawingManager, 'overlaycomplete', function(res) {
			if(LCobj != ''){
				LCobj.setMap(null);
			}
			LCobj = res.overlay;
			console.log(LCobj);
			//获取到绘制的多边形或者矩形的经纬度坐标数组
			var Ob = new Object();
			var data ='';
			if(res.type == 'marker'){
				Ob.data = res.overlay.getPosition().toString();
				data =  JSON.stringify(Ob);
				$("#map_lat").val((res.overlay.getPosition().getLat()).toFixed(5));//保留5位小数
				$("#map_lng").val((res.overlay.getPosition().getLng()).toFixed(5));
				$("#map_marker_type").val("POINT");
			}
			else if(res.type == 'circle'){
				Ob.center =  res.overlay.getCenter().toString();
				Ob.radius =  res.overlay.getRadius().toString();
				data =   JSON.stringify(Ob);
				$("#map_marker_type").val("CIRCLE");
			}
			else if(res.type == 'polygon'){
				var str = '';
				var path = res.overlay.getPath().forEach(function(e) {
					str +=  e+"|";
				});
				Ob.data = str.substring(0,str.length-1);
				console.log(Ob);
				data = JSON.stringify(Ob);
				$("#map_marker_type").val("POLYGON");
			}
			else if(res.type == 'polyline'){
				var str = '';
				var path = res.overlay.getPath().forEach(function(e) {
					str +=  e+"|";
				});
				Ob.data = str.substring(0,str.length-1);
				console.log(Ob);
				data = JSON.stringify(Ob);
				$("#map_marker_type").val("POLYLINE");
			}
			else if(res.type == 'rectangle'){
				var str = '';
				var path = res.overlay.getPath().forEach(function(e) {
					str +=  e+"|";
				});
				Ob.data = str.substring(0,str.length-1);
				console.log(Ob);
				data = JSON.stringify(Ob);
				$("#map_marker_type").val("RECTANGLE");
			}
			console.log(data);
			//设置位置参数
			$("#map_marker_data").val(data);
			//drawingManager.setMap(null);
		});
	} else if ($("#map_type").val()=='CUX') {
			//设置CoordMapType  样式属性
			function CoordMapType() {
			}
			CoordMapType.prototype.tileSize = new qq.maps.Size(32, 32);
			CoordMapType.prototype.maxZoom = 19;
			CoordMapType.prototype.opacity = 0.5;
	        //创建div样式元素
	        CoordMapType.prototype.getTile = function (coord, zoom, ownerDocument) {
	        	var div = ownerDocument.createElement('div');
	            //iv.innerHTML = coord;
	            div.style.width = this.tileSize.width + 'px';
	            div.style.height = this.tileSize.height + 'px';
	            div.style.fontSize = '10';
	            div.style.borderStyle = 'solid';
	            div.style.borderWidth = '1px';
	            div.style.borderColor = '#AAAAAA';
	            div.style.backgroundColor = '#E5E3DF';
	            return div;
	        };

	        CoordMapType.prototype.name = '网格';
	        CoordMapType.prototype.alt = '显示自定义网格';
	        var coordinateMapType = new CoordMapType();

	        var center = new qq.maps.LatLng(0,0);
	        var map = new qq.maps.Map(document.getElementById('cuxMap'),{
	        	center: center,
	        	zoom: default_zoom_level,
	        	mapTypeId: 'coordinate',

	        });
		 //增加同样的绘图功能
		if(marker_data != "") {
			if(maker_type == "POINT"){
				var Ob = JSON.parse(marker_data);
				console.log(Ob.data);
				var lnglat = Ob.data.split(",");
				var position = new qq.maps.LatLng(lnglat[0],lnglat[1]);
				var marker = new qq.maps.Marker({
					position: position,
					map: map
				});
			}else if(maker_type == "CIRCLE"){
				var Ob = JSON.parse(marker_data);
				var lnglat = Ob.center.split(",");
				var position = new qq.maps.LatLng(lnglat[0],lnglat[1]);
				var circle=new qq.maps.Circle({
					map:map,
					center:position,
					radius:parseFloat(Ob.radius),
					strokeWeight:2
				});
			}else{
				var larr = new Array();
				var path = new Array();
				var Ob = JSON.parse(marker_data);
				larr = Ob.data.split("|");
				for(var i=0;i<larr.length;i++){
					var lnglat = larr[i].split(",");
					path[i] = new qq.maps.LatLng(lnglat[0],lnglat[1]);
				}
				//console.log(path);
				if(maker_type == "POLYLINE") {
					var polyline = new qq.maps.Polyline({
						path: path,
						strokeColor: '#D00',
						strokeWeight: 2,
						editable: false,
						map: map
					});
				}else{
					var polygon = new qq.maps.Polygon({
						path:path,
						strokeColor: '#D00',
						strokeWeight: 2,
						map: map
					});
				}
			}
		}
		var drawingManager = new qq.maps.drawing.DrawingManager({
			/*drawingControl: false,
			 drawingControlOptions: {
			 position: qq.maps.ControlPosition.TOP_CENTER
			 }*/
			drawingMode: qq.maps.drawing.OverlayType.MARKER,
			drawingControl: true,
			drawingControlOptions: {
				position: qq.maps.ControlPosition.TOP_RIGHT,
				drawingModes: [
					qq.maps.drawing.OverlayType.MARKER
				]
			}
		});
		drawingManager.setMap(map);
		//自定义按钮监听事件
		var controlStyle = "width: 50px;margin: 5px 8px 0 0;color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 13px; -webkit-user-select: none; padding: 1px 6px; direction: ltr; overflow: hidden; text-align: center; line-height: 20px; border: 1px solid rgb(113, 123, 135); box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px;background-color: rgb(255, 255, 255);";
		var defaultcStyle = "width: 50px;margin: 5px 8px 0 0;font-family: Arial, sans-serif; font-size: 13px; -webkit-user-select: none; padding: 1px 6px; direction: ltr; overflow: hidden; text-align: center; line-height: 20px; border: 1px solid rgb(113, 123, 135); box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px;background-color:rgb(38, 154, 234);color: rgb(255, 255, 255);font-weight:bold;";
		var leftControl = document.createElement("div");
		leftControl.style.cssText = defaultcStyle;
		leftControl.id = "mt_btn1";
		leftControl.innerHTML = "点";
		leftControl.index = 3;

		var rightControl = document.createElement("div");
		rightControl.style.cssText = controlStyle;
		rightControl.id = "mt_btn2";
		rightControl.innerHTML = "线";
		rightControl.index = 2;

		var middleControl = document.createElement("div");
		middleControl.style.cssText = controlStyle;
		middleControl.id = "mt_btn3";
		middleControl.innerHTML = "区域";
		middleControl.index = 1;
		map.controls[qq.maps.ControlPosition.TOP_RIGHT].push(rightControl);
		map.controls[qq.maps.ControlPosition.TOP_RIGHT].push(middleControl);
		map.controls[qq.maps.ControlPosition.TOP_RIGHT].push(leftControl);

		qq.maps.event.addListener(leftControl, 'click', function() {
			$(this).css({'background-color':'rgb(38, 154, 234)','color': 'rgb(255, 255, 255)','font-weight':'bold'});
			$("#mt_btn2,#mt_btn3").css({'background-color':'rgb(255, 255, 255)','color': 'rgb(0, 0, 0)','font-weight':'normal'});
			drawingManager.setOptions({
				drawingMode: qq.maps.drawing.OverlayType.MARKER,
				drawingControl: true,
				drawingControlOptions: {
					position: qq.maps.ControlPosition.TOP_RIGHT,
					drawingModes: [
						qq.maps.drawing.OverlayType.MARKER
					]
				}
			});
		});
		qq.maps.event.addListener(rightControl, 'click', function() {
			$(this).css({'background-color':'rgb(38, 154, 234)','color': 'rgb(255, 255, 255)','font-weight':'bold'});
			$("#mt_btn1,#mt_btn3").css({'background-color':'rgb(255, 255, 255)','color': 'rgb(0, 0, 0)','font-weight':'normal'});
			drawingManager.setOptions({
				drawingMode: qq.maps.drawing.OverlayType.POLYLINE,
				drawingControl: true,
				drawingControlOptions: {
					position: qq.maps.ControlPosition.TOP_RIGHT,
					drawingModes: [
						qq.maps.drawing.OverlayType.POLYLINE
					]
				},
				polylineOptions : {
					strokeWeight: 5
				}
			});
		});
		qq.maps.event.addListener(middleControl, 'click', function() {
			$(this).css({'background-color':'rgb(38, 154, 234)','color': 'rgb(255, 255, 255)','font-weight':'bold'});
			$("#mt_btn2,#mt_btn1").css({'background-color':'rgb(255, 255, 255)','color': 'rgb(0, 0, 0)','font-weight':'normal'});
			drawingManager.setOptions({
				drawingMode: qq.maps.drawing.OverlayType.RECTANGLE,
				drawingControl: true,
				drawingControlOptions: {
					position: qq.maps.ControlPosition.TOP_RIGHT,
					drawingModes: [
						qq.maps.drawing.OverlayType.CIRCLE,
						qq.maps.drawing.OverlayType.POLYGON,
						qq.maps.drawing.OverlayType.RECTANGLE
					]
				}
			});
		});
		qq.maps.event.addListener(drawingManager, 'overlaycomplete', function(res) {
			if(LCobj != ''){
				LCobj.setMap(null);
			}
			LCobj = res.overlay;
			console.log(LCobj);
			//获取到绘制的多边形或者矩形的经纬度坐标数组
			var Ob = new Object();
			var data ='';
			if(res.type == 'marker'){
				Ob.data = res.overlay.getPosition().toString();
				data =  JSON.stringify(Ob);
				$("#map_lat").val((res.overlay.getPosition().getLat()).toFixed(5));//保留5位小数
				$("#map_lng").val((res.overlay.getPosition().getLng()).toFixed(5));
				$("#map_marker_type").val("POINT");
			}
			else if(res.type == 'circle'){
				Ob.center =  res.overlay.getCenter().toString();
				Ob.radius =  res.overlay.getRadius().toString();
				data =   JSON.stringify(Ob);
				$("#map_marker_type").val("CIRCLE");
			}
			else if(res.type == 'polygon'){
				var str = '';
				var path = res.overlay.getPath().forEach(function(e) {
					str +=  e+"|";
				});
				Ob.data = str.substring(0,str.length-1);
				console.log(Ob);
				data = JSON.stringify(Ob);
				$("#map_marker_type").val("POLYGON");
			}
			else if(res.type == 'polyline'){
				var str = '';
				var path = res.overlay.getPath().forEach(function(e) {
					str +=  e+"|";
				});
				Ob.data = str.substring(0,str.length-1);
				console.log(Ob);
				data = JSON.stringify(Ob);
				$("#map_marker_type").val("POLYLINE");
			}
			else if(res.type == 'rectangle'){
				var str = '';
				var path = res.overlay.getPath().forEach(function(e) {
					str +=  e+"|";
				});
				Ob.data = str.substring(0,str.length-1);
				console.log(Ob);
				data = JSON.stringify(Ob);
				$("#map_marker_type").val("RECTANGLE");
			}
			console.log(data);
			//设置位置参数
			$("#map_marker_data").val(data);
			//drawingManager.setMap(null);
		});


		//map.overlayMapTypes.insertAt(0, coordinateMapType);
	    map.mapTypes.set('coordinate', coordinateMapType);
	    //创建矩形叠加层
	    var groundOverlay = new qq.maps.GroundOverlay({
	    	map:map,
	    	imageUrl:$("#map_layer_url").val(),//e.g.http://.../upload/maps/cux_map.png
	    	bounds:new qq.maps.LatLngBounds(new qq.maps.LatLng(-0.03,-0.04),new qq.maps.LatLng(0.03, 0.04)),
	    	opacity:0.8,
	    	ZIndex:0
	    });

	}


	var current_lat=$("#map_lat").val();
	var current_lng=$("#map_lng").val();
	//alert(current_lat);
	var current_latlng = new qq.maps.LatLng(current_lat,current_lng);

	if ((current_lat!="") && (current_lng!="") && (current_lat!=0)) { //如果当前有数据，则显示一个固定的点做为原点
		map.setCenter(current_latlng);
		map.panTo(current_latlng);

		/*var marker_org=new qq.maps.Marker({
			position:(current_latlng),
			animation:qq.maps.MarkerAnimation.DROP,
			map:map
		});*/
	} else { //if lat and lng is empty, load current city as the default position on map
		if ($("#map_type").val()=='TENCENT') {
			citylocation = new qq.maps.CityService({
				complete : function(result){
					map.setCenter(result.detail.latLng);
				}
			});
			citylocation.searchLocalCity();//如果当前没有数据，则显示当前IP所在的城市，没有原点
		}
	}


	if ($("#map_type").val()=='TENCENT') {
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
	}
	//放大缩小，标记到默认放大尺寸
	qq.maps.event.addListener(map,'zoom_changed',function() {
		$("#map_zoom").val(map.getZoom());
	});
}


function loadMapScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://map.qq.com/api/js?v=2.exp&libraries=drawing&callback=initMap"; //调用了initMap
	$("#cuxMap").css("height","300px");
	document.body.appendChild(script);
}


// 以下为执行的入口
$(document).ready(function(){

	var map_lat = $("#map_lat"),
	map_lng = $("#map_lng"),
	map_zoom =$("#map_zoom"),
	map_type =$("#map_type");
	//初始化界面布局
	map_zoom.attr("readonly",true);
	map_zoom.css("background-color","#efefef");
	$("#map_search_text").val($("#map_address").val());
	// SearchOnMap 和 Rewrite Address都不能正确的被php翻译，需要在Javascript中调用翻译
	$("#btn_map_search").val(SUGAR.language.get('app_strings', 'LBL_MAP_SEARCH_BTN'));
	$("#lbl_rewrite_address").text(SUGAR.language.get('app_strings', 'LBL_REWRITE_ADDRESS'));


	LoadMapType();



	$("#map_type").change(function(){ //每次变更地图类型都会将定位清空
		map_lat.val("0");
		map_lng.val("0");
		map_zoom.val("15");
		//切换画布销毁之前的图层 @by lindu
		$("#cuxMap").html("");
		$("#map_marker_type").val('POINT');
		$("#map_marker_data").val('');
		LoadMapType();
	});

	$("#btn_clr_map_layer").click(function(){//清空图层时，将URL和地图都置空
		$("#map_layer_url").val("");
		LoadMapType();
	});

	$("#map_address").change(function(){
		$("#map_search_text").val($("#map_address").val());
	});
	map_lat.change(function(){
		codeLatLng(parseFloat(map_lat.val()),parseFloat(map_lng.val()));
	});
	map_lng.change(function(){
		codeLatLng(parseFloat(map_lat.val()),parseFloat(map_lng.val()));
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

