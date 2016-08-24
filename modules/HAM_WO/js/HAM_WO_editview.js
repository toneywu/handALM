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

function setWorkCenterPopupReturn(popupReplyData){
	set_return(popupReplyData);
	$("#work_center_res").val("");
	$("#work_center_res_id").val("");
	$("#work_center_people").val("");
	$("#work_center_people_id").val("");
}

function setWorkCenterResPopupReturn(popupReplyData){
	set_return(popupReplyData);
}

/**
 * 点击按钮 调用Ajax请求 获取权限
 * @param name
 */
function checkAccess(id){
		$.ajax({
			url: 'index.php?to_pdf=true&module=HAM_WO&action=checkAccess&id=' + id,
			success: function (data) {
				//alert(data);
				if(data!="Y"){
					window.location.href = "index.php?module=HAM_WO&action=DetailView&record="+id;
				}
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
};

//设置字段不可更新
function mark_field_disabled(field_name, hide_bool, keep_position=false) {
	  mark_obj = $("#"+field_name);
	  mark_obj_lable = $("#"+field_name+"_label");

	  if(hide_bool==true) {
	  	if (keep_position==false) {
	    	mark_obj.closest('td').css({"display":"none"});
	    	mark_obj_lable.css({"display":"none"});
		}else{
	    	mark_obj.closest('td').css({"display":"table-column"});
	    	mark_obj_lable.css({"display":"table-column"});
		}
	  }else{
	  	mark_obj.closest('td').css({"display":""});
	    mark_obj_lable.css({"display":""});
		mark_obj.css({"color":"inherit","background-Color":"#efefef;"});
	  	mark_obj.attr("readonly",true);
	  	mark_obj_lable.css({"color":"#aaaaaa"});
	  }
	  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
	    removeFromValidate('EditView',field_name); // 去除必须验证
	  }
	  $("#"+field_name+"_label .required").hide();

	  if  (typeof $("#btn_"+field_name)!= 'undefined') {
	    $("#btn_"+field_name).css({"visibility":"hidden"});
	  }
	  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
	    $("#btn_clr_"+field_name).css({"visibility":"hidden"});
	  }
	}

$(document).ready(function(){
		
	/**
	 * checkAccess 
	 * 工作单状态为其它状态时（包括已批准、等待XX、正在执行中及未来可能扩展的状态），以下字段不可编辑：
     * 工单编号、维护区域、标准作业活动、工作单类型、位置、设备/资产、合同、目标开始时间、目标完成时间、
     * 工作单来源信息面板下的所有字段    
     * 
	 */
	checkAccess($("input[name='record']").val());
	//权限满足后 字段不可编辑：
	var wo_status = $("#wo_status").val();
	if(wo_status=="APPROVED"||wo_status=="WSCH"||wo_status=="WMATL"||wo_status=="WPCOND"||wo_status=="INPRG"){
		mark_field_disabled("ham_act_id_rule",false);
		mark_field_disabled("site",false);
		mark_field_disabled("event_type",false);
		mark_field_disabled("location",false);
		mark_field_disabled("asset",false);
		mark_field_disabled("contract",false);
		mark_field_disabled("date_target_start",false);
		mark_field_disabled("date_target_finish",false);
		mark_field_disabled("reporter",false);
		mark_field_disabled("reporter_org",false);
		mark_field_disabled("reported_date",false);
		mark_field_disabled("priority",false);
		mark_field_disabled("source_type",false);
		mark_field_disabled("source_reference",false);
	}
	if(wo_status!="DRAFT"){
		mark_field_disabled("ham_act_id_rule",false);
		mark_field_disabled("location",false);
		mark_field_disabled("asset",false);
		mark_field_disabled("event_type",false);
	}
	
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

    if($("#source_type").val()=='SR') {
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
        //$("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        //add by yuan.chen 2016-08-11
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        $("#wo_status option[value='WPREV']").remove();
        $("#wo_status option[value='REWORK']").remove(); 
        //end 
    } else if (current_header_status=="SUBMITTED") { //可以CANCEL和SUBMIT
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='WORKING']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        
        //add by yuan.chen 2016-08-11
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        //end 
        $("#wo_status option[value='WPREV']").remove();
        setEditViewReadonly ();
    } else if ((current_header_status=="APPROVED")||(current_header_status=="RELEASED")||(current_header_status=="REWORK")) { //可以CANCEL,COMPLETED
        /*$("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='RELEASED']").remove();        
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();*/
    	$("#wo_status option[value='RELEASED']").remove();        
    	$("#wo_status option[value='REJECTED']").remove();
    	$("#wo_status option[value='DRAFT']").remove();
    	$("#wo_status option[value='SUBMITTED']").remove();
    	$("#wo_status option[value='COMPLETED']").remove();
    	$("#wo_status option[value='CLOSED']").remove();
    	$("#wo_status option[value='WPREV']").remove();
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
        
      //add by yuan.chen 2016-08-11
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        //end 
        $("#wo_status option[value='WPREV']").remove();
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
        //$("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
      //add by yuan.chen 2016-08-11
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        $("#wo_status option[value='WPREV']").remove();
        //end 
        //setEditViewReadonly ();
    }else if ((current_header_status=="COMPLETED")) { 
    	//add by yuan.chen 2016-08-11
    	$("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='RELEASED']").remove();        
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='CANCELED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
      
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        $("#wo_status option[value='WPREV']").remove();
        setEditViewReadonly ();
      //end 
    }else if((current_header_status=="WSCH")){//等待计划安排 WSCH WMATL WPCOND INPRG CANCELED
    	$("#wo_status option[value='DRAFT']").remove();
    	$("#wo_status option[value='SUBMITTED']").remove();
    	$("#wo_status option[value='APPROVED']").remove();
    	$("#wo_status option[value='COMPLETED']").remove();
    	$("#wo_status option[value='CLOSED']").remove();
    	$("#wo_status option[value='REJECTED']").remove();
    	$("#wo_status option[value='RELEASED']").remove(); 
    	$("#wo_status option[value='REWORK']").remove(); 
    	$("#wo_status option[value='WPREV']").remove();
    	setEditViewReadonly ();
    }else if((current_header_status=="WMATL")){//等待物料 WMATL WSCH WPCOND INPRG CANCELED
    	$("#wo_status option[value='DRAFT']").remove();
    	$("#wo_status option[value='SUBMITTED']").remove();
    	$("#wo_status option[value='APPROVED']").remove();
    	$("#wo_status option[value='COMPLETED']").remove();
    	$("#wo_status option[value='CLOSED']").remove();
    	$("#wo_status option[value='REJECTED']").remove();
    	$("#wo_status option[value='RELEASED']").remove(); 
    	$("#wo_status option[value='REWORK']").remove(); 
    	$("#wo_status option[value='WPREV']").remove();
    	setEditViewReadonly ();
    }else if((current_header_status=="WPCOND")){//等待作业条件 WMATL WSCH WPCOND INPRG CANCELED
    	$("#wo_status option[value='DRAFT']").remove();
    	$("#wo_status option[value='SUBMITTED']").remove();
    	$("#wo_status option[value='APPROVED']").remove();
    	$("#wo_status option[value='COMPLETED']").remove();
    	$("#wo_status option[value='CLOSED']").remove();
    	$("#wo_status option[value='REJECTED']").remove();
    	$("#wo_status option[value='RELEASED']").remove(); 
    	$("#wo_status option[value='REWORK']").remove(); 
    	$("#wo_status option[value='WPREV']").remove();
    }else if((current_header_status=="INPRG")){//正在执行中 WMATL WSCH WPCOND INPRG CANCELED
    	$("#wo_status option[value='DRAFT']").remove();
    	$("#wo_status option[value='SUBMITTED']").remove();
    	$("#wo_status option[value='APPROVED']").remove();
    	$("#wo_status option[value='COMPLETED']").remove();
    	$("#wo_status option[value='CLOSED']").remove();
    	$("#wo_status option[value='REJECTED']").remove();
    	$("#wo_status option[value='RELEASED']").remove(); 
    	$("#wo_status option[value='REWORK']").remove(); 
    	$("#wo_status option[value='WPREV']").remove();
    }
    
}

function setEditViewReadonly () { //如果当前头状态为Submitted、Approved、Canceled、Closed需要将字段变为只读
    $("#tabcontent0 input").attr("readonly",true);
    $("#tabcontent0 button").attr("readonly",true);
    $("#tabcontent0 input").attr("style","background-Color:#efefef");
}

});
