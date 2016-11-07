
$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()

function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"Contacts","EditView");
	
    $(".expandLink").click();
 
}
function setBusinessTypePopupReturn(popupReplyData){//选择完产品后的动作
    set_return(popupReplyData);
	console.log(popupReplyData);
    //开始建立flexFields
    triger_setFF(popupReplyData.name_to_value_array.haa_ff_id,"Contacts");
	console.log($("#haa_ff_id").val());
    $(".expandLink").click();
}


function DocumentReady() {

}


$(document).ready(DocumentReady);

$(document).ready(function() {
    //这里可以有其它代码;
    
		if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
				$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
		}

    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        call_ff();
      })
});