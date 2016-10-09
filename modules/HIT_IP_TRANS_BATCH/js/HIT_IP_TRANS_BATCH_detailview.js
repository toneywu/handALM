$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()

function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HIT_IP_TRANS_BATCH","DetailView");
    $(".expandLink").click();
}

$(document).ready(function() {
  //触发FF
  SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    call_ff();
  });

  $("#line_items_span").parent("td").prev("td").hide();
  //去除行前的标签

});

function GenerateDoc() {
	if (typeof template_id == 'undefined' || template_id.length == 0) {
		alert (SUGAR.language.get('app_strings', 'LBL_NO_TEMPLATE'));
		//warning for no PDF template
	} else {
	    var record_id=$( "input[name*='record']" ).val();
	    window.location = "index.php?module=HIT_IP_TRANS_BATCH&action=GenerateDoc&uid="+record_id+"&templateID="+template_id;
    }
}