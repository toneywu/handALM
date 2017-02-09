$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()

function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAA_QUAL","DetailView");
    $("a.collapsed").click();
 
}

$(document).ready(function() {
  //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    call_ff();
  });


});