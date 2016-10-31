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
		open_popup($("#source_code").val(), 1200, 850, '', true, true, popupRequestData);
	}
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
});
//选择事件类型的回调函数
function setEventTypeReturn(popupReplyData){
	set_return(popupReplyData);
	call_ff();
}
 
function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"HAOS_Revenues_Quotes");
	$(".expandLink").click();
}


function resetParentInfo(){  
	$("#source_reference").val("");
	$("#source_id").val("");
	$("#source_number").val("");
	$("#source_class").val("");
	$("#source_type").val("");
	$("#source_name").val("");
}
