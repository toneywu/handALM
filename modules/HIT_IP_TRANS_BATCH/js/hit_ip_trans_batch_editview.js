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

function resetEventType(){
};


function setWoPopupReturn(popupReplyData){
	set_return(popupReplyData);
	if($("#source_wo").val()=="") {
		$("#source_woop").val("");
		$("#source_woop_id").val("");
		mark_field_disabled("source_woop",false);
	}else{
		mark_field_enabled("source_woop",true);
	}
}
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
}


$(document).ready(function(){
//  if  (typeof $("#btn_"+field_name)!= 'undefined') {
//    $("#btn_"+field_name).css({"visibility":"hidden"});
//  }
//  
//  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
//    $("#btn_clr_"+field_name).css({"visibility":"hidden"});
//  }
		  
	mark_field_disabled("email",false);
	
	if($("#source_wo").val()=="") {
		mark_field_disabled("source_woop",false);
	}
	
	$("#source_wo").change(function(){
		if($("#source_wo").val()=="") {
			$("#source_woop").val("");
			$("#source_woop_id").val("");
			mark_field_disabled("source_woop",false);
		}
	});	
	
	$("#btn_clr_source_wo").click(function(){
		if($("#source_wo").val()=="") {
			$("#source_woop").val("");
			$("#source_woop_id").val("");
			mark_field_disabled("source_woop",false);
		}
	});	
	
	$("#contact_name").change(function(){
		if($("#contact_name").val()=="") {
			$("#email").val("");
			mark_field_disabled("source_woop",false);
		}
	});	
	
	$("#btn_clr_contact_name").click(function(){
		if($("#contact_name").val()=="") {
			$("#email").val("");
			mark_field_disabled("email",false);
		}
	});	
	
	
}
)
