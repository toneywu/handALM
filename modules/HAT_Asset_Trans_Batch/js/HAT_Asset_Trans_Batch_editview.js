var prodln = 0;

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
}

$(document).ready(function(){
	resetEventType(true);
		//reset_EventType_Fields 定义在 'modules/HAT_EventType/js/reset_EvenType_Fields.js',
		//被引用于modules\HAT_Asset_Trans_Batch\metadata
	//$('#LBL_EDITVIEW_PANEL3 select, #LBL_EDITVIEW_PANEL3 input').attr("disabled","desabled");
	//$('#LBL_EDITVIEW_PANEL3').attr("style","backgroundColor:#efefef");

	$('#detailpanel_3').hide();
	initTransHeaderStatus();

});

function setEventTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	resetEventType();
	//console.log(popupReplyData);
	//console.log("target_asset_status3="+$("#target_asset_status").val());
}

function setHeaderOrganizationPopupReturn(popupReplyData) {
	set_return(popupReplyData);
	//checkLinesReady();
	//console.log(popupReplyData);
}

function resetEventType (isFirstTime) {
//在选择了Event Type之后的相关处理，本函数被setEventTypePopupReturn调用，为实质性处理。
// 本函数在页面初始化时也会被首次调用，调用时isFirstTime=true。
	//alert("resetEventType Called");
	if (isFirstTime!=true) {
		$("#target_organization_c").val("");//只要重新选择，一律清单空组织字段
		$("#target_organization_c_id").val("");
		cleanAllTransLines();
	}

	//************Start: Text to Value 因为POPUP返回的值都是Text，需要再重新还原为Value
	$("#target_asset_status").val(getLovValueByText("target_asset_status","lov_asset_status_list"));
	$("#processing_asset_status").val(getLovValueByText("processing_asset_status","lov_asset_status_list"));
	$("#change_organization").val(getLovValueByText("change_organization","lov_cux_event_type_option_list"));
	$("#change_oranization_le").val(getLovValueByText("change_oranization_le","lov_cux_event_type_option_list"));
	$("#change_contact").val(getLovValueByText("change_contact","lov_cux_event_type_option_list"));
	$("#change_location").val(getLovValueByText("change_location","lov_cux_event_type_option_list"));
	$("#change_location_desc").val(getLovValueByText("change_location_desc","lov_cux_event_type_option_list"));
	$("#require_confirmation").val(getLovValueByText("require_confirmation","lov_cux_event_type_option_list"));
	$("#require_approval_workflow").val(getLovValueByText("require_approval_workflow","lov_cux_event_type_option_list"));
	//************End: Text to Value

	//checkLinesReady();

	var change_org_value = $("#change_organization").val();//根据是否需要修改组织的EventType来标记Target Organization状态
	if(change_org_value=='LOCKED'||change_org_value==''){//如果不需要更新组织，则失效目标组织字段
		if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
			removeFromValidate('EditView','target_organization_c');
		}
		mark_field_disabled("target_organization_c");
	}else {
		mark_field_enabled("target_organization_c");//启用目标组织字段
		//之前的行为是依据是否必需更新目标组织，将目标组织字段标记为必须或非必须(已经删除相关代码）
		//正确的行为应当是，无论可选更新还是必须更新，都将目标组织也为必须，然后在提交和默认是验证目标组织是否与来源组织不同
		addToValidate('EditView', 'target_organization_c','varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_ORGANIZATION'));
		$('#target_organization_c_label').html(SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_ORGANIZATION')+"<span class='required'>*</span>");

	}
}
/*
function checkLinesReady() { //判断是否可以添加行
	//alert("checkLinesReady");
	if ($("#account_id_c").val()!=''&&$("#hat_eventtype_id_c").val()!=''&&($("#change_organization").val() == 'LOCKED'||$("#account_id1_c").val()!=''))
	{ //如果当前组织不为空&&事件类型不为空&&//如果不需要填写目标组织或已经填写了目标组织
		$("#detailpanel_2").show();
	}else {
		$("#detailpanel_2").hide();
		cleanAllTransLines();
	}
}*/

function cleanAllTransLines() {

	//重新清空所有的行
	//REF custom\modules\HAT_Asset_Trans\js\line_items.js
	if (prodln>0) {
		for(var i=0;i<prodln;i++ ) {
			markLineDeleted(i ,"line_");
		}
	}
}

function initTransHeaderStatus() {
	var current_header_status = $("#asset_trans_status").val();
	if (current_header_status=="DRAFT") {//可以DRAFT和SUBMIT
		$("#asset_trans_status option[value='APPROVED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		$("#asset_trans_status option[value='CANCELED']").remove();
		$("#asset_trans_status option[value='CLOSED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
	} else if (current_header_status=="SUBMITTED") { //可以CANCEL和SUBMIT
		$("#asset_trans_status option[value='APPROVED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		//$("#asset_trans_status option[value='DRAFT']").remove();
		$("#asset_trans_status option[value='CLOSED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
		setEditViewReadonly ();
	} else if ((current_header_status=="APPROVED")) { //可以CANCEL,APPROVED
		$("#asset_trans_status option[value='SUBMITTED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		$("#asset_trans_status option[value='DRAFT']").remove();
		$("#asset_trans_status option[value='CLOSED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
		setEditViewReadonly ();
	} else if ((current_header_status=="CANCELED")) { //可以CANCEL,APPROVED
		$("#asset_trans_status option[value='SUBMITTED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		$("#asset_trans_status option[value='DRAFT']").remove();
		$("#asset_trans_status option[value='APPROVED']").remove();
		$("#asset_trans_status option[value='CLOSED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
		$("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
		setEditViewReadonly ();
	}else if ((current_header_status=="CLOSED")) { //可以CANCEL,APPROVED
		$("#asset_trans_status option[value='SUBMITTED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		$("#asset_trans_status option[value='DRAFT']").remove();
		$("#asset_trans_status option[value='APPROVED']").remove();
		$("#asset_trans_status option[value='CANCELED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
		$("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
		setEditViewReadonly ();
	}
}

function setEditViewReadonly () { //如果当前头状态为Submitted、Approved、Canceled、Closed需要将字段变为只读
	$("#tabcontent0 input").attr("readonly",true);
	$("#tabcontent0 button").attr("readonly",true);
	$("#tabcontent0 input").attr("style","background-Color:#efefef");
}

function getLovValueByText(focused_textfiled_id,list_Lov_id) { //根据LOV的Text，转为Value
	var LovValue, LovText;
	LovText = $("#"+focused_textfiled_id).val();
	LovValue = $("#"+list_Lov_id+" option").filter(function() {return $(this).html() == LovText;}).val();
	return LovValue;
}