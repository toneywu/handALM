var isResizing = false,
    lastDownY = 0;
    lastHeight = 0;

function initMap() {

	//alert(default_zoom_level);
	function CoordMapType() {
	}
        //设置CoordMapType  样式属性
        CoordMapType.prototype.tileSize = new qq.maps.Size(32, 32);
        CoordMapType.prototype.maxZoom = 19;

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
        	zoom: 15,
        	mapTypeId: 'coordinate',
        });

        map.overlayMapTypes.insertAt(0, coordinateMapType);
    //map.mapTypes.set('coordinate', coordinateMapType);
    //创建矩形叠加层
    var groundOverlay = new qq.maps.GroundOverlay({
    	map:map,
    	imageUrl:$("#map_url").val(),
    	bounds:new qq.maps.LatLngBounds(new qq.maps.LatLng(-0.03,-0.04),new qq.maps.LatLng(0.03, 0.04)),
    	opacity:0.8,
    });
}

function loadMapScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://map.qq.com/api/js?v=2.exp&callback=initMap";
    $("#cuxMap").css({  "margin":"0",
                        "padding":"0",
                        "height":"100%",
                        "min-height":"250px",
                        "width":"100%"
                    });
	document.body.appendChild(script);
}


$(document).ready(function(){
	loadMapScript();

	//ref:http://jsfiddle.net/T4St6/82/
	//
	$('#cuxMap').after('<div style="margin:0px;height:10px;background-Color:#efefef;text-align:center;cursor:s-resize;border:1px solid #cbcbcb;" id="drag_down"></div>');
	var cuxMap = $('#cuxMap'),
        handle = $('#drag_down');

 	handle.on('mousedown', function (e) {
        isResizing = true;
        lastDownY = e.clientY;
        lastHeight = cuxMap.height();
        //alert(lastDownY);
    });

 	handle.on('mousemove', function (e) {
        handle.css('background-Color', '#cccccc');
        handle.css('border', '1px solid #000');
    });
 	handle.on('mouseout', function (e) {
        handle.css('background-Color', '#efefef');
        handle.css('border', '1px solid #cbcbcb');
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


});