$.getScript("modules/HAA_FF/ff_include.js");
//load triger_setFF()



$(document).ready(function() {
	//alert("haa_ff_id="+$("#haa_ff_id").val());
	$('#placeholder').change(function(){
		if( $(this).is(':checked')) {
			mark_field_disabled('asset');
			mark_field_disabled('name');
		} else {
			mark_field_enabled('asset');
			mark_field_enabled('name');
		}
	});


	$('#placeholder').change();

});

