/**
 * 设置必输
 */
function mark_field_enabled(field_name,not_required_bool) {
  //field_name = 字段名，不需要jquery select标志，直接写名字
  //not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=true则为非必须
  //alert(not_required_bool);
  $("#"+field_name).css({"color":"#000000","background-Color":"#ffffff"});
  $("#"+field_name).attr("readonly",false);
  $("#"+field_name+"_label").css({"color":"#000000","text-decoration":"none"})

  if(typeof not_required_bool == "undefined" || not_required_bool==false || not_required_bool=="") {
	  //alert(field_name);
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
  
  //$("#btn_line_hat_asset_name0").css({"visibility":"hidden"});
}

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
	  	$("#btn_"+field_name).css({"visibility":"visible"});
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
	  $("#btn_"+field_name).css({"visibility":"hidden"});
}


function hide_field_disabled(field_name, hide_bool, keep_position=false) {

	  var view = action_sugar_grp1;
	  mark_obj = $("#"+field_name);
	  mark_obj_lable = $("#"+field_name+"_label");

	  if(view === 'EditView') {
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
	        mark_obj.css({"color":"#efefef","background-Color":"#efefef;"});
	        mark_obj.attr("readonly",true);
	        mark_obj_lable.css({"color":"#aaaaaa","text-decoration":"line-through"});
	    }
	    if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
	      removeFromValidate('EditView',field_name); //去除必须验证
	    }
	    $("#"+field_name+"_label .required").hide();

	    if  (typeof $("#btn_"+field_name)!= 'undefined') {
	      $("#btn_"+field_name).css({"visibility":"hidden"});
	    }
	    if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
	      $("#btn_clr_"+field_name).css({"visibility":"hidden"});
	    }
	    //消除已经填写的数据
	    $("#"+field_name).val("");
	    if  (typeof $("#"+field_name+"_id")!= 'undefined') {
	      $("#"+field_name+"_id").val("");
	    }
	  } else {
	    //DetailedView只需要考虑隐藏字段的情况
	      if(hide_bool==true) {
	          if (keep_position==false) {
	            mark_obj.closest('td').css({"display":"none"});
	            mark_obj.closest('td').prev().css({"display":"none"});
	          }else{
	              mark_obj.closest('td').prev().html("");
	              mark_obj.closest('td').html("");
	          }
	      }
	  }
	}
/**
 * loopField
 */
function loopField(fieldName,type){
	
	if(type=="OPTIONAL"){
		for (var i=0;i<prodln;i++) {
			mark_field_enabled(fieldName+i,true);
		 }
	}else if(type=="LOCKED"){
		for (var i=0;i<prodln;i++) {
		    mark_field_disabled(fieldName+i,false);
		}
	}else if(type=="REQUIRED"){
		for (var i=0;i<prodln;i++) {
			//mark_field_disabled(fieldName+i,false);
		    mark_field_enabled(fieldName+i,false);
		}
	}else if(type=="INVISIABLE"){
		//alert(fieldName);
		for (var i=0;i<prodln;i++) {
			//hide_field_disabled(fieldName+i,true,false)
		    $("#"+fieldName+i).css({"visibility":"hidden"});
		    $("#"+fieldName+i+"_label").css({"visibility":"hidden"});
		    $("#btn_"+fieldName+i).css({"visibility":"hidden"});
		    $("#"+fieldName+i).parents('.input_group').remove(); 
		    $("#"+fieldName+"_title").remove(); 
		    $("#displayed_"+fieldName+i).remove(); 
		}
	}	
}
/**
 * 
 */
function changeRequired(lineRecord){
	loopField("line_hit_ip_subnets",lineRecord.lineRecord);
	//loopField("line_hit_ip_subnets",lineRecord.change_associated_ip);
	loopField("line_gateway",lineRecord.change_gateway);
	loopField("line_bandwidth_type",lineRecord.change_bandwidth_type);
	loopField("line_port",lineRecord.change_port);
	loopField("line_speed_limit",lineRecord.change_speed_limit);
	loopField("line_hat_asset_name",lineRecord.change_asset);
	loopField("line_hat_assets_cabinet",lineRecord.change_cabinet);
	loopField("line_monitoring",lineRecord.change_monitoring);
	loopField("line_channel_num",lineRecord.change_channel_num);
	loopField("line_channel_content",lineRecord.change_channel_content);
	loopField("line_mrtg_link",lineRecord.change_mrtg_link);
	loopField("line_access_assets_name",lineRecord.change_access_assets_name);
}