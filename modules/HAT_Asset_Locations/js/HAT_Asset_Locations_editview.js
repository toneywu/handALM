$.getScript("modules/HAA_FF/ff_include.js");
//load triger_setFF()

function setLocationTypePopupReturn(popupReplyData){//选择地点类型后
	set_return(popupReplyData);
	call_ff();
}

function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"HAT_Asset_Locations");
	$(".expandLink").click();
}


$(document).ready(function() {
	//alert("haa_ff_id="+$("#haa_ff_id").val());
	if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
		$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
	}

	//加载图标选择器，从modules\HAT_Assets\js\editview_icon_picker.js
	SUGAR.util.doWhen("typeof icon_edit_init == 'function'", function(){
		icon_edit_init($("#location_icon"));
	});


	//触发FF
	SUGAR.util.doWhen("typeof setFF == 'function'", function(){
		call_ff();
	});


});