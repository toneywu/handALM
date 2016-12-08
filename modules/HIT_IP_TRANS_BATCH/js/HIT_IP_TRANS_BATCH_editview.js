function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HIT_IP_TRANS_BATCH");
    $(".expandLink").click();
}

var prodln = 0;
var global_eventOptions;

function setEventTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	setEventTypeFields();
}


function showWOLines(wo_id) {
    console.log('index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + wo_id);
        $.ajax({
            url: 'index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + wo_id,
            success: function (data) {
                //console.log(data);
                $("#wo_lines_display").html(data);
            },
            error: function () { //失败
                alert('Error loading document');
            }
        });
};


function setTargetOwningOrgPopupReturn(popupReplyData){
	set_return(popupReplyData);
	if($("#target_owning_org").val()=="") {
		$("#contact_name").val("");
		$("#account_id").val("");
		$("#email").val("");
	}else{
		mark_field_enabled("contact_name",true);
	}
}


function setEventTypeFields() {
	$.ajax({//
		url: 'index.php?to_pdf=true&module=HAT_EventType&action=getTransSetting&id=' + $("#hat_eventtype_id").val(),//e74a5e34-906f-0590-d914-57cbe0e5ae89
		async: false,
		success: function (data) {
			global_eventOptions = jQuery.parseJSON(data);
			console.log(global_eventOptions);

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
	//console.log(popupReplyData);
	$("location_id").val(popupReplyData.name_to_value_array.location_id);
	//console.log(popupReplyData.name_to_value_array.location_id);
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
/*function mark_field_enabled(field_name,not_required_bool) {
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
      $("#"+field_name+"_btn").remove();
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
*/
$(document).ready(function(){

	if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
		$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
	}
	//触发FF
	SUGAR.util.doWhen("typeof setFF == 'function'", function(){
		call_ff();
	});

	SUGAR.util.doWhen("typeof mark_field_disabled != 'undefined'", function(){
		if ($("#hat_eventtype_id").val() != "") {
			setEventTypeFields();//初始化EventType，完成后会将EventType的值写入global_eventOptions
		}
	});

	//add by yuan.chen
	if(typeof source_wo_id_tt!="undefined"){
		$("#CANCEL_HEADER").bind("click",function(){
			SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=HAM_WO&record='+source_wo_id_tt)
		});	
	};
	


	mark_field_disabled("email",false);
	if($("target_owning_org").val()==""){
	    mark_field_disabled("contact_name",false);
	}
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
			mark_field_disabled("email",false);
		}
	});	
	
	$("#btn_clr_contact_name").click(function(){
		if($("#contact_name").val()=="") {
			$("#email").val("");
			mark_field_disabled("email",false);
		}
	});	
	
	
	$("#target_owning_org").change(function(){
		if($("#target_owning_org").val()=="") {
			$("#contact_name").val("");
			$("#email").val("");
			mark_field_disabled("contact_name",false);
			mark_field_disabled("email",false);
		}
	});	
	
	$("#btn_clr_target_owning_org").click(function(){
		if($("#target_owning_org").val()=="") {
			$("#contact_name").val("");
			$("#email").val("");
			mark_field_disabled("contact_name",false);
			mark_field_disabled("email",false);
		}
	});	
	
	$("#email").css("color","");
	
	$("#wo_lines").hide();
    $("#wo_lines").after("<div id='wo_lines_display'></div>")
    if ($("#source_wo_id").val()!="") {
    	//如果来源于工作单则显示工作单对象行信息，否则直接隐藏行
    	showWOLines($("#source_wo_id").val());
    } else {
		$("#wo_lines").parent("td").prev("td").hide();
    }
	
	//add by yuan.chen 2016-12-08
	if($("#asset_trans_status").val()=="APPROVED"){
	   //$("#EditView_tabs button").css("display","none");
	   $("#EditView_tabs input").attr("readonly",true);
       $("#EditView_tabs input").attr("style","background-Color:#efefef");
	   $("#EditView_tabs textarea").attr("readonly",true);
	   $("#EditView_tabs select").attr("disabled","disabled");
	   $("#EditView_tabs select").css("background-Color","#efefef");
	   $("#EditView_tabs input").attr("disabled","disabled");
	   $("#EditView_tabs .dateTime").hide();
		$(".input-group-addon").hide();
		$("#EditView_tabs button").addClass("button");
		$("#EditView_tabs button").removeAttr("style");
		$("#EditView_tabs button").remove();
		$("input[name^=btn_edit_line]").remove();
	}
}
)
