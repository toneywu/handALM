$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()

function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAM_SR","DetailView");
    $(".expandLink").click();
 
}

$(document).ready(function() {
  //´¥·¢FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    call_ff();
    //alert("hh");
  });
    

});