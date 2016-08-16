$(document).ready(function() {

	if($("#base_unit_id").val()=="") {
		$("#base_unit_id").val("0");
	}

	$("#base_unit_code").change(function(){ //输入了CODE后，将CODE自动更新到Symbol
		if($("#base_unit_symbol").val()=="") {
			$("#base_unit_symbol").val($("#base_unit_code").val());
		}
	})

})