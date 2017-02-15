$.getScript("modules/HAA_FF/ff_include.js");
function openSourcePopup(){
	if ($("#source_code").val()==="AOS_Contracts"){
		var popupRequestData = {
			"call_back_function" : "setSourceReturn",
			"form_name" : "EditView",
			"field_to_name_array" : {
				"id" : "source_id" ,
				"name" : "source_name" ,
				"contract_number_c" : "source_number",
				"contract_subtype_c" : "source_class" ,
				"type_c" : "source_type" ,
			}
		};
	}
	else if($("#source_code").val()==="HAT_Incidents"){
		var popupRequestData = {
			"call_back_function" : "setSourceReturn",
			"form_name" : "EditView",
			"field_to_name_array" : {
				"id" : "source_id" ,
				"name" : "source_name" ,
				"event_number" : "source_number",
				"event_type" : "source_type" ,
			}
		};
	}
	else if($("#source_code").val()==="HAT_Asset_Trans_Batch"){
		var popupRequestData = {
			"call_back_function" : "setSourceReturn",
			"form_name" : "EditView",
			"field_to_name_array" : {
				"id" : "source_id" ,
				"name" : "source_name" ,
				"tracking_number" : "source_number",
				"event_type" : "source_type" ,
			}
		};
	}
	open_popup($("#source_code").val(), 1200, 850, '', true, true, popupRequestData);
}

function setSourceReturn(popupReplyData){
	set_return(popupReplyData);
}


$(document).ready(function() {
    //这里可以有其它代码;
     
    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    	call_ff();
    })

    if($("#clear_status").val()=="Cleared"){
	   $("#EditView_tabs input").attr("readonly",true);
	   $("#EditView_tabs input").css("background-Color","#efefef");
	   $("#EditView_tabs textarea").attr("readonly",true);
	   $("#EditView_tabs textarea").css("background-Color","#efefef");
	   $("#EditView_tabs select").attr("disabled","disabled");
	   $("#EditView_tabs select").css("background-Color","#efefef");
	   $("#EditView_tabs input").attr("disabled","disabled");
	   $("#EditView_tabs .dateTime").hide();
	   $(".input-group-addon").hide();
	   $("#EditView_tabs button").addClass("button");
	   $("#EditView_tabs button").removeAttr("style");
	   $("#EditView_tabs button").remove();
	}
});
//选择事件类型的回调函数
function setEventTypeReturn(popupReplyData){
	set_return(popupReplyData);
	call_ff();
}
 
function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"HAOS_Revenues_Quotes");
	$("a.collapsed").click();
}


function resetParentInfo(){  
	$("#source_reference").val("");
	$("#source_id").val("");
	$("#source_number").val("");
	$("#source_class").val("");
	$("#source_type").val("");
	$("#source_name").val("");
}
