$.getScript("modules/HAA_FF/ff_include.js");


//选择合同类型的回调函数
function setContractTypePopupReturn(popupReplyData){
    set_return(popupReplyData);
    call_ff();
}
 
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"AOS_Contracts");
    $("a.collapsed").click();
}

function setPreContractPopupReturn(popupReplyData) {
	popupReplyData["name_to_value_array"]["contract_revision_c"]=String(parseInt(popupReplyData["name_to_value_array"]["contract_revision_c"])+1);
	set_return(popupReplyData);
	
}