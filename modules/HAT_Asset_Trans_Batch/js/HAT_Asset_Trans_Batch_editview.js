var prodln = 0;

function setEventTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	setEventTypeFields();
}

function setEventTypeFields() {
	$.ajax({//
		url: 'index.php?to_pdf=true&module=HAT_EventType&action=getTransSetting&id=' + $("#hat_eventtype_id").val(),//e74a5e34-906f-0590-d914-57cbe0e5ae89
		async: false,
		success: function (data) {
			var obj = jQuery.parseJSON(data);
			//console.log(obj);
			for(var i in obj) {
				$("#"+i).val(obj[i]);//向隐藏的字段中复制值，从而所有的EventType值都会提供到隐藏的字段中
			}
			resetEventType();
		},
		error: function () { //失败
			alert('Error loading document');
		}
	})
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
/*	if (isFirstTime!=true) {
		$("#target_organization_c").val("");//只要重新选择，一律清单空组织字段
		$("#target_organization_c_id").val("");
		cleanAllTransLines();
	}
*/

	var change_org_value = $("#change_owning_org").val();//根据是否需要修改组织的EventType来标记Target Organization状态
	if(change_org_value=='LOCKED'||change_org_value==''){//如果不需要更新组织，则失效目标组织字段
		mark_field_disabled("target_owning_org");
	}else if(change_org_value=='OPTIONAL') {
		mark_field_enabled("target_owning_org", true);//启用目标组织字段，非必须
	}else{
		mark_field_enabled("target_owning_org");//启用目标组织字段，必须
	}

	var change_org_value = $("#change_using_org").val();//根据是否需要修改组织的EventType来标记Target Organization状态
	if(change_org_value=='LOCKED'||change_org_value==''){//如果不需要更新组织，则失效目标组织字段
		mark_field_disabled("target_using_org");
	}else if(change_org_value=='OPTIONAL') {
		mark_field_enabled("target_using_org", true);//启用目标组织字段
	}else{
		mark_field_enabled("target_using_org");//启用目标组织字段
	}

}
/*
function checkLinesReady() { //判断是否可以添加行
	//alert("checkLinesReady");
	if ($("#account_id_c").val()!=''&&$("#hat_eventtype_id").val()!=''&&($("#change_organization").val() == 'LOCKED'||$("#account_id1_c").val()!=''))
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

$(document).ready(function(){

	//$("#lov_asset_status_list").parent("td").hide();
	$("#detailpanel_2").hide();

	resetEventType(true);

	if ($("#hat_eventtype_id").val() != "") {
		setEventTypeFields();
	}

	initTransHeaderStatus();

});
