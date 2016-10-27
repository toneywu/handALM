$.getScript("modules/HAA_FF/ff_include.js");

$(document).ready(function() {
    //这里可以有其它代码;
     
    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    	call_ff();
    })
});
//选择合同类型的回调函数
function setEventTypeReturn(popupReplyData){
	set_return(popupReplyData);
	call_ff();
}
 
function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"AOS_Invoices");
	$(".expandLink").click();
}
//选择来源类型的回调函数
function openParentPopup(){
	if ($("#source_code_c").val()==="AOS_Contracts"){
		var popupRequestData = {
			"call_back_function" : "setParentReturn",
			"form_name" : "EditView",
			"field_to_name_array" : {
				"id" : "parent_id" ,
				"name" : "parent_name" ,
				"contract_number_c" : "parent_number",
				"contract_subtype_c" : "parent_sub_type" ,
				"type_c" : "parent_class" ,
			}
		};
		open_popup($("#source_code_c").val(), 1200, 850, '', true, true, popupRequestData);
	}


}
function setParentReturn(popupReplyData){
	set_return(popupReplyData);
	$("#source_id_c").val($("#parent_id").val());
}

function resetParentInfo(){  
	$("#source_reference_c").val("");
	$("#source_id_c").val("");
	$("#parent_number").val("");
	$("#parent_class").val("");
	$("#parent_id").val("");
	$("#parent_sub_type").val("");
	$("#parent_name").val("");
}
