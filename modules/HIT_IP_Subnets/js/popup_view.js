$.getScript("modules/HAA_FF/ff_include.js");
$(document).ready(function() {
	console.log("location_id");
	//$("#hat_asset_locations_id_advanced").css("display","none");
	/*if (typeof location_id != 'undefined'&&location_id!="") {
		$("#name_advanced").after("<input type='hidden' id='location_id_advanced' value='"+location_id+"'>");
	}*/

	if(typeof location_id!="undefined"){
		$html='<input id="location_id" name="location_id" type="hidden" value="'+location_id+'"/>';
		$("#name_advanced").after($html);
   }	
	
	if (typeof location_name != 'undefined') {
	 if(location_name!=""||$("#location_advanced").val()!=""){
		 console.log(location_name);
		 if($("#location_advanced").val()==""){
			$("#location_advanced").val(location_name);
		 }
		var field_name="location_advanced";
		mark_obj = ($("#"+field_name).length>0)?$("#"+field_name):$("[name='"+field_name+"'");
		mark_obj_lable = $("#"+field_name+"_label");
		mark_obj_tr = $("#"+field_name).closest("tr");
		mark_obj.closest('td').css({"display":""});
		mark_obj_lable.css({"display":""});
		mark_obj.css({"background-Color":"#efefef;"});
		mark_obj.attr("readonly",true);
		mark_obj_lable.css({"color":"#aaaaaa"});
		
		$("button[name='btn_location_advanced']").css({"visibility":"hidden"});
		$("button[name='btn_clr_location_advanced']").css({"visibility":"hidden"});
		}
	 }
	$("#popup_query_form").attr("action",window.location.href);
});