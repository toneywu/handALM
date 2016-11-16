$.getScript("modules/HAA_FF/ff_include.js");
$(document).ready(function() {
	//$("#access_assets_name_advanced").after("<input type='hidden' id='target_owning_org_id_advanced' value='54b17458-3c99-15cd-ce95-57ad8b859112'>");
	//$("#hat_asset_locations_id_advanced").css("display","none");
	
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
	
});