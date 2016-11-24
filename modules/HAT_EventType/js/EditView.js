function reset_EventType_Fields() {
	//alert("called");
	if ($('#require_confirmation').val()=='LOCKED') { //如果不需要二次确认，则没有二次确认的中间状态
		mark_field_disabled('change_processing_status');
		$("#change_processing_status").attr("checked",false);
		mark_field_disabled('processing_asset_status');
	} else {
		mark_field_enabled('change_processing_status');
		mark_field_enabled('processing_asset_status');
	}

	if ($('#change_organization').val()=='LOCKED') {//如果不可更新组织，则不存在跨LE变更组织
		mark_field_disabled('change_oranization_le');
	} else {
		mark_field_enabled('change_oranization_le');
	}

	if($("#change_target_status").val()==1)	{
		mark_field_enabled('target_asset_status');//show();
	} else {
		mark_field_disabled('target_asset_status');//show();
	}

	if($("#change_processing_status").val()==1) {
		mark_field_enabled('processing_asset_status');//show()
	} else {
		mark_field_disabled('processing_asset_status');//show()
	}

}
/*
function mark_field_disabled(field_name) {
	$("#"+field_name).attr("style","color:#efefef;background-Color:#efefef;");
	$("#"+field_name).attr("disabled",true);
	$("#"+field_name+"_label").attr("style","color:#aaaaaa;text-decoration:line-through");
	$("#"+field_name+"_label .required").hide();

}
function mark_field_enabled(field_name) {
	$("#"+field_name).attr("style","color:#000000:background-Color:#000000");
	$("#"+field_name).attr("disabled",false);
	$("#"+field_name+"_label").attr("style","color:#000000;text-decoration:none;");
	$("#"+field_name+"_label .required").show();

}*/


$(document).ready(function() {

	reset_EventType_Fields();

	$('#EditView select, #EditView input').change(function(){
		reset_EventType_Fields();
	});

})