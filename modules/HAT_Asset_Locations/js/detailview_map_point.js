var isResizing = false,
    lastDownY = 0;
    lastHeight = 0;

function initMap() {

  //var myLatlng = new qq.maps.LatLng(-34.397, 150.644);
  var default_zoom_level;
	var maker_type = '';
	var maker_data = '';
	maker_type = $("#map_marker_type").val();
	marker_data = $("#map_marker_data").val();
  default_zoom_level=parseInt($("#map_zoom").text());
  if(isNaN(default_zoom_level)||default_zoom_level==""){
  	//$("#map_zoom").val(15);
  	default_zoom_level=15;
  }

//alert(default_zoom_level);
if ($("#map_type").val()=='TENCENT') {

	var myOptions = {
		zoom: default_zoom_level,
		mapTypeId: qq.maps.MapTypeId.ROADMAP
	};
	map = new qq.maps.Map(document.getElementById("cuxMap"), myOptions);
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

} else if ($("#map_type").val()=='CUX') {
		//设置CoordMapType  样式属性
		function CoordMapType() {
		}
		CoordMapType.prototype.tileSize = new qq.maps.Size(256, 256);
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
        //map.overlayMapTypes.insertAt(0, coordinateMapType);
	map.mapTypes.set('coordinate', coordinateMapType);
    //创建矩形叠加层
    var groundOverlay = new qq.maps.GroundOverlay({
    	map:map,
    	imageUrl:$("#map_layer_url").val(),//e.g. http://localhost/suite/upload/maps/cux_map.png
    	bounds:new qq.maps.LatLngBounds(new qq.maps.LatLng(-0.03,-0.04),new qq.maps.LatLng(0.03, 0.04)),
    	opacity:0.8,
    	//ZIndex:0
    });
 }

 //加载地图完成后，开始加载定位点
    var current_lat=$("#map_lat").text();
    var current_lng=$("#map_lng").text();
	var current_latlng = new qq.maps.LatLng(current_lat,current_lng);

	if ((current_lat!="") && (current_lng!="")) {
		map.setCenter(current_latlng);
		map.panTo(current_latlng);

		var marker=new qq.maps.Marker({
			position:(current_latlng),
			animation:qq.maps.MarkerAnimation.DROP,
			map:map
		});
	} else { //if lat and lng is empty, load current city as the default position on map
		if ($("#map_type").val()=="TENCENT") {
			citylocation = new qq.maps.CityService({
				complete : function(result){
					map.setCenter(result.detail.latLng);
				}
			});
			citylocation.searchLocalCity();
		}

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

function loadHeightHandle() {
	$('#cuxMap').after('<div style="margin:5px;height:3px;background-Color:#CBCBCB;text-align:center;cursor:s-resize;" id="drag_down"></div>');
	var cuxMap = $('#cuxMap'),
        handle = $('#drag_down');

 	handle.on('mousedown', function (e) {
        isResizing = true;
        lastDownY = e.clientY;
        lastHeight = cuxMap.height();
        //alert(lastDownY);
    });

 	handle.on('mousemove', function (e) {
        handle.css('height', '10px');
        handle.css('background-Color', '#ffffff');
        handle.css('border-top', '4px solid #3C8DBC');
        handle.css('border-bottom', '2px dotted #3C8DBC');
    });
 	handle.on('mouseout', function (e) {
        handle.css('height', '3px');
        handle.css('background-Color', '#CBCBCB');
        handle.css('border', '0px none #3C8DBC');
    });

    $(document).on('mousemove', function (e) {
        // we don't want to do anything if we aren't resizing.
        if (!isResizing)
            return;
        var offsetHeight = lastHeight+(e.clientY - lastDownY);//-cuxMap.height()
        //alert(e.clientY - lastDownY);
        cuxMap.css('height', offsetHeight);

    }).on('mouseup', function (e) {
        // stop resizing
        isResizing = false;

    });
}

$(document).ready(function(){
	//var map_type = $("#map_type");
    var map_suppanel=$("#LBL_EDITVIEW_PANEL_GIS").closest('div');
	if( $("#map_type").val()=="TENCENT" || $("#map_type").val()=="CUX") {
		map_suppanel.show();
		loadMapScript();
		loadHeightHandle();
	} else {
		map_suppanel.hide();
	}
});