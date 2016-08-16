function setDestinationUOMClassPopupReturn(popupReplyData){
	set_return(popupReplyData);
	chageDestinationUOMClass();
	$("#conversion").val("");
}

function chageDestinationUOMClass() {
	//alert($("#destination_uom_classes_id").val()+" VS "+$("#source_uom_class_id").val());
	if ($("#destination_uom_classes_id").val()==$("#source_uom_class_id").val()) {
		//在同一单位分类内进行定义
		mark_field_enabled("destination_unit");
	} else {
		//在不同的单位之间进行定义
		mark_field_disabled("destination_unit");
	}
}

function mark_field_disabled(field_name) { //这是简化版本，详细的可参考Trans_lines
	mark_obj = $("#"+field_name);
	mark_obj.attr("style","color:#000000;background-Color:#efefef;");
	mark_obj.attr("readonly",true);

	if  (typeof $("#btn_"+field_name)!= 'undefined') {
		$("#btn_"+field_name).attr("style","visibility:hidden");
	}
	if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
		$("#btn_clr_"+field_name).attr("style","visibility:hidden");
	}
}

function mark_field_enabled(field_name) {
	$("#"+field_name).attr("style","color:#000000:background-Color:#000000");
	$("#"+field_name).attr("readonly",false);
	$("#"+field_name+"_label").attr("style","color:#000000;text-decoration:none;")

	if  (typeof $("#btn_"+field_name)!= 'undefined') {//移除选择按钮
		$("#btn_"+field_name).attr("style","visibility:visible");
	}
	if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
		$("#btn_clr_"+field_name).attr("style","visibility:visible");
	}
}

$(document).ready(function() {
	chageDestinationUOMClass();
	mark_field_disabled("description");

	$("#btn_clr_destination_uom_class").on('click', function() { //消除分类
	    $("#destination_unit").val("");
	    $("#destination_unit_id").val("");
	    $("#conversion").val("");
		chageDestinationUOMClass();//直接引用，自动还原
	});

	$("#btn_clr_destination_unit").on('click', function() { //消除分类下的单位
	    $("#conversion").val("");
		chageDestinationUOMClass();//直接引用，自动还原
	});

	$("#conversion").on('change', function() { //消除分类下的单位
	    $("#description").val("1 "+$("#destination_unit").val()+" = "+$("#conversion").val()+" "+$("#source_uom").val()+" = " + $("#conversion").val()/$("#primary_uom_conversion").val()+" "+$("#primary_uom").val());
	    //alert($("#name").val());
	});


})