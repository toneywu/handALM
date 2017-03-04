
$(document).ready(function(){
	if ($("#source_type_val").val() != "") {
		$("#detailpanel_-1").find("input").attr("disabled","disabled");
		$("#detailpanel_-1").find("button").removeAttr("onclick");
		$("#detailpanel_-1").find("textarea").attr("disabled","disabled");
		$("#detailpanel_-1").find("select").attr("disabled","disabled");
		/*$("#btn_framework").removeAttr("onclick"); 
		$("#currency_id_select")attr("disabled","disabled");*/
	}
});