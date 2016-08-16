//本文件被Selector.php引用，用于调整工作台的尺寸。
//包括整体高度，以及树型工作台的左右宽度。

var isResizingY = false,
isResizingX = false,
lastDownY = 0,
lastDownX = 0,
lastWidth = 0,
lastHeight = 0;



$(document).ready(function(){

	$('#workbench').after('<div style="margin:-8px 0 0 0;height:10px;background-Color:#e9e9e9;border:1px solid #9e9e9e;text-align:center;cursor:s-resize;" id="drag_down"></div>');
	$('#workbench_left').after('<div style="margin:0;height:100%;width:10px;background-Color:#e9e9e9;border:1px solid #9e9e9e;text-align:center;cursor:w-resize;" id="drag_left"></div>');

	var heightChangeOBJ = $('#workbench'),
	heightChangeInnerOBJ = $('#workbench_left,#node_details'),
	widthChangeOBJ = $('#workbench_left'),
	handle = $('#drag_down,#drag_left'),
	handleY = $('#drag_down'),
	handleX = $('#drag_left');

	resizeHeight();

	handleY.on('mousedown', function (e) {
		isResizingY = true;
		isResizingX = false;
		lastDownY = e.clientY;
		lastHeight = heightChangeOBJ.height();
        //alert(lastDownY);
    });

	handleX.on('mousedown', function (e) {
		isResizingY = false;
		isResizingX = true;
		lastDownX = e.clientX;
		lastWidth = widthChangeOBJ.width();
        //alert(lastDownY);
    });

	$(document).on('mousemove', function (e) {
        // we don't want to do anything if we aren't resizing.
        if (!isResizingY && !isResizingX)
        	return;

        if (isResizingY) {
	        var offsetHeight = lastHeight+(e.clientY - lastDownY);//-heightChangeOBJ.height()
	        //alert(e.clientY - lastDownY);
	        heightChangeOBJ.css('height', offsetHeight);
	        resizeHeight();
	    } else if (isResizingX) {
	    	var offsetWidth = lastWidth+(e.clientX - lastDownX);
        	widthChangeOBJ.css('width', offsetWidth);
        }
    }).on('mouseup', function (e) {
        // stop resizing
        isResizingY = false;
        isResizingX = false;
    });


    function resizeHeight() {
    	var offsetHeightheight = heightChangeOBJ.height()-10;
    	heightChangeInnerOBJ.css('height',offsetHeightheight);
    	$("#drag_left").css('height',offsetHeightheight);
    }

});
