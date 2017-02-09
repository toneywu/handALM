$.getScript("modules/HAA_FF/ff_include.js");
$(document).ready(function() {
    //这里可以有其它代码;
     
    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    	call_ff();
    })
});
//选择事件类型的回调函数
function setClaimTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	call_ff();
}
 
function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"HAOS_Insurance_Claims");
	$("a.collapsed").click();
}