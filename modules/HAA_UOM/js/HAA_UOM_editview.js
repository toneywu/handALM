function setClassPopupReturn(popupReplyData){
	set_return(popupReplyData);
	$("#base_unit_text").text($("#base_unit").val());
}



$(document).ready(function() {

	$("#btn_clr_uom_class").click(function(){//清空图层时，将URL和地图都置空
		$("#base_unit_text").text("BASE UNIT");
	});

	$("#uom_code").change(function(){ //输入了CODE后，将CODE自动更新到Symbol
		if($("#uom_symbol").val()=="") {
			$("#uom_symbol").val($("#uom_code").val());
		}
	})

})