$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()
 
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAM_SR","DetailView");
    $(".expandLink").click();
 

}
function DocumentReady() {
	//触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    call_ff();
  });

    if( $('#is_le_c').is(':checked')) {
        $("#detailpanel_4").show();
    } else {
        $("#detailpanel_4").hide();
    }

    if( $('#is_customer_c').is(':checked')) {
        $("#detailpanel_3").show();
    } else {
        $("#detailpanel_3").hide();
    }

}


$(document).ready(DocumentReady);