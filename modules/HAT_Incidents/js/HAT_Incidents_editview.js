$.getScript("modules/HAA_FF/ff_include.js");

$(document).ready(function() {
    //这里可以有其它代码;
     
    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    	call_ff();
    })

    $("#event_date").change(function(){resetPersonByDate()})

});
//选择事件类型的回调函数
function setEventTypeReturn(popupReplyData){
	set_return(popupReplyData);
	call_ff();
}

function setHatAssetsReturn(popupReplyData){
    var contact_id=popupReplyData['name_to_value_array']['contact_id_c'];
    var asset_id=popupReplyData['name_to_value_array']['hat_assets_id_c'];
    console.log(popupReplyData);
    var person_number="";
    $.ajax({
        url:"?module=HAT_Incidents&action=getTimebasedPersonInfor&to_pdf=true",
        type:"GET",
        async: false,
        data:"&asset_id="+asset_id+"&event_time="+$("#event_date").val(),
        success:function(data){
            //console.log ("?module=HAT_Incidents&action=getTimebasedPersonInfor&to_pdf=true&asset_id="+asset_id+"&event_time="+$("#event_date").val())
            data = JSON.parse(data);
            console.log(popupReplyData);

            person_id=data.id;
            person_name=data.name;
        }
    });
    popupReplyData['name_to_value_array']['person_number']=person_name;
    popupReplyData['name_to_value_array']['contact_id_c']=person_id;
    set_return(popupReplyData);

}

function resetPersonByDate() {
    var asset_id = $("#hat_assets_id_c").val();
    if(asset_id != ""){
        //如果资产编号不为空，则可以进行基于资产的人员重新处理
        //console.log("&asset_id="+asset_id+"&event_time="+$("#event_date").val());
    $.ajax({
        url:"?module=HAT_Incidents&action=getTimebasedPersonInfor&to_pdf=true",
        type:"GET",
        async: false,
        data:"&asset_id="+asset_id+"&event_time="+$("#event_date").val(),
        success:function(data){
            data = JSON.parse(data);
            //console.log(data);
            $("#contact_id_c").val(data.id);
            $("#person_number").val(data.name);
        }
    });
    }
}

function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"HAT_Incidents");
	$("a.collapsed").click();
}