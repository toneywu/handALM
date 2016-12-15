$(document).ready(function() {
	console.log("ready go 11232");
	//$("#framework_advanced").after("<input type='hidden' id='target_owning_org_id_advanced' value='54b17458-3c99-15cd-ce95-57ad8b859112'>");
	$("#owning_org_id_advanced").hide();
	$("#enable_it_rack_advanced").hide();
	$("#asset_type_advanced").hide();
	//console.log(owning_org_id);

	if(typeof owning_org_id!="undefined"){

		$("#framework_advanced").after("<input type='hidden' id='target_using_org_id_advanced' value='"+owning_org_id+"'>");
	}
	
    if(typeof asset_type!="undefined"){
		$("#asset_type_advanced").val(asset_type);
	}
	console.log(current_framework);
	if(typeof current_framework!="undefined"){
		$("#haa_frameworks_id_advanced").val(current_framework);
	}
	
});