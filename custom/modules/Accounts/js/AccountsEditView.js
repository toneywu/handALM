$.getScript("modules/HAA_FF/ff_include.js");
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"Accounts");
    $(".expandLink").click();
}

function setBusinessTypePopupReturn(popupReplyData){//选择完产品后的动作
    set_return(popupReplyData);
	call_ff();
    //开始建立flexFields
    //triger_setFF($("#haa_ff_id").val(),"Accounts")
    //$(".expandLink").click();
}


function DocumentReady() {

    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        call_ff();
      });

    $('#is_le_c').change(function(){ //是否是法人组织
        //如果=Y，则显示公司法人单位信息的面板，并且将法人单位信息中的统一注册号置为必须。否则隐藏，法人单位信息中所有字段为非必须。
        if( $(this).is(':checked')) {
            $("#registration_id_c").closest(".panel").show();
            mark_field_enabled("registration_id_c",false);
        } else {
            $("#registration_id_c").closest(".panel").hide();
            mark_field_disabled("registration_id_c")
        }
    });
    $('#is_customer_c').change(function(){ //是否是客户，如果是显示客服信息
        if( $(this).is(':checked')) {
            $("#customer_classs_c").closest(".panel").show();
        } else {
            $("#customer_classs_c").closest(".panel").hide();
        }
    });
    $('#is_cooperation_group_c').change(function(){ //
        if( $(this).is(':checked')) {
            mark_field_disabled("parent_name")
        } else {
            mark_field_enabled("parent_name",true);
        }
    });

    SUGAR.util.doWhen("typeof mark_field_disabled == 'function'", function(){
        $('#is_le_c').change();
        $('#is_customer_c').change();
        $('#is_cooperation_group_c').change();
    })
}


$(document).ready(DocumentReady);