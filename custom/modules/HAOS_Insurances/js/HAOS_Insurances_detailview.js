$.getScript("modules/HAA_FF/ff_include.js");

$(document).ready(function() {
    //这里可以有其它代码;
 
    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        call_ff();
    })
});
//选择类型的回调函数
function setInsuranceTypePopupReturn(popupReplyData){
    set_return(popupReplyData);
    call_ff();
}
 
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAOS_Insurances");
    $(".expandLink").click();
}

function setPreInsuranceTypePopupReturn(popupReplyData) {
	popupReplyData["name_to_value_array"]["contract_revision_c"]=String(parseInt(popupReplyData["name_to_value_array"]["contract_revision_c"])+1);
	set_return(popupReplyData);
	
}