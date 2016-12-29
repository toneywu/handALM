$.getScript("modules/HAA_FF/ff_include.js");

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

function setHatAssetsRetuen(popupReplyData){
    var contact_id=popupReplyData['name_to_value_array']['contact_id_c'];
    var person_number="";
    $.ajax({
        url:"?module=HAT_Incidents&action=getPersonNumber&to_pdf=true",
        type:"GET",
        async: false,
        data:"&contact_id="+contact_id,
        success:function(data){
            person_number=data;
        }
    });
    popupReplyData['name_to_value_array']['person_number']=person_number;
    set_return(popupReplyData);

}
 
function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"HAT_Incidents");
	$(".expandLink").click();
}

