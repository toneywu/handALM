$.getScript("modules/HAA_FF/ff_include.js");
function setTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	console.log("index.php?to_pdf=true&module=HAA_FF&action=setFF&ff_module=HAA_Codes&ff_id="+$("#haa_ff_id").val())
	triger_setFF($("#haa_ff_id").val(),"HAA_Codes")
	$("a.collapsed").click();
}


function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAM_WO");
    $("a.collapsed").click();
}
$(document).ready(function(){

		if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
				$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
		}

    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        call_ff();
      });


	$('#no_effective_end_flag').change(function(){
		if( $(this).is(':checked')) {
			mark_field_disabled('effective_end_date',false);
		} else {
			mark_field_enabled('effective_end_date');
		}
	});


	SUGAR.util.doWhen("typeof mark_field_enabled == 'function'", function() { $('#no_effective_end_flag').change(); }); 

});