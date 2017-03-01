//本文件被Selector.php引用，用于调整工作台的尺寸。
//包括整体高度，以及树型工作台的左右宽度。

var isResizingY = false,
isResizingX = false,
isResizingX2 = false,
lastDownY = 0,
lastDownX = 0,
lastWidth = 0,
lastHeight = 0;


$(document).ready(function(){

	$('#workbench').after('<div style="margin:-8px 0 0 0;height:10px;background-Color:#e9e9e9;border:1px solid #9e9e9e;text-align:center;cursor:s-resize;" id="drag_down"></div>');
	$('#workbench_left').after('<div style="margin:0;height:100%;width:10px;background-Color:#e9e9e9;border:1px solid #9e9e9e;text-align:center;cursor:w-resize;" id="drag_left"></div>');
	$('#workbench_mid').after('<div style="margin:0;height:100%;width:10px;background-Color:#e9e9e9;border:1px solid #9e9e9e;text-align:center;cursor:w-resize;" id="drag_left2"></div>');
	$('#drag_left2').hide();

	var heightChangeOBJ = $('#workbench'),
	heightChangeInnerOBJ = $('#workbench_left,#node_details,#workbench_mid,#drag_left,#drag_left2'),
	widthChangeOBJ = $('#workbench_left'),
	widthChangeOBJ2 = $('#node_details'),
	handle = $('#drag_down,#drag_left'),
	handleY = $('#drag_down'),
	handleX = $('#drag_left');
	handleX2 = $('#drag_left2');

	resizeHeight();

	handleY.on('mousedown', function (e) {
		isResizingY = true;
		isResizingX = false;
		isResizingX2 = false;
		lastDownY = e.clientY;
		lastHeight = heightChangeOBJ.height();
        //alert(lastDownY);
    });

	handleX.on('mousedown', function (e) {
		isResizingY = false;
		isResizingX = true;
		isResizingX2 = false;
		lastDownX = e.clientX;
		lastWidth = widthChangeOBJ.width();
        //alert(lastDownY);
    });

	handleX2.on('mousedown', function (e) {
		isResizingY = false;
		isResizingX = false;
		isResizingX2 = true;
		lastDownX = e.clientX;
		console.log("widthChangeOBJ2.width()="+$("#node_details").width()+"Outer="+$("#node_details").outerWidth()+" inner="+$("#node_details").innerWidth());
		console.log(widthChangeOBJ2);
		lastWidth = widthChangeOBJ2.outerWidth();
        //alert(lastDownY);
    });


	$(document).on('mousemove', function (e) {
        // we don't want to do anything if we aren't resizing.
        if (!isResizingY && !isResizingX  && !isResizingX2)
        	return;

        if (isResizingY) {
	        var offsetHeight = lastHeight + (e.clientY - lastDownY);//-heightChangeOBJ.height()
	        //alert(e.clientY - lastDownY);
	        heightChangeOBJ.css('height', offsetHeight);
	        resizeHeight();

	    } else if (isResizingX) {
	    	var offsetWidth = lastWidth + (e.clientX - lastDownX);

        	widthChangeOBJ.css('width', offsetWidth);
        	if($("#workbench_mid").is(':visible')){
        		$("#workbench_mid").css("width",$("#workbench").width()-widthChangeOBJ.outerWidth()-widthChangeOBJ2.outerWidth()-20);
        	}else{
        		$("#node_details").css("width",$("#workbench").width()-widthChangeOBJ.outerWidth()-10);
        	}
       

        } else if (isResizingX2) {
	    	var offsetWidth = lastWidth - (e.clientX - lastDownX) + 10;
        	console.log('lastWidth='+lastWidth+" offsetWidth="+offsetWidth);
        	widthChangeOBJ2.css('width', offsetWidth);
        	//与ResizingX不同X2只有一种场景，就是3个面板，固定左边，调整右边，然后动态计算中间的
        	$("#workbench_mid").css("width",$("#workbench").width()-widthChangeOBJ.outerWidth()-widthChangeOBJ2.outerWidth()-20);
       
        }
    }).on('mouseup', function (e) {
        // stop resizing
        isResizingY = false;
        isResizingX = false;
        isResizingX2  = false;
    });


    function resizeHeight() {
    	var offsetHeightheight = heightChangeOBJ.height()-10;
    	heightChangeInnerOBJ.css('height',offsetHeightheight);
    }

});

function showGridPanel() { //调整为左中右，3分模式
	if ($("#workbench_left").width()>=480) {
		$("#workbench_left").css("width","350px");
	}
	if ($("#node_details").width()>500) {
		$("#node_details").css("width","350px");
		$("#node_details").css("float","right");
	}
	$("#workbench_mid").css("width",$("#workbench").width()-$("#node_details").width()-$("#workbench_left").width()-50);
	$("#workbench_mid").show()
	$("#drag_left2").show()
}

function hideGridPanel() {//调整为左右，2分隔模式
	if ($("#workbench_left").width()<=350) {
		$("#workbench_left").css("width","550px");
	}
	$("#workbench_mid").hide();
	$('#drag_left2').hide();
	$("#node_details").css("width",$("#workbench").width()-$("#workbench_left").width()-20);
}

