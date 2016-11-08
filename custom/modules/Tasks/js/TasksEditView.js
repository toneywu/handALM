$.getScript("modules/HAA_FF/ff_include.js");

$(document).ready(function() {
    //这里可以有其它代码;
 
    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        call_ff();
    });
});

//选择合同类型的回调函数
function setTasksTypePopupReturn(popupReplyData){
    set_return(popupReplyData);
    call_ff();
    if($("#parent_name_label").next().css('display')=="none"){//字段设置了隐藏，才隐藏label
        $("#parent_name_label").hide();
    }
}
 
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"Tasks");
    $(".expandLink").click();
    if($("#parent_name_label").next().css('display')=="none"){
        $("#parent_name_label").hide();
    }
}