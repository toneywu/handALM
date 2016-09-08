function setAssetPopupReturn(popupReplyData){
	set_return(popupReplyData);
	$("#asset_desc_text").text($("#asset_desc").val());
}
function setLocationPopupReturn(popupReplyData){
	set_return(popupReplyData);
	$("#location_desc_text").text($("#location_desc").val());
	
	if($("#location_map_enabled").val()=="1") {
		$("#location_map_enabled_text").show();
	} else {
		$("#location_map_enabled_text").hide();
	}
}

$(document).ready(function(){
	
	//将SR编号标识的不可修改
    if($("#sr_number").val()=="") {
        $("#sr_number").after(SUGAR.language.get('HAM_SR', 'LBL_AUTONUM'));
        $("#sr_number").hide();
    } else {
        $("#sr_number").after($("#sr_number").val());
        $("#sr_number").hide();
    }



	//在地点、资产下方添加一个说明的span
	$("#location").parent().append("<span style='display:block' id='location_desc_text'></span><input type='hidden' id='location_desc' name='location_desc'>");
	$("#asset").parent().append("<span style='display:block' id='asset_desc_text'></span><input type='hidden' id='asset_desc' name='asset_desc'>");
    //这两个变量从view/view.edit.php中传递来
    if (typeof js_var_location_title !== "undefined") {
        $("#location_desc_text").text(js_var_location_title);
    }
    if (typeof js_var_asset_desc !== "undefined") {
            $("#asset_desc_text").text(js_var_asset_desc);
    }
	//在地图字段下加入一个提示当前地点是否有GIS信息的字段
	$("#map_enabled").parent().append("<span id='location_map_enabled_text'>"+SUGAR.language.get('HAM_SR', 'LBL_LOCATION_MAP_ENABLED')+"</span><input type='hidden' id='location_map_enabled' name='location_map_enabled'>");
	$("#location_map_enabled_text").hide();

	
    initTransHeaderStatus()

function initTransHeaderStatus() {
    
    var current_header_status = $("#sr_status").val();
    if (current_header_status=="DRAFT") {//可以DRAFT\SUBMIT\CLOSED
        $("#sr_status option[value='APPROVED']").remove();
        $("#sr_status option[value='INPRG']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='CANCELED']").remove();
    } else if (current_header_status=="SUBMITTED") { //可以CANCEL和SUBMIT
        $("#sr_status option[value='APPROVED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='INPRG']").remove();
        $("#sr_status option[value='CLOSED']").remove();
        setEditViewReadonly ();
    } else if ((current_header_status=="APPROVED")||(current_header_status=="WORKING")) { //可以CANCEL,APPROVED
        $("#sr_status option[value='SUBMITTED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='INPRG']").remove();        
        $("#sr_status option[value='DRAFT']").remove();
        $("#sr_status option[value='CLOSED']").remove();
        setEditViewReadonly ();
    } else if ((current_header_status=="CANCELED")) { //什么也不能做
        $("#sr_status option[value='SUBMITTED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='DRAFT']").remove();
        $("#sr_status option[value='INPRG']").remove();
        $("#sr_status option[value='APPROVED']").remove();
        $("#sr_status option[value='CLOSED']").remove();
        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
        setEditViewReadonly ();
    }else if ((current_header_status=="CLOSED")) { //什么也不能做，同Canceled
        $("#sr_status option[value='SUBMITTED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='DRAFT']").remove();
        $("#sr_status option[value='INPRG']").remove();        
        $("#sr_status option[value='APPROVED']").remove();
        $("#sr_status option[value='CANCELED']").remove();
        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
        setEditViewReadonly ();
    }
}

function setEditViewReadonly () { //如果当前头状态为Submitted、Approved、Canceled、Closed需要将字段变为只读
    $("#tabcontent0 input").attr("readonly",true);
    $("#tabcontent0 button").attr("readonly",true);
    $("#tabcontent0 input").attr("style","background-Color:#efefef");
}


});
