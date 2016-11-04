$.getScript("modules/HAA_FF/ff_include.js");
function setOwningOrgPopupReturn(popupReplyData){//选择完所属组织的动作
	set_return(popupReplyData);
	$("#owning_person").val("");//因为组织变化了，对应的人员也一定会变化，因此将人员字段清空后，手工重新选择。
	$("#owning_person_id").val("");
}
function setUsingOrgPopupReturn(popupReplyData){//选择完使用组织的动作
	set_return(popupReplyData);
	$("#using_person").val("");//因为组织变化了，对应的人员也一定会变化，因此将人员字段清空后，手工重新选择。
	$("#using_person_id").val("");
}


function setAssetGroupPopupReturn(popupReplyData){//选择地点类型后
    set_return(popupReplyData);
    call_ff();
}
 
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HIT_Racks");
    $(".expandLink").click();
}

$(document).ready(function() {
    //这里可以有其它代码;
		if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
				$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
		}

    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        call_ff();
    });
});

