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

function setWoPriorityReturn(popupReplyData){
	set_return(popupReplyData);
	if($("#priority").val()==""){
		$("#priority").val($("#wo_priority").val());
		$("#ham_priority_id").val($("#wo_priority_id").val());
	}
}

function setHamActivityReturn(popupReplyData){
	set_return(popupReplyData);
	if($("#name").val()==""||$("#name").val()==""){
		$("#name").val($("#ham_act_id_rule").val());
	}
	if($("#priority").val()==""||$("#priority").val()==""){
		$("#priority").val($("#wo_priority").val());
		$("#ham_priority_id").val($("#wo_priority_id").val());
	}
}
   

$(document).ready(function(){
	
	var currentDate = new Date();
	var yearStr = currentDate.getFullYear();
	var monthStr = currentDate.getMonth()+1;
	var dayStr = currentDate.getDate();
	var hourStr = currentDate.getHours();
	var minutesStr = currentDate.getMinutes();
	var timeStr = yearStr+"-"+monthStr+"-"+dayStr+" "+hourStr+":"+minutesStr;
	$("#date_target_start").val(timeStr);
	$("#date_target_finish").val(timeStr);
	
//这时obj就是触发事件的对象，可以使用它的各个属性
//还可以将obj转换成jquery对象，方便选用其他元素

	//创建人字段标识的不可修改
/*	$("#created_by_name").attr("readonly",true);
	$("#created_by_name").css("background-Color","#efefef");
    $("#btn_created_by_name,#btn_clr_created_by_name").hide();*/
    //自动编号字段
	
	
	/*alert(SUGAR.language.get('HAM_WO', 'LBL_AUTONUM'));
	for(i in SUGAR){
		alert(i);
	}*/
	
	if($("#wo_number").val()=="") {
        $("#wo_number").after(SUGAR.language.get('HAM_WO', 'LBL_AUTONUM'));
        $("#wo_number").hide();
	} else {
        $("#wo_number").after($("#wo_number").val());
        $("#wo_number").hide();
    }

    if($("#source_type")=='SR') {
        $("#reported_date").attr("type","text");
        $("#site,#LBL_EDITVIEW_PANEL4 input,#LBL_EDITVIEW_PANEL4 select").attr("readonly",true);
        $("#site,#LBL_EDITVIEW_PANEL4 input,#LBL_EDITVIEW_PANEL4 select").css("background-Color","#efefef");
        $("#LBL_EDITVIEW_PANEL4 button,#LBL_EDITVIEW_PANEL4 .dateTime").hide();
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
	$("#map_enabled").parent().append("<span id='location_map_enabled_text'>"+SUGAR.language.get('HAM_WO', 'LBL_LOCATION_MAP_ENABLED')+"</span><input type='hidden' id='location_map_enabled' name='location_map_enabled'>");
	$("#location_map_enabled_text").hide();


    initTransHeaderStatus()

function initTransHeaderStatus() {
    
    var current_header_status = $("#wo_status").val();
    if (current_header_status=="DRAFT") {//可以DRAFT和SUBMIT
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='RELEASED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='CANCELED']").remove();
         $("#wo_status option[value='COMPLETED']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();

    } else if (current_header_status=="SUBMITTED") { //可以CANCEL和SUBMIT
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='WORKING']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        setEditViewReadonly ();
    } else if ((current_header_status=="APPROVED")||(current_header_status=="RELEASED")) { //可以CANCEL,COMPLETED
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='RELEASED']").remove();        
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        setEditViewReadonly ();
    } else if ((current_header_status=="CANCELED")) { //什么也不能做
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='RELEASED']").remove();
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
        setEditViewReadonly ();
    }else if ((current_header_status=="CLOSED")) { //什么也不能做，同Canceled
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='RELEASED']").remove();        
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='CANCELED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
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
