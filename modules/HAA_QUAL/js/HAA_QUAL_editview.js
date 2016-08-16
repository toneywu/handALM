function setTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	console.log("index.php?to_pdf=true&module=HAA_FF&action=setFF&ff_module=HAA_Codes&ff_id="+$("#haa_ff_id").val())
	triger_setFF($("#haa_ff_id").val(),"HAA_Codes")
	$(".expandLink").click();
}

$(document).ready(function(){

	$('#no_effective_end_flag').change(function(){
		if( $(this).is(':checked')) {
			mark_field_disabled('effective_end_date',false);
		} else {
			mark_field_enabled('effective_end_date');
		}
	});


	SUGAR.util.doWhen("typeof mark_field_enabled == 'function'", function() { $('#no_effective_end_flag').change(); }); 

});