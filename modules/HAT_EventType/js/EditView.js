
$(document).ready(function() {

	reset_EventType_Fields();
	$('#EditView select, #EditView input').change(function(){
		reset_EventType_Fields();
		//alert("reset");
	});

})