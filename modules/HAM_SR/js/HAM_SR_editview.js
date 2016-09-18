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


/**
 * 设置不可输入 add by yuan.chen2016-09-08
 */
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
/**
 * 设置必输 add by yuan.chen2016-09-08
 */
//设置字段不可更新
function mark_field_enabled(field_name,not_required_bool) {
	  //field_name = 字段名，不需要jquery select标志，直接写名字
	  //not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=true则为非必须
	  //alert(not_required_bool);
	  $("#"+field_name).css({"color":"#000000","background-Color":"#ffffff"});
	  $("#"+field_name).attr("readonly",false);
	  $("#"+field_name+"_label").css({"color":"#000000","text-decoration":"none"})

	  if(typeof not_required_bool == "undefined" || not_required_bool==false || not_required_bool=="") {
	      addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());//将当前字段标记为必须验证
	      //打上必须星标
	      if  ($("#"+field_name+"_label .required").text()!='*') {//如果没有星标，则打上星标
	        $("#"+field_name+"_label").html($("#"+field_name+"_label").text()+"<span class='required'>*</span>");//打上星标
	      } else {//如果已经有星标了，则显示出来
	        $("#"+field_name+"_label .required").show();
	      }
	  } else { //如果不是必须的，则不显示星标
	    //直接Remove有时会出错，所有先设置为Validate再Remove
	    addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());
	    removeFromValidate('EditView',field_name);
	     //去除必须验证
	    $("#"+field_name+"_label .required").hide();
	  }
	  if  (typeof $("#btn_"+field_name)!= 'undefined') {//移除选择按钮
	    $("#btn_"+field_name).css({"visibility":"visible"});
	  }
	  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
	    $("#btn_clr_"+field_name).css({"visibility":"visible"});
	  }
}

/**
 * 设置必输 add by yuan.chen2016-09-08
 * 状态为结束（无论是手工改选还是通过按钮跳转），在关闭日期、关闭人字段都是必须提供的。在其它状态下，这两个字段是信用
 */
function close_people_info(){
	var sr_status = $("#sr_status").val();
	if(sr_status!="COMPLETE"){
        //非完成状态时，时间和人员信息不可填写
		mark_field_disabled("closed_date",false);
		mark_field_disabled("closed_by",false);
	}else{
        //完成状态时，时间和人员信息必须提供
		mark_field_enabled("closed_date",false);
		mark_field_enabled("closed_by",false);
	}
}

$(document).ready(function(){


    close_people_info();

    /**
     * add by yuan.chen 2016-09-08
     */
    var current_header_status = $("#sr_status").val();
    if(current_header_status!="DRAFT"){
    	mark_field_disabled("name",false);
    	mark_field_disabled("event_type",false);
    	mark_field_disabled("priority",false);
    	mark_field_disabled("description",false);
    	mark_field_disabled("reported_date",false);
    	mark_field_disabled("location",false);
    	mark_field_disabled("asset",false);
    	mark_field_disabled("location_extra_desc",false);
    	mark_field_disabled("map_enabled",false);
    	if(current_header_status=="CLOSED"||current_header_status=="CANCELED"){
    		mark_field_disabled("map_search_text",false);
    		mark_field_disabled("map_type",false);
    		mark_field_disabled("map_lat",false);
    		mark_field_disabled("map_lat",false);
    		mark_field_disabled("map_lng",false);
    		mark_field_disabled("reporter_org",false);
    		mark_field_disabled("reporter",false);
    		mark_field_disabled("work_phone",false);
    		mark_field_disabled("mobile",false);
    		mark_field_disabled("email",false);
    		mark_field_disabled("contact_by",false);
    		mark_field_disabled("contact_notes",false);
    		mark_field_disabled("contact_by",false);
    		mark_field_disabled("owned_org",false);
    		mark_field_disabled("owned_by",false);
    		mark_field_disabled("worklog",false);
    		mark_field_disabled("closed_by",false);
    		mark_field_disabled("closed_date",false);
    		
    	}
    }
    
    $("#sr_status").change(function(){
		close_people_info();
	});
    //end modified
    


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
        $("#sr_status option[value='CLOSED']").remove();
    } else if (current_header_status=="SUBMITTED") { //可以CANCEL和SUBMIT
        $("#sr_status option[value='APPROVED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='INPRG']").remove();
        $("#sr_status option[value='CLOSED']").remove();
        $("#sr_status option[value='COMPLETE']").remove();
        setEditViewReadonly ();
    } else if ((current_header_status=="APPROVED")||(current_header_status=="WORKING")) { //可以CANCEL,APPROVED,COMPLETE
        $("#sr_status option[value='SUBMITTED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='INPRG']").remove();
        $("#sr_status option[value='DRAFT']").remove();
        $("#sr_status option[value='CLOSED']").remove();
        setEditViewReadonly ();
    }else if ((current_header_status=="INPRG")) { //可以CANCEL，不可以Approved
        $("#sr_status option[value='SUBMITTED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='DRAFT']").remove();
        $("#sr_status option[value='APPROVED']").remove();
        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
        setEditViewReadonly ();
    } else if ((current_header_status=="CANCELED")) { //什么也不能做
        $("#sr_status option[value='SUBMITTED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='DRAFT']").remove();
        $("#sr_status option[value='INPRG']").remove();
        $("#sr_status option[value='APPROVED']").remove();
        $("#sr_status option[value='CLOSED']").remove();
        $("#sr_status option[value='COMPLETE']").remove();
        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
        setEditViewReadonly ();
    }else if ((current_header_status=="COMPLETE")) { //什么也不能做，同Canceled
        $("#sr_status option[value='SUBMITTED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='DRAFT']").remove();
        $("#sr_status option[value='INPRG']").remove();
        $("#sr_status option[value='APPROVED']").remove();
        $("#sr_status option[value='CANCELED']").remove();
        $("#sr_status option[value='CLOSED']").remove();
        setEditViewReadonly ();
    }else if ((current_header_status=="CLOSED")) { //什么也不能做，同Canceled
        $("#sr_status option[value='SUBMITTED']").remove();
        $("#sr_status option[value='REJECTED']").remove();
        $("#sr_status option[value='DRAFT']").remove();
        $("#sr_status option[value='INPRG']").remove();
        $("#sr_status option[value='APPROVED']").remove();
        $("#sr_status option[value='CANCELED']").remove();
        $("#sr_status option[value='COMPLETE']").remove();
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
